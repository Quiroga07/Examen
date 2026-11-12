<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing DespatchType
 *
 * ABIE
 *  Despatch. Details
 *  A class to describe the despatching of goods (their pickup for delivery).
 *  Despatch
 * XSD Type: DespatchType
 */
class DespatchType
{
    /**
     * BBIE
     *  Despatch. Identifier
     *  An identifier for this despatch event.
     *  0..1
     *  Despatch
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Despatch. Requested_ Despatch Date. Date
     *  The despatch (pickup) date requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $requestedDespatchDate
     */
    private $requestedDespatchDate = null;

    /**
     * BBIE
     *  Despatch. Requested_ Despatch Time. Time
     *  The despatch (pickup) time requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $requestedDespatchTime
     */
    private $requestedDespatchTime = null;

    /**
     * BBIE
     *  Despatch. Estimated_ Despatch Date. Date
     *  The estimated despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $estimatedDespatchDate
     */
    private $estimatedDespatchDate = null;

    /**
     * BBIE
     *  Despatch. Estimated_ Despatch Time. Time
     *  The estimated despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $estimatedDespatchTime
     */
    private $estimatedDespatchTime = null;

    /**
     * BBIE
     *  Despatch. Actual_ Despatch Date. Date
     *  The actual despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $actualDespatchDate
     */
    private $actualDespatchDate = null;

    /**
     * BBIE
     *  Despatch. Actual_ Despatch Time. Time
     *  The actual despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $actualDespatchTime
     */
    private $actualDespatchTime = null;

    /**
     * BBIE
     *  Despatch. Guaranteed_ Despatch Date. Date
     *  The date guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $guaranteedDespatchDate
     */
    private $guaranteedDespatchDate = null;

    /**
     * BBIE
     *  Despatch. Guaranteed_ Despatch Time. Time
     *  The time guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $guaranteedDespatchTime
     */
    private $guaranteedDespatchTime = null;

    /**
     * BBIE
     *  Despatch. Release. Identifier
     *  An identifier for the release of the despatch used as security control or cargo control (pick-up).
     *  0..1
     *  Despatch
     *  Release
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ReleaseID $releaseID
     */
    private $releaseID = null;

    /**
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Instructions[] $instructions
     */
    private $instructions = [
        
    ];

    /**
     * ASBIE
     *  Despatch. Despatch_ Address. Address
     *  The address of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Address
     *  Address
     *  Address
     *
     * @var \Ubl21\CommonAggregateComponents\DespatchAddress $despatchAddress
     */
    private $despatchAddress = null;

    /**
     * ASBIE
     *  Despatch. Despatch_ Location. Location
     *  The location of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Location
     *  Location
     *  Location
     *
     * @var \Ubl21\CommonAggregateComponents\DespatchLocation $despatchLocation
     */
    private $despatchLocation = null;

    /**
     * ASBIE
     *  Despatch. Despatch_ Party. Party
     *  The party despatching the goods.
     *  0..1
     *  Despatch
     *  Despatch
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\DespatchParty $despatchParty
     */
    private $despatchParty = null;

    /**
     * ASBIE
     *  Despatch. Carrier_ Party. Party
     *  The party carrying the goods.
     *  0..1
     *  Despatch
     *  Carrier
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\CarrierParty $carrierParty
     */
    private $carrierParty = null;

    /**
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\NotifyParty[] $notifyParty
     */
    private $notifyParty = [
        
    ];

    /**
     * ASBIE
     *  Despatch. Contact
     *  The primary contact for this despatch (pickup).
     *  0..1
     *  Despatch
     *  Contact
     *  Contact
     *  Contact
     *
     * @var \Ubl21\CommonAggregateComponents\Contact $contact
     */
    private $contact = null;

    /**
     * ASBIE
     *  Despatch. Estimated Despatch_ Period. Period
     *  The period estimated for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Estimated Despatch
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\EstimatedDespatchPeriod $estimatedDespatchPeriod
     */
    private $estimatedDespatchPeriod = null;

    /**
     * ASBIE
     *  Despatch. Requested Despatch_ Period. Period
     *  The period requested for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Requested Despatch
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\RequestedDespatchPeriod $requestedDespatchPeriod
     */
    private $requestedDespatchPeriod = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Despatch. Identifier
     *  An identifier for this despatch event.
     *  0..1
     *  Despatch
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
     *  Despatch. Identifier
     *  An identifier for this despatch event.
     *  0..1
     *  Despatch
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
     * Gets as requestedDespatchDate
     *
     * BBIE
     *  Despatch. Requested_ Despatch Date. Date
     *  The despatch (pickup) date requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getRequestedDespatchDate()
    {
        return $this->requestedDespatchDate;
    }

    /**
     * Sets a new requestedDespatchDate
     *
     * BBIE
     *  Despatch. Requested_ Despatch Date. Date
     *  The despatch (pickup) date requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $requestedDespatchDate
     * @return self
     */
    public function setRequestedDespatchDate(?\DateTime $requestedDespatchDate = null)
    {
        $this->requestedDespatchDate = $requestedDespatchDate;
        return $this;
    }

    /**
     * Gets as requestedDespatchTime
     *
     * BBIE
     *  Despatch. Requested_ Despatch Time. Time
     *  The despatch (pickup) time requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getRequestedDespatchTime()
    {
        return $this->requestedDespatchTime;
    }

    /**
     * Sets a new requestedDespatchTime
     *
     * BBIE
     *  Despatch. Requested_ Despatch Time. Time
     *  The despatch (pickup) time requested, normally by the buyer.
     *  0..1
     *  Despatch
     *  Requested
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $requestedDespatchTime
     * @return self
     */
    public function setRequestedDespatchTime(?\DateTime $requestedDespatchTime = null)
    {
        $this->requestedDespatchTime = $requestedDespatchTime;
        return $this;
    }

    /**
     * Gets as estimatedDespatchDate
     *
     * BBIE
     *  Despatch. Estimated_ Despatch Date. Date
     *  The estimated despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getEstimatedDespatchDate()
    {
        return $this->estimatedDespatchDate;
    }

    /**
     * Sets a new estimatedDespatchDate
     *
     * BBIE
     *  Despatch. Estimated_ Despatch Date. Date
     *  The estimated despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $estimatedDespatchDate
     * @return self
     */
    public function setEstimatedDespatchDate(?\DateTime $estimatedDespatchDate = null)
    {
        $this->estimatedDespatchDate = $estimatedDespatchDate;
        return $this;
    }

    /**
     * Gets as estimatedDespatchTime
     *
     * BBIE
     *  Despatch. Estimated_ Despatch Time. Time
     *  The estimated despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getEstimatedDespatchTime()
    {
        return $this->estimatedDespatchTime;
    }

    /**
     * Sets a new estimatedDespatchTime
     *
     * BBIE
     *  Despatch. Estimated_ Despatch Time. Time
     *  The estimated despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Estimated
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $estimatedDespatchTime
     * @return self
     */
    public function setEstimatedDespatchTime(?\DateTime $estimatedDespatchTime = null)
    {
        $this->estimatedDespatchTime = $estimatedDespatchTime;
        return $this;
    }

    /**
     * Gets as actualDespatchDate
     *
     * BBIE
     *  Despatch. Actual_ Despatch Date. Date
     *  The actual despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getActualDespatchDate()
    {
        return $this->actualDespatchDate;
    }

    /**
     * Sets a new actualDespatchDate
     *
     * BBIE
     *  Despatch. Actual_ Despatch Date. Date
     *  The actual despatch (pickup) date.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $actualDespatchDate
     * @return self
     */
    public function setActualDespatchDate(?\DateTime $actualDespatchDate = null)
    {
        $this->actualDespatchDate = $actualDespatchDate;
        return $this;
    }

    /**
     * Gets as actualDespatchTime
     *
     * BBIE
     *  Despatch. Actual_ Despatch Time. Time
     *  The actual despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getActualDespatchTime()
    {
        return $this->actualDespatchTime;
    }

    /**
     * Sets a new actualDespatchTime
     *
     * BBIE
     *  Despatch. Actual_ Despatch Time. Time
     *  The actual despatch (pickup) time.
     *  0..1
     *  Despatch
     *  Actual
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $actualDespatchTime
     * @return self
     */
    public function setActualDespatchTime(?\DateTime $actualDespatchTime = null)
    {
        $this->actualDespatchTime = $actualDespatchTime;
        return $this;
    }

    /**
     * Gets as guaranteedDespatchDate
     *
     * BBIE
     *  Despatch. Guaranteed_ Despatch Date. Date
     *  The date guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getGuaranteedDespatchDate()
    {
        return $this->guaranteedDespatchDate;
    }

    /**
     * Sets a new guaranteedDespatchDate
     *
     * BBIE
     *  Despatch. Guaranteed_ Despatch Date. Date
     *  The date guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $guaranteedDespatchDate
     * @return self
     */
    public function setGuaranteedDespatchDate(?\DateTime $guaranteedDespatchDate = null)
    {
        $this->guaranteedDespatchDate = $guaranteedDespatchDate;
        return $this;
    }

    /**
     * Gets as guaranteedDespatchTime
     *
     * BBIE
     *  Despatch. Guaranteed_ Despatch Time. Time
     *  The time guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getGuaranteedDespatchTime()
    {
        return $this->guaranteedDespatchTime;
    }

    /**
     * Sets a new guaranteedDespatchTime
     *
     * BBIE
     *  Despatch. Guaranteed_ Despatch Time. Time
     *  The time guaranteed for the despatch (pickup).
     *  0..1
     *  Despatch
     *  Guaranteed
     *  Despatch Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $guaranteedDespatchTime
     * @return self
     */
    public function setGuaranteedDespatchTime(?\DateTime $guaranteedDespatchTime = null)
    {
        $this->guaranteedDespatchTime = $guaranteedDespatchTime;
        return $this;
    }

    /**
     * Gets as releaseID
     *
     * BBIE
     *  Despatch. Release. Identifier
     *  An identifier for the release of the despatch used as security control or cargo control (pick-up).
     *  0..1
     *  Despatch
     *  Release
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\ReleaseID
     */
    public function getReleaseID()
    {
        return $this->releaseID;
    }

    /**
     * Sets a new releaseID
     *
     * BBIE
     *  Despatch. Release. Identifier
     *  An identifier for the release of the despatch used as security control or cargo control (pick-up).
     *  0..1
     *  Despatch
     *  Release
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ReleaseID $releaseID
     * @return self
     */
    public function setReleaseID(?\Ubl21\CommonBasicComponents\ReleaseID $releaseID = null)
    {
        $this->releaseID = $releaseID;
        return $this;
    }

    /**
     * Adds as instructions
     *
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Instructions $instructions
     */
    public function addToInstructions(\Ubl21\CommonBasicComponents\Instructions $instructions)
    {
        $this->instructions[] = $instructions;
        return $this;
    }

    /**
     * isset instructions
     *
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetInstructions($index)
    {
        return isset($this->instructions[$index]);
    }

    /**
     * unset instructions
     *
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetInstructions($index)
    {
        unset($this->instructions[$index]);
    }

    /**
     * Gets as instructions
     *
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Instructions[]
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * Sets a new instructions
     *
     * BBIE
     *  Despatch. Instructions. Text
     *  Text describing any special instructions applying to the despatch (pickup).
     *  0..n
     *  Despatch
     *  Instructions
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Instructions[] $instructions
     * @return self
     */
    public function setInstructions(?array $instructions = null)
    {
        $this->instructions = $instructions;
        return $this;
    }

    /**
     * Gets as despatchAddress
     *
     * ASBIE
     *  Despatch. Despatch_ Address. Address
     *  The address of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Address
     *  Address
     *  Address
     *
     * @return \Ubl21\CommonAggregateComponents\DespatchAddress
     */
    public function getDespatchAddress()
    {
        return $this->despatchAddress;
    }

    /**
     * Sets a new despatchAddress
     *
     * ASBIE
     *  Despatch. Despatch_ Address. Address
     *  The address of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Address
     *  Address
     *  Address
     *
     * @param \Ubl21\CommonAggregateComponents\DespatchAddress $despatchAddress
     * @return self
     */
    public function setDespatchAddress(?\Ubl21\CommonAggregateComponents\DespatchAddress $despatchAddress = null)
    {
        $this->despatchAddress = $despatchAddress;
        return $this;
    }

    /**
     * Gets as despatchLocation
     *
     * ASBIE
     *  Despatch. Despatch_ Location. Location
     *  The location of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Location
     *  Location
     *  Location
     *
     * @return \Ubl21\CommonAggregateComponents\DespatchLocation
     */
    public function getDespatchLocation()
    {
        return $this->despatchLocation;
    }

    /**
     * Sets a new despatchLocation
     *
     * ASBIE
     *  Despatch. Despatch_ Location. Location
     *  The location of the despatch (pickup).
     *  0..1
     *  Despatch
     *  Despatch
     *  Location
     *  Location
     *  Location
     *
     * @param \Ubl21\CommonAggregateComponents\DespatchLocation $despatchLocation
     * @return self
     */
    public function setDespatchLocation(?\Ubl21\CommonAggregateComponents\DespatchLocation $despatchLocation = null)
    {
        $this->despatchLocation = $despatchLocation;
        return $this;
    }

    /**
     * Gets as despatchParty
     *
     * ASBIE
     *  Despatch. Despatch_ Party. Party
     *  The party despatching the goods.
     *  0..1
     *  Despatch
     *  Despatch
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\DespatchParty
     */
    public function getDespatchParty()
    {
        return $this->despatchParty;
    }

    /**
     * Sets a new despatchParty
     *
     * ASBIE
     *  Despatch. Despatch_ Party. Party
     *  The party despatching the goods.
     *  0..1
     *  Despatch
     *  Despatch
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\DespatchParty $despatchParty
     * @return self
     */
    public function setDespatchParty(?\Ubl21\CommonAggregateComponents\DespatchParty $despatchParty = null)
    {
        $this->despatchParty = $despatchParty;
        return $this;
    }

    /**
     * Gets as carrierParty
     *
     * ASBIE
     *  Despatch. Carrier_ Party. Party
     *  The party carrying the goods.
     *  0..1
     *  Despatch
     *  Carrier
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\CarrierParty
     */
    public function getCarrierParty()
    {
        return $this->carrierParty;
    }

    /**
     * Sets a new carrierParty
     *
     * ASBIE
     *  Despatch. Carrier_ Party. Party
     *  The party carrying the goods.
     *  0..1
     *  Despatch
     *  Carrier
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\CarrierParty $carrierParty
     * @return self
     */
    public function setCarrierParty(?\Ubl21\CommonAggregateComponents\CarrierParty $carrierParty = null)
    {
        $this->carrierParty = $carrierParty;
        return $this;
    }

    /**
     * Adds as notifyParty
     *
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\NotifyParty $notifyParty
     */
    public function addToNotifyParty(\Ubl21\CommonAggregateComponents\NotifyParty $notifyParty)
    {
        $this->notifyParty[] = $notifyParty;
        return $this;
    }

    /**
     * isset notifyParty
     *
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNotifyParty($index)
    {
        return isset($this->notifyParty[$index]);
    }

    /**
     * unset notifyParty
     *
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNotifyParty($index)
    {
        unset($this->notifyParty[$index]);
    }

    /**
     * Gets as notifyParty
     *
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\NotifyParty[]
     */
    public function getNotifyParty()
    {
        return $this->notifyParty;
    }

    /**
     * Sets a new notifyParty
     *
     * ASBIE
     *  Despatch. Notify_ Party. Party
     *  A party to be notified of this despatch (pickup).
     *  0..n
     *  Despatch
     *  Notify
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\NotifyParty[] $notifyParty
     * @return self
     */
    public function setNotifyParty(?array $notifyParty = null)
    {
        $this->notifyParty = $notifyParty;
        return $this;
    }

    /**
     * Gets as contact
     *
     * ASBIE
     *  Despatch. Contact
     *  The primary contact for this despatch (pickup).
     *  0..1
     *  Despatch
     *  Contact
     *  Contact
     *  Contact
     *
     * @return \Ubl21\CommonAggregateComponents\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets a new contact
     *
     * ASBIE
     *  Despatch. Contact
     *  The primary contact for this despatch (pickup).
     *  0..1
     *  Despatch
     *  Contact
     *  Contact
     *  Contact
     *
     * @param \Ubl21\CommonAggregateComponents\Contact $contact
     * @return self
     */
    public function setContact(?\Ubl21\CommonAggregateComponents\Contact $contact = null)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Gets as estimatedDespatchPeriod
     *
     * ASBIE
     *  Despatch. Estimated Despatch_ Period. Period
     *  The period estimated for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Estimated Despatch
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\EstimatedDespatchPeriod
     */
    public function getEstimatedDespatchPeriod()
    {
        return $this->estimatedDespatchPeriod;
    }

    /**
     * Sets a new estimatedDespatchPeriod
     *
     * ASBIE
     *  Despatch. Estimated Despatch_ Period. Period
     *  The period estimated for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Estimated Despatch
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\EstimatedDespatchPeriod $estimatedDespatchPeriod
     * @return self
     */
    public function setEstimatedDespatchPeriod(?\Ubl21\CommonAggregateComponents\EstimatedDespatchPeriod $estimatedDespatchPeriod = null)
    {
        $this->estimatedDespatchPeriod = $estimatedDespatchPeriod;
        return $this;
    }

    /**
     * Gets as requestedDespatchPeriod
     *
     * ASBIE
     *  Despatch. Requested Despatch_ Period. Period
     *  The period requested for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Requested Despatch
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\RequestedDespatchPeriod
     */
    public function getRequestedDespatchPeriod()
    {
        return $this->requestedDespatchPeriod;
    }

    /**
     * Sets a new requestedDespatchPeriod
     *
     * ASBIE
     *  Despatch. Requested Despatch_ Period. Period
     *  The period requested for the despatch (pickup) of goods.
     *  0..1
     *  Despatch
     *  Requested Despatch
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\RequestedDespatchPeriod $requestedDespatchPeriod
     * @return self
     */
    public function setRequestedDespatchPeriod(?\Ubl21\CommonAggregateComponents\RequestedDespatchPeriod $requestedDespatchPeriod = null)
    {
        $this->requestedDespatchPeriod = $requestedDespatchPeriod;
        return $this;
    }
}

