<?php

namespace App\Application\Invoices\Data;

final readonly class UblInvoiceGenerationData
{
    /**
     * @param  list<InvoiceLineGenerationData>  $lineData
     * @param  list<UblTaxTotalInput>  $documentTaxTotals
     */
    public function __construct(
        public string $legalDocumentId,
        public IssuerLegalPartyData $issuer,
        public array $lineData,
        public array $documentTaxTotals,
        public UblLegalMonetaryTotals $legalMonetaryTotals,
    ) {
        if (trim($legalDocumentId) === '') {
            throw new \InvalidArgumentException('Legal document identifier is required.');
        }
        if ($lineData === [] || ! array_is_list($lineData) || ! array_is_list($documentTaxTotals)) {
            throw new \InvalidArgumentException('Invoice generation line and tax-total collections must be lists.');
        }
        foreach ($lineData as $line) {
            if (! $line instanceof InvoiceLineGenerationData) {
                throw new \InvalidArgumentException('Line generation data must use InvoiceLineGenerationData values.');
            }
        }
        foreach ($documentTaxTotals as $taxTotal) {
            if (! $taxTotal instanceof UblTaxTotalInput) {
                throw new \InvalidArgumentException('Document tax totals must use UblTaxTotalInput values.');
            }
        }
    }
}
