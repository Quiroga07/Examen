<?php

namespace App\Application\Invoices\Data;

final readonly class UblLegalMonetaryTotals
{
    public function __construct(
        public string $payableAmount,
        public ?string $lineExtensionAmount = null,
        public ?string $taxExclusiveAmount = null,
        public ?string $taxInclusiveAmount = null,
        public ?string $allowanceTotalAmount = null,
        public ?string $chargeTotalAmount = null,
        public ?string $prepaidAmount = null,
        public ?string $payableRoundingAmount = null,
    ) {
        foreach ([
            'payableAmount' => $payableAmount,
            'lineExtensionAmount' => $lineExtensionAmount,
            'taxExclusiveAmount' => $taxExclusiveAmount,
            'taxInclusiveAmount' => $taxInclusiveAmount,
            'allowanceTotalAmount' => $allowanceTotalAmount,
            'chargeTotalAmount' => $chargeTotalAmount,
            'prepaidAmount' => $prepaidAmount,
            'payableRoundingAmount' => $payableRoundingAmount,
        ] as $field => $value) {
            if ($value !== null && ! preg_match('/^[+-]?(?:\d+(?:\.\d*)?|\.\d+)$/D', $value)) {
                throw new \InvalidArgumentException("Legal monetary total {$field} must be an XML decimal.");
            }
        }
    }
}
