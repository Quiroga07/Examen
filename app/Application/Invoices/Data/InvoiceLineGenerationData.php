<?php

namespace App\Application\Invoices\Data;

final readonly class InvoiceLineGenerationData
{
    /**
     * @param  list<UblTaxTotalInput>  $taxTotals
     */
    public function __construct(
        public int $lineNumber,
        public string $unitCode,
        public string $lineExtensionAmount,
        public array $taxTotals = [],
    ) {
        if ($lineNumber < 1 || trim($unitCode) === '' || ! array_is_list($taxTotals)) {
            throw new \InvalidArgumentException('Invoice line generation data is invalid.');
        }
        self::assertDecimal($lineExtensionAmount, 'lineExtensionAmount');

        foreach ($taxTotals as $taxTotal) {
            if (! $taxTotal instanceof UblTaxTotalInput) {
                throw new \InvalidArgumentException('Line tax totals must be UblTaxTotalInput values.');
            }
        }
    }

    private static function assertDecimal(string $value, string $field): void
    {
        if (! preg_match('/^[+-]?(?:\d+(?:\.\d*)?|\.\d+)$/D', $value)) {
            throw new \InvalidArgumentException("Invoice line {$field} must be an XML decimal.");
        }
    }
}
