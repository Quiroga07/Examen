<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Ubl21Poc\InvoiceSerializer;
use Ubl21Poc\SyntheticInvoiceFixture;

$xml = InvoiceSerializer::create()->serialize(
    SyntheticInvoiceFixture::create(SyntheticInvoiceFixture::data()),
    'xml'
);

$outputDirectory = dirname(__DIR__) . '/fixtures';
if (!is_dir($outputDirectory) && !mkdir($outputDirectory, 0775, true) && !is_dir($outputDirectory)) {
    throw new RuntimeException("Could not create fixture output directory {$outputDirectory}");
}

$output = $outputDirectory . '/synthetic-invoice.xml';
if (file_put_contents($output, $xml) === false) {
    throw new RuntimeException("Could not write synthetic XML to {$output}");
}

fwrite(STDOUT, "Wrote unsigned synthetic invoice XML to {$output}\n");
