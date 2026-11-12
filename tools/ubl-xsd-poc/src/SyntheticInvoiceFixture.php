<?php

namespace Ubl21Poc;

use DateTime;
use InvalidArgumentException;
use Ubl21\CommonAggregateComponents\AccountingCustomerParty;
use Ubl21\CommonAggregateComponents\AccountingSupplierParty;
use Ubl21\CommonAggregateComponents\InvoiceLine;
use Ubl21\CommonAggregateComponents\Item;
use Ubl21\CommonAggregateComponents\LegalMonetaryTotal;
use Ubl21\CommonAggregateComponents\Party;
use Ubl21\CommonAggregateComponents\PartyIdentification;
use Ubl21\CommonAggregateComponents\PartyLegalEntity;
use Ubl21\CommonAggregateComponents\PartyName;
use Ubl21\CommonAggregateComponents\Price;
use Ubl21\CommonAggregateComponents\TaxCategory;
use Ubl21\CommonAggregateComponents\TaxScheme;
use Ubl21\CommonAggregateComponents\TaxSubtotal;
use Ubl21\CommonAggregateComponents\TaxTotal;
use Ubl21\CommonBasicComponents\Description;
use Ubl21\CommonBasicComponents\DocumentCurrencyCode;
use Ubl21\CommonBasicComponents\ID;
use Ubl21\CommonBasicComponents\InvoiceTypeCode;
use Ubl21\CommonBasicComponents\InvoicedQuantity;
use Ubl21\CommonBasicComponents\LineExtensionAmount;
use Ubl21\CommonBasicComponents\Name;
use Ubl21\CommonBasicComponents\PayableAmount;
use Ubl21\CommonBasicComponents\PriceAmount;
use Ubl21\CommonBasicComponents\RegistrationName;
use Ubl21\CommonBasicComponents\TaxAmount;
use Ubl21\CommonBasicComponents\TaxExclusiveAmount;
use Ubl21\CommonBasicComponents\TaxInclusiveAmount;
use Ubl21\CommonBasicComponents\TaxableAmount;
use Ubl21\Invoice\Invoice;

final class SyntheticInvoiceFixture
{
    public static function data(): array
    {
        return [
            'invoice_id' => 'TEST-INV-0001',
            'issue_date' => '2026-01-15',
            'document_type' => '01',
            'currency' => 'PEN',
            'issuer_id' => 'SYNTHETIC-ISSUER-001',
            'issuer_name' => 'SYNTHETIC ISSUER (NOT REAL)',
            'customer_id' => 'SYNTHETIC-CUSTOMER-001',
            'customer_identity_type' => '6',
            'customer_name' => 'SYNTHETIC CUSTOMER (NOT REAL)',
            'line_id' => '1',
            'product_id' => 'TEST-PRODUCT-001',
            'description' => 'Synthetic item & < >',
            'unit_code' => 'NIU',
            'quantity' => '2',
            'unit_price' => '12.50',
            'line_extension' => '25.00',
            'taxable_base' => '25.00',
            'tax_amount' => '4.50',
            'tax_category' => 'TEST-CATEGORY',
            'tax_scheme' => 'TEST-TAX-SCHEME',
            'payable_total' => '29.50',
        ];
    }

    public static function create(array $data): Invoice
    {
        foreach (array_keys(self::data()) as $key) {
            if (!isset($data[$key]) || !is_string($data[$key]) || trim($data[$key]) === '') {
                throw new InvalidArgumentException("Required synthetic fixture value is missing: {$key}");
            }
        }

        $invoice = new Invoice();
        $invoice->setID(new ID($data['invoice_id']));
        $invoice->setIssueDate(new DateTime($data['issue_date']));
        $invoice->setInvoiceTypeCode(new InvoiceTypeCode($data['document_type']));
        $invoice->setDocumentCurrencyCode(new DocumentCurrencyCode($data['currency']));
        $invoice->setAccountingSupplierParty(self::party(
            AccountingSupplierParty::class,
            $data['issuer_id'],
            null,
            $data['issuer_name']
        ));
        $invoice->setAccountingCustomerParty(self::party(
            AccountingCustomerParty::class,
            $data['customer_id'],
            $data['customer_identity_type'],
            $data['customer_name']
        ));
        $invoice->setTaxTotal([self::taxTotal($data)]);

        $total = new LegalMonetaryTotal();
        $total->setLineExtensionAmount(self::amount(LineExtensionAmount::class, $data['line_extension'], $data['currency']));
        $total->setTaxExclusiveAmount(self::amount(TaxExclusiveAmount::class, $data['taxable_base'], $data['currency']));
        $total->setTaxInclusiveAmount(self::amount(TaxInclusiveAmount::class, $data['payable_total'], $data['currency']));
        $total->setPayableAmount(self::amount(PayableAmount::class, $data['payable_total'], $data['currency']));
        $invoice->setLegalMonetaryTotal($total);

        $line = new InvoiceLine();
        $line->setID(new ID($data['line_id']));

        $quantity = new InvoicedQuantity($data['quantity']);
        $quantity->setUnitCode($data['unit_code']);
        $line->setInvoicedQuantity($quantity);
        $line->setLineExtensionAmount(self::amount(LineExtensionAmount::class, $data['line_extension'], $data['currency']));
        $line->setTaxTotal([self::taxTotal($data)]);

        $item = new Item();
        $item->setName(new Name($data['product_id']));
        $item->setDescription([new Description($data['description'])]);
        $line->setItem($item);

        $price = new Price();
        $price->setPriceAmount(self::amount(PriceAmount::class, $data['unit_price'], $data['currency']));
        $line->setPrice($price);
        $invoice->setInvoiceLine([$line]);

        return $invoice;
    }

    private static function party(string $partyType, string $id, ?string $identityType, string $name)
    {
        $partyId = new ID($id);
        if ($identityType !== null) {
            $partyId->setSchemeID($identityType);
        }

        $identification = new PartyIdentification();
        $identification->setID($partyId);

        $partyName = new PartyName();
        $partyName->setName(new Name($name));

        $legalEntity = new PartyLegalEntity();
        $legalEntity->setRegistrationName(new RegistrationName($name));

        $party = new Party();
        $party->setPartyIdentification([$identification]);
        $party->setPartyName([$partyName]);
        $party->setPartyLegalEntity([$legalEntity]);

        $account = new $partyType();
        $account->setParty($party);

        return $account;
    }

    private static function taxTotal(array $data): TaxTotal
    {
        $taxAmount = self::amount(TaxAmount::class, $data['tax_amount'], $data['currency']);

        $scheme = new TaxScheme();
        $scheme->setID(new ID($data['tax_scheme']));

        $category = new TaxCategory();
        $category->setID(new ID($data['tax_category']));
        $category->setTaxScheme($scheme);

        $subtotal = new TaxSubtotal();
        $subtotal->setTaxableAmount(self::amount(TaxableAmount::class, $data['taxable_base'], $data['currency']));
        $subtotal->setTaxAmount(self::amount(TaxAmount::class, $data['tax_amount'], $data['currency']));
        $subtotal->setTaxCategory($category);

        $total = new TaxTotal();
        $total->setTaxAmount($taxAmount);
        $total->setTaxSubtotal([$subtotal]);

        return $total;
    }

    private static function amount(string $type, string $value, string $currency)
    {
        $amount = new $type($value);
        $amount->setCurrencyID($currency);

        return $amount;
    }
}
