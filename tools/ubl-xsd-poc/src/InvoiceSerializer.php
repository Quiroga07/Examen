<?php

namespace Ubl21Poc;

use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;

final class InvoiceSerializer
{
    public static function create(): \JMS\Serializer\SerializerInterface
    {
        $builder = SerializerBuilder::create();
        $builder->addMetadataDir(dirname(__DIR__) . '/generated/metadata', 'Ubl21');
        $builder->configureHandlers(function (HandlerRegistryInterface $registry) use ($builder): void {
            $builder->addDefaultHandlers();
            $registry->registerSubscribingHandler(new BaseTypesHandler());
            $registry->registerSubscribingHandler(new XmlSchemaDateHandler());
        });

        return $builder->build();
    }
}
