<?php

namespace Ubl21Poc\Tests;

use DOMDocument;
use DOMXPath;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Ubl21Poc\InvoiceSerializer;
use Ubl21Poc\InvoiceXsdValidator;
use Ubl21Poc\SyntheticInvoiceFixture;

final class InvoiceSerializationTest extends TestCase
{
    private const INVOICE_NS = 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2';
    private const CAC_NS = 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2';
    private const CBC_NS = 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2';

    public function test_generated_model_serializes_synthetic_invoice_with_escaped_values(): void
    {
        $xml = $this->serializeFixture();
        $document = new DOMDocument();
        self::assertTrue($document->loadXML($xml, LIBXML_NONET));

        $xpath = new DOMXPath($document);
        $xpath->registerNamespace('ubl', self::INVOICE_NS);
        $xpath->registerNamespace('cac', self::CAC_NS);
        $xpath->registerNamespace('cbc', self::CBC_NS);

        self::assertSame(self::INVOICE_NS, $document->documentElement->namespaceURI);
        self::assertSame('TEST-INV-0001', $xpath->evaluate('string(/ubl:Invoice/cbc:ID)'));
        self::assertSame('2026-01-15', $xpath->evaluate('string(/ubl:Invoice/cbc:IssueDate)'));
        self::assertSame('01', $xpath->evaluate('string(/ubl:Invoice/cbc:InvoiceTypeCode)'));
        self::assertSame('PEN', $xpath->evaluate('string(/ubl:Invoice/cbc:DocumentCurrencyCode)'));
        self::assertSame('SYNTHETIC-ISSUER-001', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)'));
        self::assertSame('SYNTHETIC ISSUER (NOT REAL)', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)'));
        self::assertSame('SYNTHETIC-CUSTOMER-001', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)'));
        self::assertSame('6', $xpath->evaluate('string(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID/@schemeID)'));
        self::assertSame('25.0', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount)'));
        self::assertSame('NIU', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity/@unitCode)'));
        self::assertSame('TEST-PRODUCT-001', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name)'));
        self::assertSame('Synthetic item & < >', $xpath->evaluate('string(/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Description)'));
        self::assertSame('4.5', $xpath->evaluate('string(/ubl:Invoice/cac:TaxTotal/cbc:TaxAmount)'));
        self::assertSame('TEST-TAX-SCHEME', $xpath->evaluate('string(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)'));
        self::assertSame('29.5', $xpath->evaluate('string(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount)'));
        self::assertSame(0, $xpath->query('//*[namespace-uri()="http://www.w3.org/2000/09/xmldsig#" and local-name()="Signature"]')->length);
    }

    public function test_serialized_synthetic_invoice_validates_against_local_official_xsd(): void
    {
        self::assertTrue((new InvoiceXsdValidator())->isValid($this->serializeFixture()));
    }

    public function test_validator_rejects_schema_invalid_invoice(): void
    {
        $invalidXml = sprintf(
            '<Invoice xmlns="%s"><ID>INVALID</ID></Invoice>',
            self::INVOICE_NS
        );

        self::assertFalse((new InvoiceXsdValidator())->isValid($invalidXml));
    }

    public function test_missing_required_synthetic_data_fails_explicitly(): void
    {
        $data = SyntheticInvoiceFixture::data();
        unset($data['invoice_id']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invoice_id');
        SyntheticInvoiceFixture::create($data);
    }

    private function serializeFixture(): string
    {
        return InvoiceSerializer::create()->serialize(
            SyntheticInvoiceFixture::create(SyntheticInvoiceFixture::data()),
            'xml'
        );
    }
}
