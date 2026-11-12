<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing CounterSignatureType
 *
 *
 * XSD Type: CounterSignatureType
 */
class CounterSignatureType
{
    /**
     * @var \Ubl21\XmlDsig\Signature $signature
     */
    private $signature = null;

    /**
     * Gets as signature
     *
     * @return \Ubl21\XmlDsig\Signature
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Sets a new signature
     *
     * @param \Ubl21\XmlDsig\Signature $signature
     * @return self
     */
    public function setSignature(\Ubl21\XmlDsig\Signature $signature)
    {
        $this->signature = $signature;
        return $this;
    }
}

