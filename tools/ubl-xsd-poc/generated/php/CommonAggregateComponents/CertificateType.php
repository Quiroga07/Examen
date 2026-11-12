<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing CertificateType
 *
 * ABIE
 *  Certificate. Details
 *  A class to define a certificate applied to the item. Certificated can be a requirement to sell goods or services in a jurisdiction.
 *  Certificate
 * XSD Type: CertificateType
 */
class CertificateType
{
    /**
     * BBIE
     *  Certificate. Identifier
     *  An identifier for this certificate.
     *  1
     *  Certificate
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Certificate. Certificate Type Code. Code
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\CertificateTypeCode $certificateTypeCode
     */
    private $certificateTypeCode = null;

    /**
     * BBIE
     *  Certificate. Certificate Type. Text
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\CertificateType $certificateType
     */
    private $certificateType = null;

    /**
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Remarks[] $remarks
     */
    private $remarks = [
        
    ];

    /**
     * ASBIE
     *  Certificate. Issuer_ Party. Party
     *  The authorized organization that issued this certificate, the provider of the certificate.
     *  1
     *  Certificate
     *  Issuer
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\IssuerParty $issuerParty
     */
    private $issuerParty = null;

    /**
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @var \Ubl21\CommonAggregateComponents\DocumentReference[] $documentReference
     */
    private $documentReference = [
        
    ];

    /**
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @var \Ubl21\CommonAggregateComponents\Signature[] $signature
     */
    private $signature = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Certificate. Identifier
     *  An identifier for this certificate.
     *  1
     *  Certificate
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
     *  Certificate. Identifier
     *  An identifier for this certificate.
     *  1
     *  Certificate
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ID $iD
     * @return self
     */
    public function setID(\Ubl21\CommonBasicComponents\ID $iD)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Gets as certificateTypeCode
     *
     * BBIE
     *  Certificate. Certificate Type Code. Code
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\CertificateTypeCode
     */
    public function getCertificateTypeCode()
    {
        return $this->certificateTypeCode;
    }

    /**
     * Sets a new certificateTypeCode
     *
     * BBIE
     *  Certificate. Certificate Type Code. Code
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\CertificateTypeCode $certificateTypeCode
     * @return self
     */
    public function setCertificateTypeCode(\Ubl21\CommonBasicComponents\CertificateTypeCode $certificateTypeCode)
    {
        $this->certificateTypeCode = $certificateTypeCode;
        return $this;
    }

    /**
     * Gets as certificateType
     *
     * BBIE
     *  Certificate. Certificate Type. Text
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\CertificateType
     */
    public function getCertificateType()
    {
        return $this->certificateType;
    }

    /**
     * Sets a new certificateType
     *
     * BBIE
     *  Certificate. Certificate Type. Text
     *  The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
     *  1
     *  Certificate
     *  Certificate Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\CertificateType $certificateType
     * @return self
     */
    public function setCertificateType(\Ubl21\CommonBasicComponents\CertificateType $certificateType)
    {
        $this->certificateType = $certificateType;
        return $this;
    }

    /**
     * Adds as remarks
     *
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Remarks $remarks
     */
    public function addToRemarks(\Ubl21\CommonBasicComponents\Remarks $remarks)
    {
        $this->remarks[] = $remarks;
        return $this;
    }

    /**
     * isset remarks
     *
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRemarks($index)
    {
        return isset($this->remarks[$index]);
    }

    /**
     * unset remarks
     *
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRemarks($index)
    {
        unset($this->remarks[$index]);
    }

    /**
     * Gets as remarks
     *
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Remarks[]
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Sets a new remarks
     *
     * BBIE
     *  Certificate. Remarks. Text
     *  Remarks by the applicant for this certificate.
     *  0..n
     *  Certificate
     *  Remarks
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Remarks[] $remarks
     * @return self
     */
    public function setRemarks(?array $remarks = null)
    {
        $this->remarks = $remarks;
        return $this;
    }

    /**
     * Gets as issuerParty
     *
     * ASBIE
     *  Certificate. Issuer_ Party. Party
     *  The authorized organization that issued this certificate, the provider of the certificate.
     *  1
     *  Certificate
     *  Issuer
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\IssuerParty
     */
    public function getIssuerParty()
    {
        return $this->issuerParty;
    }

    /**
     * Sets a new issuerParty
     *
     * ASBIE
     *  Certificate. Issuer_ Party. Party
     *  The authorized organization that issued this certificate, the provider of the certificate.
     *  1
     *  Certificate
     *  Issuer
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\IssuerParty $issuerParty
     * @return self
     */
    public function setIssuerParty(\Ubl21\CommonAggregateComponents\IssuerParty $issuerParty)
    {
        $this->issuerParty = $issuerParty;
        return $this;
    }

    /**
     * Adds as documentReference
     *
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\DocumentReference $documentReference
     */
    public function addToDocumentReference(\Ubl21\CommonAggregateComponents\DocumentReference $documentReference)
    {
        $this->documentReference[] = $documentReference;
        return $this;
    }

    /**
     * isset documentReference
     *
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocumentReference($index)
    {
        return isset($this->documentReference[$index]);
    }

    /**
     * unset documentReference
     *
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocumentReference($index)
    {
        unset($this->documentReference[$index]);
    }

    /**
     * Gets as documentReference
     *
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return \Ubl21\CommonAggregateComponents\DocumentReference[]
     */
    public function getDocumentReference()
    {
        return $this->documentReference;
    }

    /**
     * Sets a new documentReference
     *
     * ASBIE
     *  Certificate. Document Reference
     *  A reference to a document relevant to this certificate or an application for this certificate.
     *  0..n
     *  Certificate
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param \Ubl21\CommonAggregateComponents\DocumentReference[] $documentReference
     * @return self
     */
    public function setDocumentReference(?array $documentReference = null)
    {
        $this->documentReference = $documentReference;
        return $this;
    }

    /**
     * Adds as signature
     *
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\Signature $signature
     */
    public function addToSignature(\Ubl21\CommonAggregateComponents\Signature $signature)
    {
        $this->signature[] = $signature;
        return $this;
    }

    /**
     * isset signature
     *
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSignature($index)
    {
        return isset($this->signature[$index]);
    }

    /**
     * unset signature
     *
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSignature($index)
    {
        unset($this->signature[$index]);
    }

    /**
     * Gets as signature
     *
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @return \Ubl21\CommonAggregateComponents\Signature[]
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Sets a new signature
     *
     * ASBIE
     *  Certificate. Signature
     *  A signature applied to this certificate.
     *  0..n
     *  Certificate
     *  Signature
     *  Signature
     *  Signature
     *
     * @param \Ubl21\CommonAggregateComponents\Signature[] $signature
     * @return self
     */
    public function setSignature(?array $signature = null)
    {
        $this->signature = $signature;
        return $this;
    }
}

