<?php

namespace App\Infrastructure\Ubl;

use App\Application\Invoices\Data\InvoiceLineData;
use App\Application\Invoices\Data\InvoiceLineGenerationData;
use App\Application\Invoices\Data\InvoiceRequestData;
use App\Application\Invoices\Data\PartyIdentificationData;
use App\Application\Invoices\Data\UblInvoiceGenerationData;
use App\Application\Invoices\Data\UblTaxTotalInput;
use App\Application\Invoices\Ports\IUblGeneratorPort;
use DateTime;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use InvalidArgumentException;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Ubl21\CommonAggregateComponents\AccountingCustomerParty;
use Ubl21\CommonAggregateComponents\AccountingSupplierParty;
use Ubl21\CommonAggregateComponents\InvoiceLine;
use Ubl21\CommonAggregateComponents\Item;
use Ubl21\CommonAggregateComponents\LegalMonetaryTotal;
use Ubl21\CommonAggregateComponents\Party;
use Ubl21\CommonAggregateComponents\PartyIdentification;
use Ubl21\CommonAggregateComponents\PartyLegalEntity;
use Ubl21\CommonAggregateComponents\Price;
use Ubl21\CommonAggregateComponents\SellersItemIdentification;
use Ubl21\CommonAggregateComponents\TaxCategory;
use Ubl21\CommonAggregateComponents\TaxScheme;
use Ubl21\CommonAggregateComponents\TaxSubtotal;
use Ubl21\CommonAggregateComponents\TaxTotal;
use Ubl21\CommonBasicComponents\AllowanceTotalAmount;
use Ubl21\CommonBasicComponents\ChargeTotalAmount;
use Ubl21\CommonBasicComponents\Description;
use Ubl21\CommonBasicComponents\DocumentCurrencyCode;
use Ubl21\CommonBasicComponents\ID;
use Ubl21\CommonBasicComponents\InvoicedQuantity;
use Ubl21\CommonBasicComponents\InvoiceTypeCode;
use Ubl21\CommonBasicComponents\LineExtensionAmount;
use Ubl21\CommonBasicComponents\PayableAmount;
use Ubl21\CommonBasicComponents\PayableRoundingAmount;
use Ubl21\CommonBasicComponents\PrepaidAmount;
use Ubl21\CommonBasicComponents\PriceAmount;
use Ubl21\CommonBasicComponents\RegistrationName;
use Ubl21\CommonBasicComponents\TaxableAmount;
use Ubl21\CommonBasicComponents\TaxAmount;
use Ubl21\CommonBasicComponents\TaxExclusiveAmount;
use Ubl21\CommonBasicComponents\TaxExemptionReasonCode;
use Ubl21\CommonBasicComponents\TaxInclusiveAmount;
use Ubl21\Invoice\Invoice;

final class UblInvoiceXmlAdapter implements IUblGeneratorPort
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $builder = SerializerBuilder::create();
        $builder->addMetadataDir(base_path('tools/ubl-xsd-poc/generated/metadata'), 'Ubl21');
        $builder->configureHandlers(function (HandlerRegistryInterface $registry) use ($builder): void {
            $builder->addDefaultHandlers();
            $registry->registerSubscribingHandler(new BaseTypesHandler);
            $registry->registerSubscribingHandler(new XmlSchemaDateHandler);
        });
        $this->serializer = $builder->build();
    }

    public function generate(InvoiceRequestData $request, UblInvoiceGenerationData $generationData): string
    {
        $lineData = $this->indexLineData($request, $generationData);
        $invoice = new Invoice;
        $invoice->setID(new ID($generationData->legalDocumentId));
        $invoice->setIssueDate(DateTime::createFromInterface($request->issueDate));
        $invoice->setInvoiceTypeCode(new InvoiceTypeCode($request->documentType));
        $invoice->setDocumentCurrencyCode(new DocumentCurrencyCode($request->currency));
        $invoice->setAccountingSupplierParty($this->supplierParty($generationData));
        $invoice->setAccountingCustomerParty($this->customerParty($request));

        if ($generationData->documentTaxTotals !== []) {
            $invoice->setTaxTotal(array_map(
                fn (UblTaxTotalInput $taxTotal): TaxTotal => $this->taxTotal($taxTotal, $request->currency),
                $generationData->documentTaxTotals
            ));
        }

        $invoice->setLegalMonetaryTotal($this->legalMonetaryTotal($generationData, $request->currency));
        $invoice->setInvoiceLine(array_map(
            fn (InvoiceLineData $line): InvoiceLine => $this->invoiceLine(
                $line,
                $lineData[$line->lineNumber],
                $request->currency
            ),
            $request->lines
        ));

        return $this->serializer->serialize($invoice, 'xml');
    }

    /**
     * @return array<int, InvoiceLineGenerationData>
     */
    private function indexLineData(InvoiceRequestData $request, UblInvoiceGenerationData $generationData): array
    {
        $requestLines = [];
        foreach ($request->lines as $line) {
            if (isset($requestLines[$line->lineNumber])) {
                throw new InvalidArgumentException("Duplicate request line number {$line->lineNumber}.");
            }
            $requestLines[$line->lineNumber] = true;
        }

        $indexed = [];
        foreach ($generationData->lineData as $line) {
            if (isset($indexed[$line->lineNumber])) {
                throw new InvalidArgumentException("Duplicate generation data for line {$line->lineNumber}.");
            }
            if (! isset($requestLines[$line->lineNumber])) {
                throw new InvalidArgumentException("Generation data references unknown line {$line->lineNumber}.");
            }
            $indexed[$line->lineNumber] = $line;
        }

        if (count($indexed) !== count($requestLines)) {
            throw new InvalidArgumentException('Generation data must match every request line exactly once.');
        }

        return $indexed;
    }

    private function supplierParty(UblInvoiceGenerationData $data): AccountingSupplierParty
    {
        $party = new Party;
        $party->setPartyLegalEntity([$this->legalEntity($data->issuer->registrationName)]);
        $party->setPartyIdentification(array_map(
            fn (PartyIdentificationData $identification): PartyIdentification => $this->partyIdentification($identification),
            $data->issuer->partyIdentifications
        ));

        $supplier = new AccountingSupplierParty;
        $supplier->setParty($party);

        return $supplier;
    }

    private function customerParty(InvoiceRequestData $request): AccountingCustomerParty
    {
        $identification = new PartyIdentification;
        $id = new ID($request->customer->identityNumber);
        $id->setSchemeID($request->customer->identityType);
        $identification->setID($id);

        $party = new Party;
        $party->setPartyIdentification([$identification]);
        $party->setPartyLegalEntity([$this->legalEntity($request->customer->legalName)]);

        $customer = new AccountingCustomerParty;
        $customer->setParty($party);

        return $customer;
    }

    private function partyIdentification(PartyIdentificationData $data): PartyIdentification
    {
        $id = new ID($data->id);
        if ($data->schemeId !== null) {
            $id->setSchemeID($data->schemeId);
        }

        $identification = new PartyIdentification;
        $identification->setID($id);

        return $identification;
    }

    private function legalEntity(string $registrationName): PartyLegalEntity
    {
        $entity = new PartyLegalEntity;
        $entity->setRegistrationName(new RegistrationName($registrationName));

        return $entity;
    }

    private function invoiceLine(
        InvoiceLineData $requestLine,
        InvoiceLineGenerationData $generationLine,
        string $currency
    ): InvoiceLine {
        $line = new InvoiceLine;
        $line->setID(new ID((string) $requestLine->lineNumber));

        $quantity = new InvoicedQuantity($requestLine->quantity);
        $quantity->setUnitCode($generationLine->unitCode);
        $line->setInvoicedQuantity($quantity);
        $line->setLineExtensionAmount($this->amount(
            LineExtensionAmount::class,
            $generationLine->lineExtensionAmount,
            $currency
        ));

        if ($generationLine->taxTotals !== []) {
            $line->setTaxTotal(array_map(
                fn (UblTaxTotalInput $taxTotal): TaxTotal => $this->taxTotal(
                    $taxTotal,
                    $currency,
                    $requestLine->taxExemptionReasonCode
                ),
                $generationLine->taxTotals
            ));
        }

        $sellerItemId = new SellersItemIdentification;
        $sellerItemId->setID(new ID($requestLine->productId));

        $item = new Item;
        $item->setDescription([new Description($requestLine->description)]);
        $item->setSellersItemIdentification($sellerItemId);
        $line->setItem($item);

        $price = new Price;
        $price->setPriceAmount($this->amount(PriceAmount::class, $requestLine->unitPrice, $currency));
        $line->setPrice($price);

        return $line;
    }

    private function taxTotal(UblTaxTotalInput $input, string $currency, ?string $lineTaxReason = null): TaxTotal
    {
        $subtotals = [];
        foreach ($input->taxSubtotals as $inputSubtotal) {
            $scheme = new TaxScheme;
            $scheme->setID(new ID($inputSubtotal->taxSchemeId));

            $category = new TaxCategory;
            $category->setTaxScheme($scheme);
            if ($lineTaxReason !== null) {
                $category->setTaxExemptionReasonCode(new TaxExemptionReasonCode($lineTaxReason));
            }

            $subtotal = new TaxSubtotal;
            if ($inputSubtotal->taxableAmount !== null) {
                $subtotal->setTaxableAmount($this->amount(
                    TaxableAmount::class,
                    $inputSubtotal->taxableAmount,
                    $currency
                ));
            }
            $subtotal->setTaxAmount($this->amount(TaxAmount::class, $inputSubtotal->taxAmount, $currency));
            $subtotal->setTaxCategory($category);
            $subtotals[] = $subtotal;
        }

        $total = new TaxTotal;
        $total->setTaxAmount($this->amount(TaxAmount::class, $input->taxAmount, $currency));
        $total->setTaxSubtotal($subtotals);

        return $total;
    }

    private function legalMonetaryTotal(UblInvoiceGenerationData $data, string $currency): LegalMonetaryTotal
    {
        $input = $data->legalMonetaryTotals;
        $total = new LegalMonetaryTotal;
        $optionalAmounts = [
            'lineExtensionAmount' => LineExtensionAmount::class,
            'taxExclusiveAmount' => TaxExclusiveAmount::class,
            'taxInclusiveAmount' => TaxInclusiveAmount::class,
            'allowanceTotalAmount' => AllowanceTotalAmount::class,
            'chargeTotalAmount' => ChargeTotalAmount::class,
            'prepaidAmount' => PrepaidAmount::class,
            'payableRoundingAmount' => PayableRoundingAmount::class,
        ];

        foreach ($optionalAmounts as $field => $class) {
            if ($input->{$field} !== null) {
                $method = 'set'.ucfirst($field);
                $total->{$method}($this->amount($class, $input->{$field}, $currency));
            }
        }
        $total->setPayableAmount($this->amount(PayableAmount::class, $input->payableAmount, $currency));

        return $total;
    }

    private function amount(string $class, string $value, string $currency): object
    {
        $amount = new $class($value);
        $amount->setCurrencyID($currency);

        return $amount;
    }
}
