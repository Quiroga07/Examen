<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing DocumentReferenceType
 *
 * ABIE
 *  Document Reference. Details
 *  A class to define a reference to a document.
 *  Document Reference
 * XSD Type: DocumentReferenceType
 */
class DocumentReferenceType
{
    /**
     * BBIE
     *  Document Reference. Identifier
     *  An identifier for the referenced document.
     *  1
     *  Document Reference
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  PO-001 3333-44-123
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Document Reference. Copy_ Indicator. Indicator
     *  An indicator that the referenced document is a copy (true) or the original (false).
     *  0..1
     *  Document Reference
     *  Copy
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $copyIndicator
     */
    private $copyIndicator = null;

    /**
     * BBIE
     *  Document Reference. UUID. Identifier
     *  A universally unique identifier for this document reference.
     *  0..1
     *  Document Reference
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\UUID $uUID
     */
    private $uUID = null;

    /**
     * BBIE
     *  Document Reference. Issue Date. Date
     *  The date, assigned by the sender of the referenced document, on which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $issueDate
     */
    private $issueDate = null;

    /**
     * BBIE
     *  Document Reference. Issue Time. Time
     *  The time, assigned by the sender of the referenced document, at which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $issueTime
     */
    private $issueTime = null;

    /**
     * BBIE
     *  Document Reference. Document Type Code. Code
     *  The type of document being referenced, expressed as a code.
     *  0..1
     *  Document Reference
     *  Document Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\DocumentTypeCode $documentTypeCode
     */
    private $documentTypeCode = null;

    /**
     * BBIE
     *  Document Reference. Document Type. Text
     *  The type of document being referenced, expressed as text.
     *  0..1
     *  Document Reference
     *  Document Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\DocumentType $documentType
     */
    private $documentType = null;

    /**
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\XPath[] $xPath
     */
    private $xPath = [
        
    ];

    /**
     * BBIE
     *  Document Reference. Language. Identifier
     *  An identifier for the language used in the referenced document.
     *  0..1
     *  Document Reference
     *  Language
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\LanguageID $languageID
     */
    private $languageID = null;

    /**
     * BBIE
     *  Document Reference. Locale Code. Code
     *  A code signifying the locale in which the language in the referenced document is used.
     *  0..1
     *  Document Reference
     *  Locale Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\LocaleCode $localeCode
     */
    private $localeCode = null;

    /**
     * BBIE
     *  Document Reference. Version. Identifier
     *  An identifier for the current version of the referenced document.
     *  0..1
     *  Document Reference
     *  Version
     *  Identifier
     *  Identifier. Type
     *  1.1
     *
     * @var \Ubl21\CommonBasicComponents\VersionID $versionID
     */
    private $versionID = null;

    /**
     * BBIE
     *  Document Reference. Document Status Code. Code
     *  A code signifying the status of the reference document with respect to its original state.
     *  0..1
     *  Document Reference
     *  Document Status Code
     *  Code
     *  Document Status
     *  Document Status_ Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\DocumentStatusCode $documentStatusCode
     */
    private $documentStatusCode = null;

    /**
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @var \Ubl21\CommonBasicComponents\DocumentDescription[] $documentDescription
     */
    private $documentDescription = [
        
    ];

    /**
     * ASBIE
     *  Document Reference. Attachment
     *  The referenced document as an attachment to the document from which it is referenced.
     *  0..1
     *  Document Reference
     *  Attachment
     *  Attachment
     *  Attachment
     *
     * @var \Ubl21\CommonAggregateComponents\Attachment $attachment
     */
    private $attachment = null;

    /**
     * ASBIE
     *  Document Reference. Validity_ Period. Period
     *  The period for which this document reference is valid.
     *  0..1
     *  Document Reference
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\ValidityPeriod $validityPeriod
     */
    private $validityPeriod = null;

    /**
     * ASBIE
     *  Document Reference. Issuer_ Party. Party
     *  The party who issued the referenced document.
     *  0..1
     *  Document Reference
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
     *  Document Reference. Result Of Verification
     *  The result of an attempt to verify a signature associated with the referenced document.
     *  0..1
     *  Document Reference
     *  Result Of Verification
     *  Result Of Verification
     *  Result Of Verification
     *
     * @var \Ubl21\CommonAggregateComponents\ResultOfVerification $resultOfVerification
     */
    private $resultOfVerification = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Document Reference. Identifier
     *  An identifier for the referenced document.
     *  1
     *  Document Reference
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  PO-001 3333-44-123
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
     *  Document Reference. Identifier
     *  An identifier for the referenced document.
     *  1
     *  Document Reference
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  PO-001 3333-44-123
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
     * Gets as copyIndicator
     *
     * BBIE
     *  Document Reference. Copy_ Indicator. Indicator
     *  An indicator that the referenced document is a copy (true) or the original (false).
     *  0..1
     *  Document Reference
     *  Copy
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getCopyIndicator()
    {
        return $this->copyIndicator;
    }

    /**
     * Sets a new copyIndicator
     *
     * BBIE
     *  Document Reference. Copy_ Indicator. Indicator
     *  An indicator that the referenced document is a copy (true) or the original (false).
     *  0..1
     *  Document Reference
     *  Copy
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $copyIndicator
     * @return self
     */
    public function setCopyIndicator($copyIndicator)
    {
        $this->copyIndicator = $copyIndicator;
        return $this;
    }

    /**
     * Gets as uUID
     *
     * BBIE
     *  Document Reference. UUID. Identifier
     *  A universally unique identifier for this document reference.
     *  0..1
     *  Document Reference
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\UUID
     */
    public function getUUID()
    {
        return $this->uUID;
    }

    /**
     * Sets a new uUID
     *
     * BBIE
     *  Document Reference. UUID. Identifier
     *  A universally unique identifier for this document reference.
     *  0..1
     *  Document Reference
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\UUID $uUID
     * @return self
     */
    public function setUUID(?\Ubl21\CommonBasicComponents\UUID $uUID = null)
    {
        $this->uUID = $uUID;
        return $this;
    }

    /**
     * Gets as issueDate
     *
     * BBIE
     *  Document Reference. Issue Date. Date
     *  The date, assigned by the sender of the referenced document, on which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * Sets a new issueDate
     *
     * BBIE
     *  Document Reference. Issue Date. Date
     *  The date, assigned by the sender of the referenced document, on which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTime $issueDate = null)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Gets as issueTime
     *
     * BBIE
     *  Document Reference. Issue Time. Time
     *  The time, assigned by the sender of the referenced document, at which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getIssueTime()
    {
        return $this->issueTime;
    }

    /**
     * Sets a new issueTime
     *
     * BBIE
     *  Document Reference. Issue Time. Time
     *  The time, assigned by the sender of the referenced document, at which the document was issued.
     *  0..1
     *  Document Reference
     *  Issue Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $issueTime
     * @return self
     */
    public function setIssueTime(?\DateTime $issueTime = null)
    {
        $this->issueTime = $issueTime;
        return $this;
    }

    /**
     * Gets as documentTypeCode
     *
     * BBIE
     *  Document Reference. Document Type Code. Code
     *  The type of document being referenced, expressed as a code.
     *  0..1
     *  Document Reference
     *  Document Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\DocumentTypeCode
     */
    public function getDocumentTypeCode()
    {
        return $this->documentTypeCode;
    }

    /**
     * Sets a new documentTypeCode
     *
     * BBIE
     *  Document Reference. Document Type Code. Code
     *  The type of document being referenced, expressed as a code.
     *  0..1
     *  Document Reference
     *  Document Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\DocumentTypeCode $documentTypeCode
     * @return self
     */
    public function setDocumentTypeCode(?\Ubl21\CommonBasicComponents\DocumentTypeCode $documentTypeCode = null)
    {
        $this->documentTypeCode = $documentTypeCode;
        return $this;
    }

    /**
     * Gets as documentType
     *
     * BBIE
     *  Document Reference. Document Type. Text
     *  The type of document being referenced, expressed as text.
     *  0..1
     *  Document Reference
     *  Document Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\DocumentType
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Sets a new documentType
     *
     * BBIE
     *  Document Reference. Document Type. Text
     *  The type of document being referenced, expressed as text.
     *  0..1
     *  Document Reference
     *  Document Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\DocumentType $documentType
     * @return self
     */
    public function setDocumentType(?\Ubl21\CommonBasicComponents\DocumentType $documentType = null)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * Adds as xPath
     *
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\XPath $xPath
     */
    public function addToXPath(\Ubl21\CommonBasicComponents\XPath $xPath)
    {
        $this->xPath[] = $xPath;
        return $this;
    }

    /**
     * isset xPath
     *
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetXPath($index)
    {
        return isset($this->xPath[$index]);
    }

    /**
     * unset xPath
     *
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetXPath($index)
    {
        unset($this->xPath[$index]);
    }

    /**
     * Gets as xPath
     *
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\XPath[]
     */
    public function getXPath()
    {
        return $this->xPath;
    }

    /**
     * Sets a new xPath
     *
     * BBIE
     *  Document Reference. XPath. Text
     *  A reference to another place in the same XML document instance in which DocumentReference appears.
     *  0..n
     *  Document Reference
     *  XPath
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\XPath[] $xPath
     * @return self
     */
    public function setXPath(?array $xPath = null)
    {
        $this->xPath = $xPath;
        return $this;
    }

    /**
     * Gets as languageID
     *
     * BBIE
     *  Document Reference. Language. Identifier
     *  An identifier for the language used in the referenced document.
     *  0..1
     *  Document Reference
     *  Language
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\LanguageID
     */
    public function getLanguageID()
    {
        return $this->languageID;
    }

    /**
     * Sets a new languageID
     *
     * BBIE
     *  Document Reference. Language. Identifier
     *  An identifier for the language used in the referenced document.
     *  0..1
     *  Document Reference
     *  Language
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\LanguageID $languageID
     * @return self
     */
    public function setLanguageID(?\Ubl21\CommonBasicComponents\LanguageID $languageID = null)
    {
        $this->languageID = $languageID;
        return $this;
    }

    /**
     * Gets as localeCode
     *
     * BBIE
     *  Document Reference. Locale Code. Code
     *  A code signifying the locale in which the language in the referenced document is used.
     *  0..1
     *  Document Reference
     *  Locale Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\LocaleCode
     */
    public function getLocaleCode()
    {
        return $this->localeCode;
    }

    /**
     * Sets a new localeCode
     *
     * BBIE
     *  Document Reference. Locale Code. Code
     *  A code signifying the locale in which the language in the referenced document is used.
     *  0..1
     *  Document Reference
     *  Locale Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\LocaleCode $localeCode
     * @return self
     */
    public function setLocaleCode(?\Ubl21\CommonBasicComponents\LocaleCode $localeCode = null)
    {
        $this->localeCode = $localeCode;
        return $this;
    }

    /**
     * Gets as versionID
     *
     * BBIE
     *  Document Reference. Version. Identifier
     *  An identifier for the current version of the referenced document.
     *  0..1
     *  Document Reference
     *  Version
     *  Identifier
     *  Identifier. Type
     *  1.1
     *
     * @return \Ubl21\CommonBasicComponents\VersionID
     */
    public function getVersionID()
    {
        return $this->versionID;
    }

    /**
     * Sets a new versionID
     *
     * BBIE
     *  Document Reference. Version. Identifier
     *  An identifier for the current version of the referenced document.
     *  0..1
     *  Document Reference
     *  Version
     *  Identifier
     *  Identifier. Type
     *  1.1
     *
     * @param \Ubl21\CommonBasicComponents\VersionID $versionID
     * @return self
     */
    public function setVersionID(?\Ubl21\CommonBasicComponents\VersionID $versionID = null)
    {
        $this->versionID = $versionID;
        return $this;
    }

    /**
     * Gets as documentStatusCode
     *
     * BBIE
     *  Document Reference. Document Status Code. Code
     *  A code signifying the status of the reference document with respect to its original state.
     *  0..1
     *  Document Reference
     *  Document Status Code
     *  Code
     *  Document Status
     *  Document Status_ Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\DocumentStatusCode
     */
    public function getDocumentStatusCode()
    {
        return $this->documentStatusCode;
    }

    /**
     * Sets a new documentStatusCode
     *
     * BBIE
     *  Document Reference. Document Status Code. Code
     *  A code signifying the status of the reference document with respect to its original state.
     *  0..1
     *  Document Reference
     *  Document Status Code
     *  Code
     *  Document Status
     *  Document Status_ Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\DocumentStatusCode $documentStatusCode
     * @return self
     */
    public function setDocumentStatusCode(?\Ubl21\CommonBasicComponents\DocumentStatusCode $documentStatusCode = null)
    {
        $this->documentStatusCode = $documentStatusCode;
        return $this;
    }

    /**
     * Adds as documentDescription
     *
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\DocumentDescription $documentDescription
     */
    public function addToDocumentDescription(\Ubl21\CommonBasicComponents\DocumentDescription $documentDescription)
    {
        $this->documentDescription[] = $documentDescription;
        return $this;
    }

    /**
     * isset documentDescription
     *
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocumentDescription($index)
    {
        return isset($this->documentDescription[$index]);
    }

    /**
     * unset documentDescription
     *
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocumentDescription($index)
    {
        unset($this->documentDescription[$index]);
    }

    /**
     * Gets as documentDescription
     *
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @return \Ubl21\CommonBasicComponents\DocumentDescription[]
     */
    public function getDocumentDescription()
    {
        return $this->documentDescription;
    }

    /**
     * Sets a new documentDescription
     *
     * BBIE
     *  Document Reference. Document_ Description. Text
     *  Text describing the referenced document.
     *  0..n
     *  Document Reference
     *  Document
     *  Description
     *  Text
     *  Text. Type
     *  stock no longer provided
     *
     * @param \Ubl21\CommonBasicComponents\DocumentDescription[] $documentDescription
     * @return self
     */
    public function setDocumentDescription(?array $documentDescription = null)
    {
        $this->documentDescription = $documentDescription;
        return $this;
    }

    /**
     * Gets as attachment
     *
     * ASBIE
     *  Document Reference. Attachment
     *  The referenced document as an attachment to the document from which it is referenced.
     *  0..1
     *  Document Reference
     *  Attachment
     *  Attachment
     *  Attachment
     *
     * @return \Ubl21\CommonAggregateComponents\Attachment
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Sets a new attachment
     *
     * ASBIE
     *  Document Reference. Attachment
     *  The referenced document as an attachment to the document from which it is referenced.
     *  0..1
     *  Document Reference
     *  Attachment
     *  Attachment
     *  Attachment
     *
     * @param \Ubl21\CommonAggregateComponents\Attachment $attachment
     * @return self
     */
    public function setAttachment(?\Ubl21\CommonAggregateComponents\Attachment $attachment = null)
    {
        $this->attachment = $attachment;
        return $this;
    }

    /**
     * Gets as validityPeriod
     *
     * ASBIE
     *  Document Reference. Validity_ Period. Period
     *  The period for which this document reference is valid.
     *  0..1
     *  Document Reference
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\ValidityPeriod
     */
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    /**
     * Sets a new validityPeriod
     *
     * ASBIE
     *  Document Reference. Validity_ Period. Period
     *  The period for which this document reference is valid.
     *  0..1
     *  Document Reference
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\ValidityPeriod $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?\Ubl21\CommonAggregateComponents\ValidityPeriod $validityPeriod = null)
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    /**
     * Gets as issuerParty
     *
     * ASBIE
     *  Document Reference. Issuer_ Party. Party
     *  The party who issued the referenced document.
     *  0..1
     *  Document Reference
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
     *  Document Reference. Issuer_ Party. Party
     *  The party who issued the referenced document.
     *  0..1
     *  Document Reference
     *  Issuer
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\IssuerParty $issuerParty
     * @return self
     */
    public function setIssuerParty(?\Ubl21\CommonAggregateComponents\IssuerParty $issuerParty = null)
    {
        $this->issuerParty = $issuerParty;
        return $this;
    }

    /**
     * Gets as resultOfVerification
     *
     * ASBIE
     *  Document Reference. Result Of Verification
     *  The result of an attempt to verify a signature associated with the referenced document.
     *  0..1
     *  Document Reference
     *  Result Of Verification
     *  Result Of Verification
     *  Result Of Verification
     *
     * @return \Ubl21\CommonAggregateComponents\ResultOfVerification
     */
    public function getResultOfVerification()
    {
        return $this->resultOfVerification;
    }

    /**
     * Sets a new resultOfVerification
     *
     * ASBIE
     *  Document Reference. Result Of Verification
     *  The result of an attempt to verify a signature associated with the referenced document.
     *  0..1
     *  Document Reference
     *  Result Of Verification
     *  Result Of Verification
     *  Result Of Verification
     *
     * @param \Ubl21\CommonAggregateComponents\ResultOfVerification $resultOfVerification
     * @return self
     */
    public function setResultOfVerification(?\Ubl21\CommonAggregateComponents\ResultOfVerification $resultOfVerification = null)
    {
        $this->resultOfVerification = $resultOfVerification;
        return $this;
    }
}

