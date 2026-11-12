<?php

namespace App\Application\Invoices\Data;

final readonly class IssuerLegalPartyData
{
    /**
     * @param  list<PartyIdentificationData>  $partyIdentifications
     */
    public function __construct(
        public string $registrationName,
        public array $partyIdentifications = [],
    ) {
        if (trim($registrationName) === '' || ! array_is_list($partyIdentifications)) {
            throw new \InvalidArgumentException('Issuer registration name and identification list are required.');
        }

        foreach ($partyIdentifications as $identification) {
            if (! $identification instanceof PartyIdentificationData) {
                throw new \InvalidArgumentException('Issuer identifications must be PartyIdentificationData values.');
            }
        }
    }
}
