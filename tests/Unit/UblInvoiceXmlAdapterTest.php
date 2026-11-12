<?php

namespace Tests\Unit;

use App\Application\Invoices\Data\InvoiceCustomerData;
use App\Application\Invoices\Data\InvoiceLineData;
use App\Application\Invoices\Data\InvoiceLineGenerationData;
use App\Application\Invoices\Data\InvoiceRequestData;
use App\Application\Invoices\Data\IssuerLegalPartyData;
use App\Application\Invoices\Data\PartyIdentificationData;
use App\Application\Invoices\Data\UblInvoiceGenerationData;
use App\Application\Invoices\Data\UblLegalMonetaryTotals;
use App\Application\Invoices\Data\UblTaxSubtotalInput;
use App\Application\Invoices\Data\UblTaxTotalInput;
use App\Application\Invoices\Ports\IUblGeneratorPort;
use DOMDocument;
use DOMXPath;
use InvalidArgumentException;
use Tests\TestCase;

final class UblInvoiceXmlAdapterTest extends TestCase
{
    private const INVOICE_NS = 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2';

    private const CAC_NS = 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2';

    private const CBC_NS = 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2';

    public function test_generates_unsigned_invoice_xml_and_validates_against_local_official_xsd(): void
    {
        $xml = $this->generator()->generate(...$this->fixture());
        $document = new DOMDocument;
        self::assertTrue($document->loadXML($xml, LIBXML_NONET));

        $xpath = $this->xpath($document);
        self::assertSame(self::INVOICE_NS, $document->documentElement?->namespaceURI);
        self::assertSame('TEST-INV-0001', $xpath->evaluate('string(/ubl:Invoice/cbc:ID)'));
        self::assertSame('01', $xpath->evaluate('string(/ubl:Invoice/cbc:InvoiceTypeCode)'));
        self::assertSame('SYNTHETIC-ISSUER-001', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)'));
        self::assertSame('SYNTHETIC ISSUER (NOT REAL)', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)'));
        self::assertSame('6', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID/@schemeID)'));
        self::assertSame('TEST-PRODUCT-001', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID)'));
        self::assertSame('Synthetic item & < >', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Description)'));
        self::assertSame('NIU', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity/@unitCode)'));
        self::assertSame('12.5', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount)'));
        self::assertSame('TEST-CAT-07', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode)'));
        self::assertSame('TEST-TAX-SCHEME', $xpath->evaluate('string(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)'));
        self::assertSame('29.5', $xpath->evaluate('string(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount)'));
        self::assertSame(0, $xpath->query('//*[namespace-uri()="http://www.w3.org/2000/09/xmldsig#" and local-name()="Signature"]')->length);
        self::assertTrue($this->isValidAgainstOfficialXsd($xml));
    }

    public function test_empty_document_tax_inputs_omit_document_tax_total(): void
    {
        [$request, $data] = $this->fixture(documentTaxTotals: []);
        $xml = $this->generator()->generate($request, $data);
        $xpath = $this->xpath($this->loadXml($xml));

        self::assertSame(0, $xpath->query('/ubl:Invoice/cac:TaxTotal')->length);
        self::assertSame(1, $xpath->query('/ubl:Invoice/cac:InvoiceLine/cac:TaxTotal')->length);
        self::assertTrue($this->isValidAgainstOfficialXsd($xml));
    }

    public function test_supplied_tax_total_requires_subtotal_and_matching_line_inputs(): void
    {
        try {
            new UblTaxTotalInput('4.50', []);
            self::fail('An empty subtotal collection must be rejected.');
        } catch (InvalidArgumentException $exception) {
            self::assertStringContainsString('at least one subtotal', $exception->getMessage());
        }

        [$request, $data] = $this->fixture(lineNumber: 2);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('references unknown line');
        $this->generator()->generate($request, $data);
    }

    private function generator(): IUblGeneratorPort
    {
        return app(IUblGeneratorPort::class);
    }

    /**
     * @return array{InvoiceRequestData, UblInvoiceGenerationData}
     */
    private function fixture(?array $documentTaxTotals = null, int $lineNumber = 1): array
    {
        $request = new InvoiceRequestData(
            '01',
            new \DateTimeImmutable('2026-01-15'),
            'PEN',
            new InvoiceCustomerData('6', 'SYNTHETIC-CUSTOMER-001', 'SYNTHETIC CUSTOMER (NOT REAL)'),
            [
                new InvoiceLineData(
                    1,
                    'TEST-PRODUCT-001',
                    'Synthetic item & < >',
                    '2',
                    '12.50',
                    'TEST-CAT-07'
                ),
            ]
        );
        $taxTotal = new UblTaxTotalInput('4.50', [
            new UblTaxSubtotalInput('4.50', 'TEST-TAX-SCHEME', '25.00'),
        ]);
        $generationData = new UblInvoiceGenerationData(
            'TEST-INV-0001',
            new IssuerLegalPartyData(
                'SYNTHETIC ISSUER (NOT REAL)',
                [new PartyIdentificationData('SYNTHETIC-ISSUER-001', 'SYNTHETIC-ID-SCHEME')]
            ),
            [new InvoiceLineGenerationData($lineNumber, 'NIU', '25.00', [$taxTotal])],
            $documentTaxTotals ?? [$taxTotal],
            new UblLegalMonetaryTotals(
                '29.50',
                lineExtensionAmount: '25.00',
                taxExclusiveAmount: '25.00',
                taxInclusiveAmount: '29.50'
            )
        );

        return [$request, $generationData];
    }

    private function loadXml(string $xml): DOMDocument
    {
        $document = new DOMDocument;
        self::assertTrue($document->loadXML($xml, LIBXML_NONET));

        return $document;
    }

    private function xpath(DOMDocument $document): DOMXPath
    {
        $xpath = new DOMXPath($document);
        $xpath->registerNamespace('ubl', self::INVOICE_NS);
        $xpath->registerNamespace('cac', self::CAC_NS);
        $xpath->registerNamespace('cbc', self::CBC_NS);

        return $xpath;
    }

    private function isValidAgainstOfficialXsd(string $xml): bool
    {
        $previousErrorMode = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $document = new DOMDocument;
            if (! $document->loadXML($xml, LIBXML_NONET)) {
                return false;
            }

            return $document->schemaValidate(
                base_path('tools/ubl-xsd-poc/schema-bundle/xsd/maindoc/UBL-Invoice-2.1.xsd')
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousErrorMode);
        }
    }
}
