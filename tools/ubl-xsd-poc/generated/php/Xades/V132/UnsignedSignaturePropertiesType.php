<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing UnsignedSignaturePropertiesType
 *
 *
 * XSD Type: UnsignedSignaturePropertiesType
 */
class UnsignedSignaturePropertiesType
{
    /**
     * @var string $id
     */
    private $id = null;

    /**
     * @var \Ubl21\Xades\V132\CounterSignatureType[] $counterSignature
     */
    private $counterSignature = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\XAdESTimeStampType[] $signatureTimeStamp
     */
    private $signatureTimeStamp = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CompleteCertificateRefsType[] $completeCertificateRefs
     */
    private $completeCertificateRefs = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CompleteRevocationRefsType[] $completeRevocationRefs
     */
    private $completeRevocationRefs = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CompleteCertificateRefsType[] $attributeCertificateRefs
     */
    private $attributeCertificateRefs = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CompleteRevocationRefsType[] $attributeRevocationRefs
     */
    private $attributeRevocationRefs = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\XAdESTimeStampType[] $sigAndRefsTimeStamp
     */
    private $sigAndRefsTimeStamp = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\XAdESTimeStampType[] $refsOnlyTimeStamp
     */
    private $refsOnlyTimeStamp = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CertificateValuesType[] $certificateValues
     */
    private $certificateValues = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\RevocationValuesType[] $revocationValues
     */
    private $revocationValues = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\CertificateValuesType[] $attrAuthoritiesCertValues
     */
    private $attrAuthoritiesCertValues = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\RevocationValuesType[] $attributeRevocationValues
     */
    private $attributeRevocationValues = [
        
    ];

    /**
     * @var \Ubl21\Xades\V132\XAdESTimeStampType[] $archiveTimeStamp
     */
    private $archiveTimeStamp = [
        
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
     * Adds as counterSignature
     *
     * @return self
     * @param \Ubl21\Xades\V132\CounterSignatureType $counterSignature
     */
    public function addToCounterSignature(\Ubl21\Xades\V132\CounterSignatureType $counterSignature)
    {
        $this->counterSignature[] = $counterSignature;
        return $this;
    }

    /**
     * isset counterSignature
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCounterSignature($index)
    {
        return isset($this->counterSignature[$index]);
    }

    /**
     * unset counterSignature
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCounterSignature($index)
    {
        unset($this->counterSignature[$index]);
    }

    /**
     * Gets as counterSignature
     *
     * @return \Ubl21\Xades\V132\CounterSignatureType[]
     */
    public function getCounterSignature()
    {
        return $this->counterSignature;
    }

    /**
     * Sets a new counterSignature
     *
     * @param \Ubl21\Xades\V132\CounterSignatureType[] $counterSignature
     * @return self
     */
    public function setCounterSignature(?array $counterSignature = null)
    {
        $this->counterSignature = $counterSignature;
        return $this;
    }

    /**
     * Adds as signatureTimeStamp
     *
     * @return self
     * @param \Ubl21\Xades\V132\XAdESTimeStampType $signatureTimeStamp
     */
    public function addToSignatureTimeStamp(\Ubl21\Xades\V132\XAdESTimeStampType $signatureTimeStamp)
    {
        $this->signatureTimeStamp[] = $signatureTimeStamp;
        return $this;
    }

    /**
     * isset signatureTimeStamp
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSignatureTimeStamp($index)
    {
        return isset($this->signatureTimeStamp[$index]);
    }

    /**
     * unset signatureTimeStamp
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSignatureTimeStamp($index)
    {
        unset($this->signatureTimeStamp[$index]);
    }

    /**
     * Gets as signatureTimeStamp
     *
     * @return \Ubl21\Xades\V132\XAdESTimeStampType[]
     */
    public function getSignatureTimeStamp()
    {
        return $this->signatureTimeStamp;
    }

    /**
     * Sets a new signatureTimeStamp
     *
     * @param \Ubl21\Xades\V132\XAdESTimeStampType[] $signatureTimeStamp
     * @return self
     */
    public function setSignatureTimeStamp(?array $signatureTimeStamp = null)
    {
        $this->signatureTimeStamp = $signatureTimeStamp;
        return $this;
    }

    /**
     * Adds as completeCertificateRefs
     *
     * @return self
     * @param \Ubl21\Xades\V132\CompleteCertificateRefsType $completeCertificateRefs
     */
    public function addToCompleteCertificateRefs(\Ubl21\Xades\V132\CompleteCertificateRefsType $completeCertificateRefs)
    {
        $this->completeCertificateRefs[] = $completeCertificateRefs;
        return $this;
    }

    /**
     * isset completeCertificateRefs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCompleteCertificateRefs($index)
    {
        return isset($this->completeCertificateRefs[$index]);
    }

    /**
     * unset completeCertificateRefs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCompleteCertificateRefs($index)
    {
        unset($this->completeCertificateRefs[$index]);
    }

    /**
     * Gets as completeCertificateRefs
     *
     * @return \Ubl21\Xades\V132\CompleteCertificateRefsType[]
     */
    public function getCompleteCertificateRefs()
    {
        return $this->completeCertificateRefs;
    }

    /**
     * Sets a new completeCertificateRefs
     *
     * @param \Ubl21\Xades\V132\CompleteCertificateRefsType[] $completeCertificateRefs
     * @return self
     */
    public function setCompleteCertificateRefs(?array $completeCertificateRefs = null)
    {
        $this->completeCertificateRefs = $completeCertificateRefs;
        return $this;
    }

    /**
     * Adds as completeRevocationRefs
     *
     * @return self
     * @param \Ubl21\Xades\V132\CompleteRevocationRefsType $completeRevocationRefs
     */
    public function addToCompleteRevocationRefs(\Ubl21\Xades\V132\CompleteRevocationRefsType $completeRevocationRefs)
    {
        $this->completeRevocationRefs[] = $completeRevocationRefs;
        return $this;
    }

    /**
     * isset completeRevocationRefs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCompleteRevocationRefs($index)
    {
        return isset($this->completeRevocationRefs[$index]);
    }

    /**
     * unset completeRevocationRefs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCompleteRevocationRefs($index)
    {
        unset($this->completeRevocationRefs[$index]);
    }

    /**
     * Gets as completeRevocationRefs
     *
     * @return \Ubl21\Xades\V132\CompleteRevocationRefsType[]
     */
    public function getCompleteRevocationRefs()
    {
        return $this->completeRevocationRefs;
    }

    /**
     * Sets a new completeRevocationRefs
     *
     * @param \Ubl21\Xades\V132\CompleteRevocationRefsType[] $completeRevocationRefs
     * @return self
     */
    public function setCompleteRevocationRefs(?array $completeRevocationRefs = null)
    {
        $this->completeRevocationRefs = $completeRevocationRefs;
        return $this;
    }

    /**
     * Adds as attributeCertificateRefs
     *
     * @return self
     * @param \Ubl21\Xades\V132\CompleteCertificateRefsType $attributeCertificateRefs
     */
    public function addToAttributeCertificateRefs(\Ubl21\Xades\V132\CompleteCertificateRefsType $attributeCertificateRefs)
    {
        $this->attributeCertificateRefs[] = $attributeCertificateRefs;
        return $this;
    }

    /**
     * isset attributeCertificateRefs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAttributeCertificateRefs($index)
    {
        return isset($this->attributeCertificateRefs[$index]);
    }

    /**
     * unset attributeCertificateRefs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAttributeCertificateRefs($index)
    {
        unset($this->attributeCertificateRefs[$index]);
    }

    /**
     * Gets as attributeCertificateRefs
     *
     * @return \Ubl21\Xades\V132\CompleteCertificateRefsType[]
     */
    public function getAttributeCertificateRefs()
    {
        return $this->attributeCertificateRefs;
    }

    /**
     * Sets a new attributeCertificateRefs
     *
     * @param \Ubl21\Xades\V132\CompleteCertificateRefsType[] $attributeCertificateRefs
     * @return self
     */
    public function setAttributeCertificateRefs(?array $attributeCertificateRefs = null)
    {
        $this->attributeCertificateRefs = $attributeCertificateRefs;
        return $this;
    }

    /**
     * Adds as attributeRevocationRefs
     *
     * @return self
     * @param \Ubl21\Xades\V132\CompleteRevocationRefsType $attributeRevocationRefs
     */
    public function addToAttributeRevocationRefs(\Ubl21\Xades\V132\CompleteRevocationRefsType $attributeRevocationRefs)
    {
        $this->attributeRevocationRefs[] = $attributeRevocationRefs;
        return $this;
    }

    /**
     * isset attributeRevocationRefs
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAttributeRevocationRefs($index)
    {
        return isset($this->attributeRevocationRefs[$index]);
    }

    /**
     * unset attributeRevocationRefs
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAttributeRevocationRefs($index)
    {
        unset($this->attributeRevocationRefs[$index]);
    }

    /**
     * Gets as attributeRevocationRefs
     *
     * @return \Ubl21\Xades\V132\CompleteRevocationRefsType[]
     */
    public function getAttributeRevocationRefs()
    {
        return $this->attributeRevocationRefs;
    }

    /**
     * Sets a new attributeRevocationRefs
     *
     * @param \Ubl21\Xades\V132\CompleteRevocationRefsType[] $attributeRevocationRefs
     * @return self
     */
    public function setAttributeRevocationRefs(?array $attributeRevocationRefs = null)
    {
        $this->attributeRevocationRefs = $attributeRevocationRefs;
        return $this;
    }

    /**
     * Adds as sigAndRefsTimeStamp
     *
     * @return self
     * @param \Ubl21\Xades\V132\XAdESTimeStampType $sigAndRefsTimeStamp
     */
    public function addToSigAndRefsTimeStamp(\Ubl21\Xades\V132\XAdESTimeStampType $sigAndRefsTimeStamp)
    {
        $this->sigAndRefsTimeStamp[] = $sigAndRefsTimeStamp;
        return $this;
    }

    /**
     * isset sigAndRefsTimeStamp
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSigAndRefsTimeStamp($index)
    {
        return isset($this->sigAndRefsTimeStamp[$index]);
    }

    /**
     * unset sigAndRefsTimeStamp
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSigAndRefsTimeStamp($index)
    {
        unset($this->sigAndRefsTimeStamp[$index]);
    }

    /**
     * Gets as sigAndRefsTimeStamp
     *
     * @return \Ubl21\Xades\V132\XAdESTimeStampType[]
     */
    public function getSigAndRefsTimeStamp()
    {
        return $this->sigAndRefsTimeStamp;
    }

    /**
     * Sets a new sigAndRefsTimeStamp
     *
     * @param \Ubl21\Xades\V132\XAdESTimeStampType[] $sigAndRefsTimeStamp
     * @return self
     */
    public function setSigAndRefsTimeStamp(?array $sigAndRefsTimeStamp = null)
    {
        $this->sigAndRefsTimeStamp = $sigAndRefsTimeStamp;
        return $this;
    }

    /**
     * Adds as refsOnlyTimeStamp
     *
     * @return self
     * @param \Ubl21\Xades\V132\XAdESTimeStampType $refsOnlyTimeStamp
     */
    public function addToRefsOnlyTimeStamp(\Ubl21\Xades\V132\XAdESTimeStampType $refsOnlyTimeStamp)
    {
        $this->refsOnlyTimeStamp[] = $refsOnlyTimeStamp;
        return $this;
    }

    /**
     * isset refsOnlyTimeStamp
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRefsOnlyTimeStamp($index)
    {
        return isset($this->refsOnlyTimeStamp[$index]);
    }

    /**
     * unset refsOnlyTimeStamp
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRefsOnlyTimeStamp($index)
    {
        unset($this->refsOnlyTimeStamp[$index]);
    }

    /**
     * Gets as refsOnlyTimeStamp
     *
     * @return \Ubl21\Xades\V132\XAdESTimeStampType[]
     */
    public function getRefsOnlyTimeStamp()
    {
        return $this->refsOnlyTimeStamp;
    }

    /**
     * Sets a new refsOnlyTimeStamp
     *
     * @param \Ubl21\Xades\V132\XAdESTimeStampType[] $refsOnlyTimeStamp
     * @return self
     */
    public function setRefsOnlyTimeStamp(?array $refsOnlyTimeStamp = null)
    {
        $this->refsOnlyTimeStamp = $refsOnlyTimeStamp;
        return $this;
    }

    /**
     * Adds as certificateValues
     *
     * @return self
     * @param \Ubl21\Xades\V132\CertificateValuesType $certificateValues
     */
    public function addToCertificateValues(\Ubl21\Xades\V132\CertificateValuesType $certificateValues)
    {
        $this->certificateValues[] = $certificateValues;
        return $this;
    }

    /**
     * isset certificateValues
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCertificateValues($index)
    {
        return isset($this->certificateValues[$index]);
    }

    /**
     * unset certificateValues
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCertificateValues($index)
    {
        unset($this->certificateValues[$index]);
    }

    /**
     * Gets as certificateValues
     *
     * @return \Ubl21\Xades\V132\CertificateValuesType[]
     */
    public function getCertificateValues()
    {
        return $this->certificateValues;
    }

    /**
     * Sets a new certificateValues
     *
     * @param \Ubl21\Xades\V132\CertificateValuesType[] $certificateValues
     * @return self
     */
    public function setCertificateValues(?array $certificateValues = null)
    {
        $this->certificateValues = $certificateValues;
        return $this;
    }

    /**
     * Adds as revocationValues
     *
     * @return self
     * @param \Ubl21\Xades\V132\RevocationValuesType $revocationValues
     */
    public function addToRevocationValues(\Ubl21\Xades\V132\RevocationValuesType $revocationValues)
    {
        $this->revocationValues[] = $revocationValues;
        return $this;
    }

    /**
     * isset revocationValues
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRevocationValues($index)
    {
        return isset($this->revocationValues[$index]);
    }

    /**
     * unset revocationValues
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRevocationValues($index)
    {
        unset($this->revocationValues[$index]);
    }

    /**
     * Gets as revocationValues
     *
     * @return \Ubl21\Xades\V132\RevocationValuesType[]
     */
    public function getRevocationValues()
    {
        return $this->revocationValues;
    }

    /**
     * Sets a new revocationValues
     *
     * @param \Ubl21\Xades\V132\RevocationValuesType[] $revocationValues
     * @return self
     */
    public function setRevocationValues(?array $revocationValues = null)
    {
        $this->revocationValues = $revocationValues;
        return $this;
    }

    /**
     * Adds as attrAuthoritiesCertValues
     *
     * @return self
     * @param \Ubl21\Xades\V132\CertificateValuesType $attrAuthoritiesCertValues
     */
    public function addToAttrAuthoritiesCertValues(\Ubl21\Xades\V132\CertificateValuesType $attrAuthoritiesCertValues)
    {
        $this->attrAuthoritiesCertValues[] = $attrAuthoritiesCertValues;
        return $this;
    }

    /**
     * isset attrAuthoritiesCertValues
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAttrAuthoritiesCertValues($index)
    {
        return isset($this->attrAuthoritiesCertValues[$index]);
    }

    /**
     * unset attrAuthoritiesCertValues
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAttrAuthoritiesCertValues($index)
    {
        unset($this->attrAuthoritiesCertValues[$index]);
    }

    /**
     * Gets as attrAuthoritiesCertValues
     *
     * @return \Ubl21\Xades\V132\CertificateValuesType[]
     */
    public function getAttrAuthoritiesCertValues()
    {
        return $this->attrAuthoritiesCertValues;
    }

    /**
     * Sets a new attrAuthoritiesCertValues
     *
     * @param \Ubl21\Xades\V132\CertificateValuesType[] $attrAuthoritiesCertValues
     * @return self
     */
    public function setAttrAuthoritiesCertValues(?array $attrAuthoritiesCertValues = null)
    {
        $this->attrAuthoritiesCertValues = $attrAuthoritiesCertValues;
        return $this;
    }

    /**
     * Adds as attributeRevocationValues
     *
     * @return self
     * @param \Ubl21\Xades\V132\RevocationValuesType $attributeRevocationValues
     */
    public function addToAttributeRevocationValues(\Ubl21\Xades\V132\RevocationValuesType $attributeRevocationValues)
    {
        $this->attributeRevocationValues[] = $attributeRevocationValues;
        return $this;
    }

    /**
     * isset attributeRevocationValues
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAttributeRevocationValues($index)
    {
        return isset($this->attributeRevocationValues[$index]);
    }

    /**
     * unset attributeRevocationValues
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAttributeRevocationValues($index)
    {
        unset($this->attributeRevocationValues[$index]);
    }

    /**
     * Gets as attributeRevocationValues
     *
     * @return \Ubl21\Xades\V132\RevocationValuesType[]
     */
    public function getAttributeRevocationValues()
    {
        return $this->attributeRevocationValues;
    }

    /**
     * Sets a new attributeRevocationValues
     *
     * @param \Ubl21\Xades\V132\RevocationValuesType[] $attributeRevocationValues
     * @return self
     */
    public function setAttributeRevocationValues(?array $attributeRevocationValues = null)
    {
        $this->attributeRevocationValues = $attributeRevocationValues;
        return $this;
    }

    /**
     * Adds as archiveTimeStamp
     *
     * @return self
     * @param \Ubl21\Xades\V132\XAdESTimeStampType $archiveTimeStamp
     */
    public function addToArchiveTimeStamp(\Ubl21\Xades\V132\XAdESTimeStampType $archiveTimeStamp)
    {
        $this->archiveTimeStamp[] = $archiveTimeStamp;
        return $this;
    }

    /**
     * isset archiveTimeStamp
     *
     * @param int|string $index
     * @return bool
     */
    public function issetArchiveTimeStamp($index)
    {
        return isset($this->archiveTimeStamp[$index]);
    }

    /**
     * unset archiveTimeStamp
     *
     * @param int|string $index
     * @return void
     */
    public function unsetArchiveTimeStamp($index)
    {
        unset($this->archiveTimeStamp[$index]);
    }

    /**
     * Gets as archiveTimeStamp
     *
     * @return \Ubl21\Xades\V132\XAdESTimeStampType[]
     */
    public function getArchiveTimeStamp()
    {
        return $this->archiveTimeStamp;
    }

    /**
     * Sets a new archiveTimeStamp
     *
     * @param \Ubl21\Xades\V132\XAdESTimeStampType[] $archiveTimeStamp
     * @return self
     */
    public function setArchiveTimeStamp(?array $archiveTimeStamp = null)
    {
        $this->archiveTimeStamp = $archiveTimeStamp;
        return $this;
    }
}

