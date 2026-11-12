<?php

namespace App\Application\Invoices\Data;

final readonly class InvoiceLineData
{
    public function __construct(
        public int $lineNumber,
        public string $productId,
        public string $description,
        public string $quantity,
        public string $unitPrice,
        public string $taxExemptionReasonCode,
    ) {
        if ($lineNumber < 1) {
            throw new \InvalidArgumentException('Invoice line number must be positive.');
        }

        foreach ([$productId, $description, $taxExemptionReasonCode] as $value) {
            if (trim($value) === '') {
                throw new \InvalidArgumentException('Invoice line identifiers, description, and tax reason are required.');
            }
        }

        self::assertDecimal($quantity, 'quantity');
        self::assertDecimal($unitPrice, 'unitPrice');
    }

    private static function assertDecimal(string $value, string $field): void
    {
        if (! preg_match('/^[+-]?(?:\d+(?:\.\d*)?|\.\d+)$/D', $value)) {
            throw new \InvalidArgumentException("Invoice line {$field} must be an XML decimal.");
        }
    }
}
