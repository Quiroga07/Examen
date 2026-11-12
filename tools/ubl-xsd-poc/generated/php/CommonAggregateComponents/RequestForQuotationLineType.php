<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing RequestForQuotationLineType
 *
 * ABIE
 *  Request For Quotation Line. Details
 *  A class to define a line in a Request for Quotation.
 *  Request For Quotation Line
 * XSD Type: RequestForQuotationLineType
 */
class RequestForQuotationLineType
{
    /**
     * BBIE
     *  Request For Quotation Line. Identifier
     *  An identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Request For Quotation Line. UUID. Identifier
     *  A universally unique identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\UUID $uUID
     */
    private $uUID = null;

    /**
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Note[] $note
     */
    private $note = [
        
    ];

    /**
     * BBIE
     *  Request For Quotation Line. Optional_ Line Item Indicator. Indicator
     *  An indication whether this line is optional (true) or not (false) for purposes of this request for quotation.
     *  0..1
     *  Request For Quotation Line
     *  Optional
     *  Line Item Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $optionalLineItemIndicator
     */
    private $optionalLineItemIndicator = null;

    /**
     * BBIE
     *  Request For Quotation Line. Privacy Code. Code
     *  A code signifying the level of confidentiality of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Privacy Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\PrivacyCode $privacyCode
     */
    private $privacyCode = null;

    /**
     * BBIE
     *  Request For Quotation Line. Security Classification Code. Code
     *  A code signifying the security classification of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Security Classification Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\SecurityClassificationCode $securityClassificationCode
     */
    private $securityClassificationCode = null;

    /**
     * ASBIE
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Line Item
     *  A description of the item for which a quotation is requested.
     *  1
     *  Request For Quotation Line
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @var \Ubl21\CommonAggregateComponents\LineItem $lineItem
     */
    private $lineItem = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Request For Quotation Line. Identifier
     *  An identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Identifier
     *  An identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
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
     * Gets as uUID
     *
     * BBIE
     *  Request For Quotation Line. UUID. Identifier
     *  A universally unique identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
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
     *  Request For Quotation Line. UUID. Identifier
     *  A universally unique identifier for this line in the request for quotation.
     *  0..1
     *  Request For Quotation Line
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
     * Adds as note
     *
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Note $note
     */
    public function addToNote(\Ubl21\CommonBasicComponents\Note $note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * isset note
     *
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNote($index)
    {
        return isset($this->note[$index]);
    }

    /**
     * unset note
     *
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNote($index)
    {
        unset($this->note[$index]);
    }

    /**
     * Gets as note
     *
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Note[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets a new note
     *
     * BBIE
     *  Request For Quotation Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Request For Quotation Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Note[] $note
     * @return self
     */
    public function setNote(?array $note = null)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Gets as optionalLineItemIndicator
     *
     * BBIE
     *  Request For Quotation Line. Optional_ Line Item Indicator. Indicator
     *  An indication whether this line is optional (true) or not (false) for purposes of this request for quotation.
     *  0..1
     *  Request For Quotation Line
     *  Optional
     *  Line Item Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getOptionalLineItemIndicator()
    {
        return $this->optionalLineItemIndicator;
    }

    /**
     * Sets a new optionalLineItemIndicator
     *
     * BBIE
     *  Request For Quotation Line. Optional_ Line Item Indicator. Indicator
     *  An indication whether this line is optional (true) or not (false) for purposes of this request for quotation.
     *  0..1
     *  Request For Quotation Line
     *  Optional
     *  Line Item Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $optionalLineItemIndicator
     * @return self
     */
    public function setOptionalLineItemIndicator($optionalLineItemIndicator)
    {
        $this->optionalLineItemIndicator = $optionalLineItemIndicator;
        return $this;
    }

    /**
     * Gets as privacyCode
     *
     * BBIE
     *  Request For Quotation Line. Privacy Code. Code
     *  A code signifying the level of confidentiality of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Privacy Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\PrivacyCode
     */
    public function getPrivacyCode()
    {
        return $this->privacyCode;
    }

    /**
     * Sets a new privacyCode
     *
     * BBIE
     *  Request For Quotation Line. Privacy Code. Code
     *  A code signifying the level of confidentiality of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Privacy Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\PrivacyCode $privacyCode
     * @return self
     */
    public function setPrivacyCode(?\Ubl21\CommonBasicComponents\PrivacyCode $privacyCode = null)
    {
        $this->privacyCode = $privacyCode;
        return $this;
    }

    /**
     * Gets as securityClassificationCode
     *
     * BBIE
     *  Request For Quotation Line. Security Classification Code. Code
     *  A code signifying the security classification of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Security Classification Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\SecurityClassificationCode
     */
    public function getSecurityClassificationCode()
    {
        return $this->securityClassificationCode;
    }

    /**
     * Sets a new securityClassificationCode
     *
     * BBIE
     *  Request For Quotation Line. Security Classification Code. Code
     *  A code signifying the security classification of this request for quotation line.
     *  0..1
     *  Request For Quotation Line
     *  Security Classification Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\SecurityClassificationCode $securityClassificationCode
     * @return self
     */
    public function setSecurityClassificationCode(?\Ubl21\CommonBasicComponents\SecurityClassificationCode $securityClassificationCode = null)
    {
        $this->securityClassificationCode = $securityClassificationCode;
        return $this;
    }

    /**
     * Adds as documentReference
     *
     * ASBIE
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     *  Request For Quotation Line. Document Reference
     *  A document associated with this request for quotation line.
     *  0..n
     *  Request For Quotation Line
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
     * Gets as lineItem
     *
     * ASBIE
     *  Request For Quotation Line. Line Item
     *  A description of the item for which a quotation is requested.
     *  1
     *  Request For Quotation Line
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @return \Ubl21\CommonAggregateComponents\LineItem
     */
    public function getLineItem()
    {
        return $this->lineItem;
    }

    /**
     * Sets a new lineItem
     *
     * ASBIE
     *  Request For Quotation Line. Line Item
     *  A description of the item for which a quotation is requested.
     *  1
     *  Request For Quotation Line
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @param \Ubl21\CommonAggregateComponents\LineItem $lineItem
     * @return self
     */
    public function setLineItem(\Ubl21\CommonAggregateComponents\LineItem $lineItem)
    {
        $this->lineItem = $lineItem;
        return $this;
    }
}

