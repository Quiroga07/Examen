<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing DataObjectFormatType
 *
 *
 * XSD Type: DataObjectFormatType
 */
class DataObjectFormatType
{
    /**
     * @var string $objectReference
     */
    private $objectReference = null;

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var \Ubl21\Xades\V132\ObjectIdentifierType $objectIdentifier
     */
    private $objectIdentifier = null;

    /**
     * @var string $mimeType
     */
    private $mimeType = null;

    /**
     * @var string $encoding
     */
    private $encoding = null;

    /**
     * Gets as objectReference
     *
     * @return string
     */
    public function getObjectReference()
    {
        return $this->objectReference;
    }

    /**
     * Sets a new objectReference
     *
     * @param string $objectReference
     * @return self
     */
    public function setObjectReference($objectReference)
    {
        $this->objectReference = $objectReference;
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
     * Gets as objectIdentifier
     *
     * @return \Ubl21\Xades\V132\ObjectIdentifierType
     */
    public function getObjectIdentifier()
    {
        return $this->objectIdentifier;
    }

    /**
     * Sets a new objectIdentifier
     *
     * @param \Ubl21\Xades\V132\ObjectIdentifierType $objectIdentifier
     * @return self
     */
    public function setObjectIdentifier(?\Ubl21\Xades\V132\ObjectIdentifierType $objectIdentifier = null)
    {
        $this->objectIdentifier = $objectIdentifier;
        return $this;
    }

    /**
     * Gets as mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Sets a new mimeType
     *
     * @param string $mimeType
     * @return self
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Gets as encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Sets a new encoding
     *
     * @param string $encoding
     * @return self
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
        return $this;
    }
}

