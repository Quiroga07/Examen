<?php

namespace App\Application\Invoices\Data;

use DateTimeImmutable;

final readonly class InvoiceRequestData
{
    /**
     * @param  list<InvoiceLineData>  $lines
     */
    public function __construct(
        public string $documentType,
        public DateTimeImmutable $issueDate,
        public string $currency,
        public InvoiceCustomerData $customer,
        public array $lines,
    ) {
        if (trim($documentType) === '' || trim($currency) === '') {
            throw new \InvalidArgumentException('Invoice document type and currency are required.');
        }

        if ($lines === [] || ! array_is_list($lines)) {
            throw new \InvalidArgumentException('At least one invoice line is required.');
        }

        foreach ($lines as $line) {
            if (! $line instanceof InvoiceLineData) {
                throw new \InvalidArgumentException('Invoice lines must be InvoiceLineData values.');
            }
        }
    }
}
