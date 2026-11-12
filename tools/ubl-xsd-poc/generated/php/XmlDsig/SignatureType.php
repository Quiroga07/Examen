<?php

namespace Ubl21\XmlDsig;

/**
 * Class representing SignatureType
 *
 *
 * XSD Type: SignatureType
 */
class SignatureType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Ubl21\XmlDsig\SignedInfo $signedInfo
     */
    private $signedInfo = null;

    /**
     * @var \Ubl21\XmlDsig\SignatureValue $signatureValue
     */
    private $signatureValue = null;

    /**
     * @var \Ubl21\XmlDsig\KeyInfo $keyInfo
     */
    private $keyInfo = null;

    /**
     * @var \Ubl21\XmlDsig\ObjectXsd[] $object
     */
    private $object = [
        
    ];

    /**
     * Gets as id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a new id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets as signedInfo
     *
     * @return \Ubl21\XmlDsig\SignedInfo
     */
    public function getSignedInfo()
    {
        return $this->signedInfo;
    }

    /**
     * Sets a new signedInfo
     *
     * @param \Ubl21\XmlDsig\SignedInfo $signedInfo
     * @return self
     */
    public function setSignedInfo(\Ubl21\XmlDsig\SignedInfo $signedInfo)
    {
        $this->signedInfo = $signedInfo;
        return $this;
    }

    /**
     * Gets as signatureValue
     *
     * @return \Ubl21\XmlDsig\SignatureValue
     */
    public function getSignatureValue()
    {
        return $this->signatureValue;
    }

    /**
     * Sets a new signatureValue
     *
     * @param \Ubl21\XmlDsig\SignatureValue $signatureValue
     * @return self
     */
    public function setSignatureValue(\Ubl21\XmlDsig\SignatureValue $signatureValue)
    {
        $this->signatureValue = $signatureValue;
        return $this;
    }

    /**
     * Gets as keyInfo
     *
     * @return \Ubl21\XmlDsig\KeyInfo
     */
    public function getKeyInfo()
    {
        return $this->keyInfo;
    }

    /**
     * Sets a new keyInfo
     *
     * @param \Ubl21\XmlDsig\KeyInfo $keyInfo
     * @return self
     */
    public function setKeyInfo(?\Ubl21\XmlDsig\KeyInfo $keyInfo = null)
    {
        $this->keyInfo = $keyInfo;
        return $this;
    }

    /**
     * Adds as object
     *
     * @return self
     * @param \Ubl21\XmlDsig\ObjectXsd $object
     */
    public function addToObject(\Ubl21\XmlDsig\ObjectXsd $object)
    {
        $this->object[] = $object;
        return $this;
    }

    /**
     * isset object
     *
     * @param int|string $index
     * @return bool
     */
    public function issetObject($index)
    {
        return isset($this->object[$index]);
    }

    /**
     * unset object
     *
     * @param int|string $index
     * @return void
     */
    public function unsetObject($index)
    {
        unset($this->object[$index]);
    }

    /**
     * Gets as object
     *
     * @return \Ubl21\XmlDsig\ObjectXsd[]
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets a new object
     *
     * @param \Ubl21\XmlDsig\ObjectXsd[] $object
     * @return self
     */
    public function setObject(?array $object = null)
    {
        $this->object = $object;
        return $this;
    }
}

