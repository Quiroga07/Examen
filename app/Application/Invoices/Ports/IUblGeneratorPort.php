<?php

namespace App\Application\Invoices\Ports;

use App\Application\Invoices\Data\InvoiceRequestData;
use App\Application\Invoices\Data\UblInvoiceGenerationData;

interface IUblGeneratorPort
{
    public function generate(InvoiceRequestData $request, UblInvoiceGenerationData $generationData): string;
}
