<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing WorkPhaseReferenceType
 *
 * ABIE
 *  Work Phase Reference. Details
 *  A class that refers to a phase of work. Used for instance to specify what part of the contract the billing is referring to.
 *  Work Phase Reference
 * XSD Type: WorkPhaseReferenceType
 */
class WorkPhaseReferenceType
{
    /**
     * BBIE
     *  Work Phase Reference. Identifier
     *  An identifier for this phase of work.
     *  0..1
     *  Work Phase Reference
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Work Phase Reference. Work Phase Code. Code
     *  A code signifying this phase of work.
     *  0..1
     *  Work Phase Reference
     *  Work Phase Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\WorkPhaseCode $workPhaseCode
     */
    private $workPhaseCode = null;

    /**
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\WorkPhase[] $workPhase
     */
    private $workPhase = [
        
    ];

    /**
     * BBIE
     *  Work Phase Reference. Progress Percent. Percent
     *  The progress percentage of the work phase.
     *  0..1
     *  Work Phase Reference
     *  Progress Percent
     *  Percent
     *  Percent. Type
     *
     * @var \Ubl21\CommonBasicComponents\ProgressPercent $progressPercent
     */
    private $progressPercent = null;

    /**
     * BBIE
     *  Work Phase Reference. Start Date. Date
     *  The date on which this phase of work begins.
     *  0..1
     *  Work Phase Reference
     *  Start Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $startDate
     */
    private $startDate = null;

    /**
     * BBIE
     *  Work Phase Reference. End Date. Date
     *  The date on which this phase of work ends.
     *  0..1
     *  Work Phase Reference
     *  End Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $endDate
     */
    private $endDate = null;

    /**
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @var \Ubl21\CommonAggregateComponents\WorkOrderDocumentReference[] $workOrderDocumentReference
     */
    private $workOrderDocumentReference = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Work Phase Reference. Identifier
     *  An identifier for this phase of work.
     *  0..1
     *  Work Phase Reference
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
     *  Work Phase Reference. Identifier
     *  An identifier for this phase of work.
     *  0..1
     *  Work Phase Reference
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
     * Gets as workPhaseCode
     *
     * BBIE
     *  Work Phase Reference. Work Phase Code. Code
     *  A code signifying this phase of work.
     *  0..1
     *  Work Phase Reference
     *  Work Phase Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\WorkPhaseCode
     */
    public function getWorkPhaseCode()
    {
        return $this->workPhaseCode;
    }

    /**
     * Sets a new workPhaseCode
     *
     * BBIE
     *  Work Phase Reference. Work Phase Code. Code
     *  A code signifying this phase of work.
     *  0..1
     *  Work Phase Reference
     *  Work Phase Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\WorkPhaseCode $workPhaseCode
     * @return self
     */
    public function setWorkPhaseCode(?\Ubl21\CommonBasicComponents\WorkPhaseCode $workPhaseCode = null)
    {
        $this->workPhaseCode = $workPhaseCode;
        return $this;
    }

    /**
     * Adds as workPhase
     *
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\WorkPhase $workPhase
     */
    public function addToWorkPhase(\Ubl21\CommonBasicComponents\WorkPhase $workPhase)
    {
        $this->workPhase[] = $workPhase;
        return $this;
    }

    /**
     * isset workPhase
     *
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetWorkPhase($index)
    {
        return isset($this->workPhase[$index]);
    }

    /**
     * unset workPhase
     *
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetWorkPhase($index)
    {
        unset($this->workPhase[$index]);
    }

    /**
     * Gets as workPhase
     *
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\WorkPhase[]
     */
    public function getWorkPhase()
    {
        return $this->workPhase;
    }

    /**
     * Sets a new workPhase
     *
     * BBIE
     *  Work Phase Reference. Work Phase. Text
     *  Text describing this phase of work.
     *  0..n
     *  Work Phase Reference
     *  Work Phase
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\WorkPhase[] $workPhase
     * @return self
     */
    public function setWorkPhase(?array $workPhase = null)
    {
        $this->workPhase = $workPhase;
        return $this;
    }

    /**
     * Gets as progressPercent
     *
     * BBIE
     *  Work Phase Reference. Progress Percent. Percent
     *  The progress percentage of the work phase.
     *  0..1
     *  Work Phase Reference
     *  Progress Percent
     *  Percent
     *  Percent. Type
     *
     * @return \Ubl21\CommonBasicComponents\ProgressPercent
     */
    public function getProgressPercent()
    {
        return $this->progressPercent;
    }

    /**
     * Sets a new progressPercent
     *
     * BBIE
     *  Work Phase Reference. Progress Percent. Percent
     *  The progress percentage of the work phase.
     *  0..1
     *  Work Phase Reference
     *  Progress Percent
     *  Percent
     *  Percent. Type
     *
     * @param \Ubl21\CommonBasicComponents\ProgressPercent $progressPercent
     * @return self
     */
    public function setProgressPercent(?\Ubl21\CommonBasicComponents\ProgressPercent $progressPercent = null)
    {
        $this->progressPercent = $progressPercent;
        return $this;
    }

    /**
     * Gets as startDate
     *
     * BBIE
     *  Work Phase Reference. Start Date. Date
     *  The date on which this phase of work begins.
     *  0..1
     *  Work Phase Reference
     *  Start Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets a new startDate
     *
     * BBIE
     *  Work Phase Reference. Start Date. Date
     *  The date on which this phase of work begins.
     *  0..1
     *  Work Phase Reference
     *  Start Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $startDate
     * @return self
     */
    public function setStartDate(?\DateTime $startDate = null)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * Gets as endDate
     *
     * BBIE
     *  Work Phase Reference. End Date. Date
     *  The date on which this phase of work ends.
     *  0..1
     *  Work Phase Reference
     *  End Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets a new endDate
     *
     * BBIE
     *  Work Phase Reference. End Date. Date
     *  The date on which this phase of work ends.
     *  0..1
     *  Work Phase Reference
     *  End Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $endDate
     * @return self
     */
    public function setEndDate(?\DateTime $endDate = null)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Adds as workOrderDocumentReference
     *
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\WorkOrderDocumentReference $workOrderDocumentReference
     */
    public function addToWorkOrderDocumentReference(\Ubl21\CommonAggregateComponents\WorkOrderDocumentReference $workOrderDocumentReference)
    {
        $this->workOrderDocumentReference[] = $workOrderDocumentReference;
        return $this;
    }

    /**
     * isset workOrderDocumentReference
     *
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetWorkOrderDocumentReference($index)
    {
        return isset($this->workOrderDocumentReference[$index]);
    }

    /**
     * unset workOrderDocumentReference
     *
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetWorkOrderDocumentReference($index)
    {
        unset($this->workOrderDocumentReference[$index]);
    }

    /**
     * Gets as workOrderDocumentReference
     *
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return \Ubl21\CommonAggregateComponents\WorkOrderDocumentReference[]
     */
    public function getWorkOrderDocumentReference()
    {
        return $this->workOrderDocumentReference;
    }

    /**
     * Sets a new workOrderDocumentReference
     *
     * ASBIE
     *  Work Phase Reference. Work Order_ Document Reference. Document Reference
     *  A reference to a document regarding the work order for the project in which this phase of work takes place.
     *  0..n
     *  Work Phase Reference
     *  Work Order
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param \Ubl21\CommonAggregateComponents\WorkOrderDocumentReference[] $workOrderDocumentReference
     * @return self
     */
    public function setWorkOrderDocumentReference(?array $workOrderDocumentReference = null)
    {
        $this->workOrderDocumentReference = $workOrderDocumentReference;
        return $this;
    }
}

