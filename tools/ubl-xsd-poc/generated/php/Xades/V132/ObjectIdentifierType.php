<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing ObjectIdentifierType
 *
 *
 * XSD Type: ObjectIdentifierType
 */
class ObjectIdentifierType
{
    /**
     * @var \Ubl21\Xades\V132\IdentifierType $identifier
     */
    private $identifier = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string[] $documentationReferences
     */
    private $documentationReferences = null;

    /**
     * Gets as identifier
     *
     * @return \Ubl21\Xades\V132\IdentifierType
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Sets a new identifier
     *
     * @param \Ubl21\Xades\V132\IdentifierType $identifier
     * @return self
     */
    public function setIdentifier(\Ubl21\Xades\V132\IdentifierType $identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * Gets as description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Adds as documentationReference
     *
     * @return self
     * @param string $documentationReference
     */
    public function addToDocumentationReferences($documentationReference)
    {
        $this->documentationReferences[] = $documentationReference;
        return $this;
    }

    /**
     * isset documentationReferences
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocumentationReferences($index)
    {
        return isset($this->documentationReferences[$index]);
    }

    /**
     * unset documentationReferences
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocumentationReferences($index)
    {
        unset($this->documentationReferences[$index]);
    }

    /**
     * Gets as documentationReferences
     *
     * @return string[]
     */
    public function getDocumentationReferences()
    {
        return $this->documentationReferences;
    }

    /**
     * Sets a new documentationReferences
     *
     * @param string[] $documentationReferences
     * @return self
     */
    public function setDocumentationReferences(?array $documentationReferences = null)
    {
        $this->documentationReferences = $documentationReferences;
        return $this;
    }
}

