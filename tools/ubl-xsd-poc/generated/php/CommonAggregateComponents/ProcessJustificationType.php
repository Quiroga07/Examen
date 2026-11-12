<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ProcessJustificationType
 *
 * ABIE
 *  Process Justification. Details
 *  A class to describe a justification for the choice of tendering process.
 *  Process Justification
 * XSD Type: ProcessJustificationType
 */
class ProcessJustificationType
{
    /**
     * BBIE
     *  Process Justification. Previous_ Cancellation Reason Code. Code
     *  A code signifying the type of the previous tendering process (which is now being cancelled).
     *  0..1
     *  Process Justification
     *  Previous
     *  Cancellation Reason Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\PreviousCancellationReasonCode $previousCancellationReasonCode
     */
    private $previousCancellationReasonCode = null;

    /**
     * BBIE
     *  Process Justification. Process_ Reason Code. Code
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as a code.
     *  0..1
     *  Process Justification
     *  Process
     *  Reason Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ProcessReasonCode $processReasonCode
     */
    private $processReasonCode = null;

    /**
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ProcessReason[] $processReason
     */
    private $processReason = [
        
    ];

    /**
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * Gets as previousCancellationReasonCode
     *
     * BBIE
     *  Process Justification. Previous_ Cancellation Reason Code. Code
     *  A code signifying the type of the previous tendering process (which is now being cancelled).
     *  0..1
     *  Process Justification
     *  Previous
     *  Cancellation Reason Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\PreviousCancellationReasonCode
     */
    public function getPreviousCancellationReasonCode()
    {
        return $this->previousCancellationReasonCode;
    }

    /**
     * Sets a new previousCancellationReasonCode
     *
     * BBIE
     *  Process Justification. Previous_ Cancellation Reason Code. Code
     *  A code signifying the type of the previous tendering process (which is now being cancelled).
     *  0..1
     *  Process Justification
     *  Previous
     *  Cancellation Reason Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\PreviousCancellationReasonCode $previousCancellationReasonCode
     * @return self
     */
    public function setPreviousCancellationReasonCode(?\Ubl21\CommonBasicComponents\PreviousCancellationReasonCode $previousCancellationReasonCode = null)
    {
        $this->previousCancellationReasonCode = $previousCancellationReasonCode;
        return $this;
    }

    /**
     * Gets as processReasonCode
     *
     * BBIE
     *  Process Justification. Process_ Reason Code. Code
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as a code.
     *  0..1
     *  Process Justification
     *  Process
     *  Reason Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ProcessReasonCode
     */
    public function getProcessReasonCode()
    {
        return $this->processReasonCode;
    }

    /**
     * Sets a new processReasonCode
     *
     * BBIE
     *  Process Justification. Process_ Reason Code. Code
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as a code.
     *  0..1
     *  Process Justification
     *  Process
     *  Reason Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ProcessReasonCode $processReasonCode
     * @return self
     */
    public function setProcessReasonCode(?\Ubl21\CommonBasicComponents\ProcessReasonCode $processReasonCode = null)
    {
        $this->processReasonCode = $processReasonCode;
        return $this;
    }

    /**
     * Adds as processReason
     *
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\ProcessReason $processReason
     */
    public function addToProcessReason(\Ubl21\CommonBasicComponents\ProcessReason $processReason)
    {
        $this->processReason[] = $processReason;
        return $this;
    }

    /**
     * isset processReason
     *
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetProcessReason($index)
    {
        return isset($this->processReason[$index]);
    }

    /**
     * unset processReason
     *
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetProcessReason($index)
    {
        unset($this->processReason[$index]);
    }

    /**
     * Gets as processReason
     *
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ProcessReason[]
     */
    public function getProcessReason()
    {
        return $this->processReason;
    }

    /**
     * Sets a new processReason
     *
     * BBIE
     *  Process Justification. Process_ Reason. Text
     *  The reason why the contracting authority has followed a particular tendering procedure for the awarding of a contract, expressed as text.
     *  0..n
     *  Process Justification
     *  Process
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ProcessReason[] $processReason
     * @return self
     */
    public function setProcessReason(?array $processReason = null)
    {
        $this->processReason = $processReason;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Description $description
     */
    public function addToDescription(\Ubl21\CommonBasicComponents\Description $description)
    {
        $this->description[] = $description;
        return $this;
    }

    /**
     * isset description
     *
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDescription($index)
    {
        return isset($this->description[$index]);
    }

    /**
     * unset description
     *
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDescription($index)
    {
        unset($this->description[$index]);
    }

    /**
     * Gets as description
     *
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Description[]
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * BBIE
     *  Process Justification. Description. Text
     *  Text providing justification for the selection of this process.
     *  0..n
     *  Process Justification
     *  Description
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Description[] $description
     * @return self
     */
    public function setDescription(?array $description = null)
    {
        $this->description = $description;
        return $this;
    }
}

