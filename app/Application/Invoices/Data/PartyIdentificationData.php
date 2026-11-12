<?php

namespace App\Application\Invoices\Data;

final readonly class PartyIdentificationData
{
    public function __construct(
        public string $id,
        public ?string $schemeId = null,
    ) {
        if (trim($id) === '' || ($schemeId !== null && trim($schemeId) === '')) {
            throw new \InvalidArgumentException('Party identification values cannot be blank.');
        }
    }
}
