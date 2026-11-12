<?php

namespace Ubl21\SignatureAggregateComponents;

/**
 * Class representing SignatureInformationType
 *
 * ABIE
 *  Signature Information. Details
 *  This class captures a single signature and optionally associates to a signature in the document with the corresponding identifier.
 *  Signature Information
 * XSD Type: SignatureInformationType
 */
class SignatureInformationType
{
    /**
     * BBIE
     *  Signature Information. Identifier
     *  This specifies the identifier of the signature distinguishing it from other signatures.
     *  0..1
     *  Signature Information
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Signature Information. Referenced Signature Identifier. Identifier
     *  This associates this signature with the identifier of a signature business object in the document.
     *  0..1
     *  Signature Information
     *  Referenced Signature Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\SignatureBasicComponents\ReferencedSignatureID $referencedSignatureID
     */
    private $referencedSignatureID = null;

    /**
     * This is a single digital signature as defined by the W3C specification.
     *
     * @var \Ubl21\XmlDsig\Signature $signature
     */
    private $signature = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Signature Information. Identifier
     *  This specifies the identifier of the signature distinguishing it from other signatures.
     *  0..1
     *  Signature Information
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\ID
     */
    public function getID()
    {
        return $this->iD;
    }

    /**
     * Sets a new iD
     *
     * BBIE
     *  Signature Information. Identifier
     *  This specifies the identifier of the signature distinguishing it from other signatures.
     *  0..1
     *  Signature Information
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ID $iD
     * @return self
     */
    public function setID(?\Ubl21\CommonBasicComponents\ID $iD = null)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Gets as referencedSignatureID
     *
     * BBIE
     *  Signature Information. Referenced Signature Identifier. Identifier
     *  This associates this signature with the identifier of a signature business object in the document.
     *  0..1
     *  Signature Information
     *  Referenced Signature Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\SignatureBasicComponents\ReferencedSignatureID
     */
    public function getReferencedSignatureID()
    {
        return $this->referencedSignatureID;
    }

    /**
     * Sets a new referencedSignatureID
     *
     * BBIE
     *  Signature Information. Referenced Signature Identifier. Identifier
     *  This associates this signature with the identifier of a signature business object in the document.
     *  0..1
     *  Signature Information
     *  Referenced Signature Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\SignatureBasicComponents\ReferencedSignatureID $referencedSignatureID
     * @return self
     */
    public function setReferencedSignatureID(?\Ubl21\SignatureBasicComponents\ReferencedSignatureID $referencedSignatureID = null)
    {
        $this->referencedSignatureID = $referencedSignatureID;
        return $this;
    }

    /**
     * Gets as signature
     *
     * This is a single digital signature as defined by the W3C specification.
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
     * This is a single digital signature as defined by the W3C specification.
     *
     * @param \Ubl21\XmlDsig\Signature $signature
     * @return self
     */
    public function setSignature(?\Ubl21\XmlDsig\Signature $signature = null)
    {
        $this->signature = $signature;
        return $this;
    }
}

