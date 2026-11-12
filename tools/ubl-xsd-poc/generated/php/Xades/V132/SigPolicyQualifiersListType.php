<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing SigPolicyQualifiersListType
 *
 *
 * XSD Type: SigPolicyQualifiersListType
 */
class SigPolicyQualifiersListType
{
    /**
     * @var \Ubl21\Xades\V132\AnyType[] $sigPolicyQualifier
     */
    private $sigPolicyQualifier = [
        
    ];

    /**
     * Adds as sigPolicyQualifier
     *
     * @return self
     * @param \Ubl21\Xades\V132\AnyType $sigPolicyQualifier
     */
    public function addToSigPolicyQualifier(\Ubl21\Xades\V132\AnyType $sigPolicyQualifier)
    {
        $this->sigPolicyQualifier[] = $sigPolicyQualifier;
        return $this;
    }

    /**
     * isset sigPolicyQualifier
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSigPolicyQualifier($index)
    {
        return isset($this->sigPolicyQualifier[$index]);
    }

    /**
     * unset sigPolicyQualifier
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSigPolicyQualifier($index)
    {
        unset($this->sigPolicyQualifier[$index]);
    }

    /**
     * Gets as sigPolicyQualifier
     *
     * @return \Ubl21\Xades\V132\AnyType[]
     */
    public function getSigPolicyQualifier()
    {
        return $this->sigPolicyQualifier;
    }

    /**
     * Sets a new sigPolicyQualifier
     *
     * @param \Ubl21\Xades\V132\AnyType[] $sigPolicyQualifier
     * @return self
     */
    public function setSigPolicyQualifier(array $sigPolicyQualifier)
    {
        $this->sigPolicyQualifier = $sigPolicyQualifier;
        return $this;
    }
}

