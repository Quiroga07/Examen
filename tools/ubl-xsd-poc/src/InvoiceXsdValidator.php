<?php

namespace Ubl21Poc;

use DOMDocument;

final class InvoiceXsdValidator
{
    public function isValid(string $xml): bool
    {
        $previousErrorMode = libxml_use_internal_errors(true);
        libxml_clear_errors();

        try {
            $document = new DOMDocument();
            if (!$document->loadXML($xml, LIBXML_NONET)) {
                return false;
            }

            return $document->schemaValidate(
                dirname(__DIR__) . '/schema-bundle/xsd/maindoc/UBL-Invoice-2.1.xsd'
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousErrorMode);
        }
    }
}
