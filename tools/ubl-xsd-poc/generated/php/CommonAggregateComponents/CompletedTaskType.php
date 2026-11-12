<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing CompletedTaskType
 *
 * ABIE
 *  Completed Task. Details
 *  A class to describe the completion of a specific task in the tendering process.
 *  Completed Task
 * XSD Type: CompletedTaskType
 */
class CompletedTaskType
{
    /**
     * BBIE
     *  Completed Task. Annual_ Average. Amount
     *  The average monetary amount of a task such as this completed task.
     *  0..1
     *  Completed Task
     *  Annual
     *  Average
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\AnnualAverageAmount $annualAverageAmount
     */
    private $annualAverageAmount = null;

    /**
     * BBIE
     *  Completed Task. Total Task. Amount
     *  The actual total monetary amount of this completed task.
     *  0..1
     *  Completed Task
     *  Total Task
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\TotalTaskAmount $totalTaskAmount
     */
    private $totalTaskAmount = null;

    /**
     * BBIE
     *  Completed Task. Party Capacity. Amount
     *  A monetary amount corresponding to the financial capacity of the party that carried out this completed task.
     *  0..1
     *  Completed Task
     *  Party Capacity
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\PartyCapacityAmount $partyCapacityAmount
     */
    private $partyCapacityAmount = null;

    /**
     * BBIE
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @var \Ubl21\CommonAggregateComponents\EvidenceSupplied[] $evidenceSupplied
     */
    private $evidenceSupplied = [
        
    ];

    /**
     * ASBIE
     *  Completed Task. Period
     *  The period in which this completed task was performed.
     *  0..1
     *  Completed Task
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\Period $period
     */
    private $period = null;

    /**
     * ASBIE
     *  Completed Task. Recipient_ Customer Party. Customer Party
     *  The original customer for this completed task.
     *  0..1
     *  Completed Task
     *  Recipient
     *  Customer Party
     *  Customer Party
     *  Customer Party
     *
     * @var \Ubl21\CommonAggregateComponents\RecipientCustomerParty $recipientCustomerParty
     */
    private $recipientCustomerParty = null;

    /**
     * Gets as annualAverageAmount
     *
     * BBIE
     *  Completed Task. Annual_ Average. Amount
     *  The average monetary amount of a task such as this completed task.
     *  0..1
     *  Completed Task
     *  Annual
     *  Average
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\AnnualAverageAmount
     */
    public function getAnnualAverageAmount()
    {
        return $this->annualAverageAmount;
    }

    /**
     * Sets a new annualAverageAmount
     *
     * BBIE
     *  Completed Task. Annual_ Average. Amount
     *  The average monetary amount of a task such as this completed task.
     *  0..1
     *  Completed Task
     *  Annual
     *  Average
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\AnnualAverageAmount $annualAverageAmount
     * @return self
     */
    public function setAnnualAverageAmount(?\Ubl21\CommonBasicComponents\AnnualAverageAmount $annualAverageAmount = null)
    {
        $this->annualAverageAmount = $annualAverageAmount;
        return $this;
    }

    /**
     * Gets as totalTaskAmount
     *
     * BBIE
     *  Completed Task. Total Task. Amount
     *  The actual total monetary amount of this completed task.
     *  0..1
     *  Completed Task
     *  Total Task
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\TotalTaskAmount
     */
    public function getTotalTaskAmount()
    {
        return $this->totalTaskAmount;
    }

    /**
     * Sets a new totalTaskAmount
     *
     * BBIE
     *  Completed Task. Total Task. Amount
     *  The actual total monetary amount of this completed task.
     *  0..1
     *  Completed Task
     *  Total Task
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\TotalTaskAmount $totalTaskAmount
     * @return self
     */
    public function setTotalTaskAmount(?\Ubl21\CommonBasicComponents\TotalTaskAmount $totalTaskAmount = null)
    {
        $this->totalTaskAmount = $totalTaskAmount;
        return $this;
    }

    /**
     * Gets as partyCapacityAmount
     *
     * BBIE
     *  Completed Task. Party Capacity. Amount
     *  A monetary amount corresponding to the financial capacity of the party that carried out this completed task.
     *  0..1
     *  Completed Task
     *  Party Capacity
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\PartyCapacityAmount
     */
    public function getPartyCapacityAmount()
    {
        return $this->partyCapacityAmount;
    }

    /**
     * Sets a new partyCapacityAmount
     *
     * BBIE
     *  Completed Task. Party Capacity. Amount
     *  A monetary amount corresponding to the financial capacity of the party that carried out this completed task.
     *  0..1
     *  Completed Task
     *  Party Capacity
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\PartyCapacityAmount $partyCapacityAmount
     * @return self
     */
    public function setPartyCapacityAmount(?\Ubl21\CommonBasicComponents\PartyCapacityAmount $partyCapacityAmount = null)
    {
        $this->partyCapacityAmount = $partyCapacityAmount;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
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
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
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
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
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
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
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
     *  Completed Task. Description. Text
     *  Text describing this completed task.
     *  0..n
     *  Completed Task
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

    /**
     * Adds as evidenceSupplied
     *
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\EvidenceSupplied $evidenceSupplied
     */
    public function addToEvidenceSupplied(\Ubl21\CommonAggregateComponents\EvidenceSupplied $evidenceSupplied)
    {
        $this->evidenceSupplied[] = $evidenceSupplied;
        return $this;
    }

    /**
     * isset evidenceSupplied
     *
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param int|string $index
     * @return bool
     */
    public function issetEvidenceSupplied($index)
    {
        return isset($this->evidenceSupplied[$index]);
    }

    /**
     * unset evidenceSupplied
     *
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param int|string $index
     * @return void
     */
    public function unsetEvidenceSupplied($index)
    {
        unset($this->evidenceSupplied[$index]);
    }

    /**
     * Gets as evidenceSupplied
     *
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @return \Ubl21\CommonAggregateComponents\EvidenceSupplied[]
     */
    public function getEvidenceSupplied()
    {
        return $this->evidenceSupplied;
    }

    /**
     * Sets a new evidenceSupplied
     *
     * ASBIE
     *  Completed Task. Evidence Supplied
     *  The evidence justifying a designation of "complete" for this task.
     *  0..n
     *  Completed Task
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param \Ubl21\CommonAggregateComponents\EvidenceSupplied[] $evidenceSupplied
     * @return self
     */
    public function setEvidenceSupplied(?array $evidenceSupplied = null)
    {
        $this->evidenceSupplied = $evidenceSupplied;
        return $this;
    }

    /**
     * Gets as period
     *
     * ASBIE
     *  Completed Task. Period
     *  The period in which this completed task was performed.
     *  0..1
     *  Completed Task
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\Period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Sets a new period
     *
     * ASBIE
     *  Completed Task. Period
     *  The period in which this completed task was performed.
     *  0..1
     *  Completed Task
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\Period $period
     * @return self
     */
    public function setPeriod(?\Ubl21\CommonAggregateComponents\Period $period = null)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Gets as recipientCustomerParty
     *
     * ASBIE
     *  Completed Task. Recipient_ Customer Party. Customer Party
     *  The original customer for this completed task.
     *  0..1
     *  Completed Task
     *  Recipient
     *  Customer Party
     *  Customer Party
     *  Customer Party
     *
     * @return \Ubl21\CommonAggregateComponents\RecipientCustomerParty
     */
    public function getRecipientCustomerParty()
    {
        return $this->recipientCustomerParty;
    }

    /**
     * Sets a new recipientCustomerParty
     *
     * ASBIE
     *  Completed Task. Recipient_ Customer Party. Customer Party
     *  The original customer for this completed task.
     *  0..1
     *  Completed Task
     *  Recipient
     *  Customer Party
     *  Customer Party
     *  Customer Party
     *
     * @param \Ubl21\CommonAggregateComponents\RecipientCustomerParty $recipientCustomerParty
     * @return self
     */
    public function setRecipientCustomerParty(?\Ubl21\CommonAggregateComponents\RecipientCustomerParty $recipientCustomerParty = null)
    {
        $this->recipientCustomerParty = $recipientCustomerParty;
        return $this;
    }
}

