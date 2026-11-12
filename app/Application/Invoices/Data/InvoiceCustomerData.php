<?php

namespace App\Application\Invoices\Data;

final readonly class InvoiceCustomerData
{
    public function __construct(
        public string $identityType,
        public string $identityNumber,
        public string $legalName,
    ) {
        foreach ([$identityType, $identityNumber, $legalName] as $value) {
            if (trim($value) === '') {
                throw new \InvalidArgumentException('Customer identity type, number, and legal name are required.');
            }
        }
    }
}
