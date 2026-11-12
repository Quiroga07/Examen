<?php

namespace App\Application\Invoices\Data;

final readonly class UblTaxSubtotalInput
{
    public function __construct(
        public string $taxAmount,
        public string $taxSchemeId,
        public ?string $taxableAmount = null,
    ) {
        self::assertDecimal($taxAmount, 'taxAmount');
        if ($taxableAmount !== null) {
            self::assertDecimal($taxableAmount, 'taxableAmount');
        }
        if (trim($taxSchemeId) === '') {
            throw new \InvalidArgumentException('Tax scheme identifier is required.');
        }
    }

    private static function assertDecimal(string $value, string $field): void
    {
        if (! preg_match('/^[+-]?(?:\d+(?:\.\d*)?|\.\d+)$/D', $value)) {
            throw new \InvalidArgumentException("Tax subtotal {$field} must be an XML decimal.");
        }
    }
}
