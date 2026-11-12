<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing CommitmentTypeIndicationType
 *
 *
 * XSD Type: CommitmentTypeIndicationType
 */
class CommitmentTypeIndicationType
{
    /**
     * @var \Ubl21\Xades\V132\ObjectIdentifierType $commitmentTypeId
     */
    private $commitmentTypeId = null;

    /**
     * @var string[] $objectReference
     */
    private $objectReference = [
        
    ];

    /**
     * @var mixed $allSignedDataObjects
     */
    private $allSignedDataObjects = null;

    /**
     * @var \Ubl21\Xades\V132\AnyType[] $commitmentTypeQualifiers
     */
    private $commitmentTypeQualifiers = null;

    /**
     * Gets as commitmentTypeId
     *
     * @return \Ubl21\Xades\V132\ObjectIdentifierType
     */
    public function getCommitmentTypeId()
    {
        return $this->commitmentTypeId;
    }

    /**
     * Sets a new commitmentTypeId
     *
     * @param \Ubl21\Xades\V132\ObjectIdentifierType $commitmentTypeId
     * @return self
     */
    public function setCommitmentTypeId(\Ubl21\Xades\V132\ObjectIdentifierType $commitmentTypeId)
    {
        $this->commitmentTypeId = $commitmentTypeId;
        return $this;
    }

    /**
     * Adds as objectReference
     *
     * @return self
     * @param string $objectReference
     */
    public function addToObjectReference($objectReference)
    {
        $this->objectReference[] = $objectReference;
        return $this;
    }

    /**
     * isset objectReference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetObjectReference($index)
    {
        return isset($this->objectReference[$index]);
    }

    /**
     * unset objectReference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetObjectReference($index)
    {
        unset($this->objectReference[$index]);
    }

    /**
     * Gets as objectReference
     *
     * @return string[]
     */
    public function getObjectReference()
    {
        return $this->objectReference;
    }

    /**
     * Sets a new objectReference
     *
     * @param string[] $objectReference
     * @return self
     */
    public function setObjectReference(?array $objectReference = null)
    {
        $this->objectReference = $objectReference;
        return $this;
    }

    /**
     * Gets as allSignedDataObjects
     *
     * @return mixed
     */
    public function getAllSignedDataObjects()
    {
        return $this->allSignedDataObjects;
    }

    /**
     * Sets a new allSignedDataObjects
     *
     * @param mixed $allSignedDataObjects
     * @return self
     */
    public function setAllSignedDataObjects($allSignedDataObjects)
    {
        $this->allSignedDataObjects = $allSignedDataObjects;
        return $this;
    }

    /**
     * Adds as commitmentTypeQualifier
     *
     * @return self
     * @param \Ubl21\Xades\V132\AnyType $commitmentTypeQualifier
     */
    public function addToCommitmentTypeQualifiers(\Ubl21\Xades\V132\AnyType $commitmentTypeQualifier)
    {
        $this->commitmentTypeQualifiers[] = $commitmentTypeQualifier;
        return $this;
    }

    /**
     * isset commitmentTypeQualifiers
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCommitmentTypeQualifiers($index)
    {
        return isset($this->commitmentTypeQualifiers[$index]);
    }

    /**
     * unset commitmentTypeQualifiers
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCommitmentTypeQualifiers($index)
    {
        unset($this->commitmentTypeQualifiers[$index]);
    }

    /**
     * Gets as commitmentTypeQualifiers
     *
     * @return \Ubl21\Xades\V132\AnyType[]
     */
    public function getCommitmentTypeQualifiers()
    {
        return $this->commitmentTypeQualifiers;
    }

    /**
     * Sets a new commitmentTypeQualifiers
     *
     * @param \Ubl21\Xades\V132\AnyType[] $commitmentTypeQualifiers
     * @return self
     */
    public function setCommitmentTypeQualifiers(?array $commitmentTypeQualifiers = null)
    {
        $this->commitmentTypeQualifiers = $commitmentTypeQualifiers;
        return $this;
    }
}

