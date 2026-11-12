<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing EndorsementType
 *
 * ABIE
 *  Endorsement. Details
 *  A class to describe an endorsement of a document.
 *  Endorsement
 * XSD Type: EndorsementType
 */
class EndorsementType
{
    /**
     * BBIE
     *  Endorsement. Document. Identifier
     *  An identifier for this endorsement.
     *  1
     *  Endorsement
     *  Document
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\DocumentID $documentID
     */
    private $documentID = null;

    /**
     * BBIE
     *  Endorsement. Approval Status. Text
     *  The status of this endorsement.
     *  1
     *  Endorsement
     *  Approval Status
     *  Text
     *  Text. Type
     *  Authentication Code
     *
     * @var \Ubl21\CommonBasicComponents\ApprovalStatus $approvalStatus
     */
    private $approvalStatus = null;

    /**
     * BBIE
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Endorser Party
     *  The type of party providing this endorsement.
     *  1
     *  Endorsement
     *  Endorser Party
     *  Endorser Party
     *  Endorser Party
     *
     * @var \Ubl21\CommonAggregateComponents\EndorserParty $endorserParty
     */
    private $endorserParty = null;

    /**
     * ASBIE
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
     *  Signature
     *  Signature
     *  Signature
     *
     * @var \Ubl21\CommonAggregateComponents\Signature[] $signature
     */
    private $signature = [
        
    ];

    /**
     * Gets as documentID
     *
     * BBIE
     *  Endorsement. Document. Identifier
     *  An identifier for this endorsement.
     *  1
     *  Endorsement
     *  Document
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\DocumentID
     */
    public function getDocumentID()
    {
        return $this->documentID;
    }

    /**
     * Sets a new documentID
     *
     * BBIE
     *  Endorsement. Document. Identifier
     *  An identifier for this endorsement.
     *  1
     *  Endorsement
     *  Document
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\DocumentID $documentID
     * @return self
     */
    public function setDocumentID(\Ubl21\CommonBasicComponents\DocumentID $documentID)
    {
        $this->documentID = $documentID;
        return $this;
    }

    /**
     * Gets as approvalStatus
     *
     * BBIE
     *  Endorsement. Approval Status. Text
     *  The status of this endorsement.
     *  1
     *  Endorsement
     *  Approval Status
     *  Text
     *  Text. Type
     *  Authentication Code
     *
     * @return \Ubl21\CommonBasicComponents\ApprovalStatus
     */
    public function getApprovalStatus()
    {
        return $this->approvalStatus;
    }

    /**
     * Sets a new approvalStatus
     *
     * BBIE
     *  Endorsement. Approval Status. Text
     *  The status of this endorsement.
     *  1
     *  Endorsement
     *  Approval Status
     *  Text
     *  Text. Type
     *  Authentication Code
     *
     * @param \Ubl21\CommonBasicComponents\ApprovalStatus $approvalStatus
     * @return self
     */
    public function setApprovalStatus(\Ubl21\CommonBasicComponents\ApprovalStatus $approvalStatus)
    {
        $this->approvalStatus = $approvalStatus;
        return $this;
    }

    /**
     * Adds as remarks
     *
     * BBIE
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Remarks. Text
     *  Remarks provided by the endorsing party.
     *  0..n
     *  Endorsement
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
     * Gets as endorserParty
     *
     * ASBIE
     *  Endorsement. Endorser Party
     *  The type of party providing this endorsement.
     *  1
     *  Endorsement
     *  Endorser Party
     *  Endorser Party
     *  Endorser Party
     *
     * @return \Ubl21\CommonAggregateComponents\EndorserParty
     */
    public function getEndorserParty()
    {
        return $this->endorserParty;
    }

    /**
     * Sets a new endorserParty
     *
     * ASBIE
     *  Endorsement. Endorser Party
     *  The type of party providing this endorsement.
     *  1
     *  Endorsement
     *  Endorser Party
     *  Endorser Party
     *  Endorser Party
     *
     * @param \Ubl21\CommonAggregateComponents\EndorserParty $endorserParty
     * @return self
     */
    public function setEndorserParty(\Ubl21\CommonAggregateComponents\EndorserParty $endorserParty)
    {
        $this->endorserParty = $endorserParty;
        return $this;
    }

    /**
     * Adds as signature
     *
     * ASBIE
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
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
     *  Endorsement. Signature
     *  A signature applied to this endorsement.
     *  0..n
     *  Endorsement
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

