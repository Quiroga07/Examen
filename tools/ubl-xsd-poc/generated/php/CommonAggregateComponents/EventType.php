<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing EventType
 *
 * ABIE
 *  Event. Details
 *  A class to describe a significant occurrence relating to an object, process, or person.
 *  Event
 * XSD Type: EventType
 */
class EventType
{
    /**
     * BBIE
     *  Event. Identification. Identifier
     *  An identifier for this event within an agreed event identification scheme.
     *  0..1
     *  Event
     *  Identification
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\IdentificationID $identificationID
     */
    private $identificationID = null;

    /**
     * BBIE
     *  Event. Occurrence Date. Date
     *  The date of this event.
     *  0..1
     *  Event
     *  Occurrence Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $occurrenceDate
     */
    private $occurrenceDate = null;

    /**
     * BBIE
     *  Event. Occurrence Time. Time
     *  The time of this event.
     *  0..1
     *  Event
     *  Occurrence Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $occurrenceTime
     */
    private $occurrenceTime = null;

    /**
     * BBIE
     *  Event. Type Code. Code
     *  A code signifying the type of this event.
     *  0..1
     *  Event
     *  Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\TypeCode $typeCode
     */
    private $typeCode = null;

    /**
     * BBIE
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * BBIE
     *  Event. Completion_ Indicator. Indicator
     *  An indicator that this event has been completed (true) or not (false).
     *  0..1
     *  Event
     *  Completion
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $completionIndicator
     */
    private $completionIndicator = null;

    /**
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @var \Ubl21\CommonAggregateComponents\CurrentStatus[] $currentStatus
     */
    private $currentStatus = [
        
    ];

    /**
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @var \Ubl21\CommonAggregateComponents\Contact[] $contact
     */
    private $contact = [
        
    ];

    /**
     * ASBIE
     *  Event. Occurence_ Location. Location
     *  The location of this event.
     *  0..1
     *  Event
     *  Occurence
     *  Location
     *  Location
     *  Location
     *
     * @var \Ubl21\CommonAggregateComponents\OccurenceLocation $occurenceLocation
     */
    private $occurenceLocation = null;

    /**
     * Gets as identificationID
     *
     * BBIE
     *  Event. Identification. Identifier
     *  An identifier for this event within an agreed event identification scheme.
     *  0..1
     *  Event
     *  Identification
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\IdentificationID
     */
    public function getIdentificationID()
    {
        return $this->identificationID;
    }

    /**
     * Sets a new identificationID
     *
     * BBIE
     *  Event. Identification. Identifier
     *  An identifier for this event within an agreed event identification scheme.
     *  0..1
     *  Event
     *  Identification
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\IdentificationID $identificationID
     * @return self
     */
    public function setIdentificationID(?\Ubl21\CommonBasicComponents\IdentificationID $identificationID = null)
    {
        $this->identificationID = $identificationID;
        return $this;
    }

    /**
     * Gets as occurrenceDate
     *
     * BBIE
     *  Event. Occurrence Date. Date
     *  The date of this event.
     *  0..1
     *  Event
     *  Occurrence Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getOccurrenceDate()
    {
        return $this->occurrenceDate;
    }

    /**
     * Sets a new occurrenceDate
     *
     * BBIE
     *  Event. Occurrence Date. Date
     *  The date of this event.
     *  0..1
     *  Event
     *  Occurrence Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $occurrenceDate
     * @return self
     */
    public function setOccurrenceDate(?\DateTime $occurrenceDate = null)
    {
        $this->occurrenceDate = $occurrenceDate;
        return $this;
    }

    /**
     * Gets as occurrenceTime
     *
     * BBIE
     *  Event. Occurrence Time. Time
     *  The time of this event.
     *  0..1
     *  Event
     *  Occurrence Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getOccurrenceTime()
    {
        return $this->occurrenceTime;
    }

    /**
     * Sets a new occurrenceTime
     *
     * BBIE
     *  Event. Occurrence Time. Time
     *  The time of this event.
     *  0..1
     *  Event
     *  Occurrence Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $occurrenceTime
     * @return self
     */
    public function setOccurrenceTime(?\DateTime $occurrenceTime = null)
    {
        $this->occurrenceTime = $occurrenceTime;
        return $this;
    }

    /**
     * Gets as typeCode
     *
     * BBIE
     *  Event. Type Code. Code
     *  A code signifying the type of this event.
     *  0..1
     *  Event
     *  Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\TypeCode
     */
    public function getTypeCode()
    {
        return $this->typeCode;
    }

    /**
     * Sets a new typeCode
     *
     * BBIE
     *  Event. Type Code. Code
     *  A code signifying the type of this event.
     *  0..1
     *  Event
     *  Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\TypeCode $typeCode
     * @return self
     */
    public function setTypeCode(?\Ubl21\CommonBasicComponents\TypeCode $typeCode = null)
    {
        $this->typeCode = $typeCode;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
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
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
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
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
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
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
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
     *  Event. Description. Text
     *  Text describing this event.
     *  0..n
     *  Event
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
     * Gets as completionIndicator
     *
     * BBIE
     *  Event. Completion_ Indicator. Indicator
     *  An indicator that this event has been completed (true) or not (false).
     *  0..1
     *  Event
     *  Completion
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getCompletionIndicator()
    {
        return $this->completionIndicator;
    }

    /**
     * Sets a new completionIndicator
     *
     * BBIE
     *  Event. Completion_ Indicator. Indicator
     *  An indicator that this event has been completed (true) or not (false).
     *  0..1
     *  Event
     *  Completion
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $completionIndicator
     * @return self
     */
    public function setCompletionIndicator($completionIndicator)
    {
        $this->completionIndicator = $completionIndicator;
        return $this;
    }

    /**
     * Adds as currentStatus
     *
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\CurrentStatus $currentStatus
     */
    public function addToCurrentStatus(\Ubl21\CommonAggregateComponents\CurrentStatus $currentStatus)
    {
        $this->currentStatus[] = $currentStatus;
        return $this;
    }

    /**
     * isset currentStatus
     *
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCurrentStatus($index)
    {
        return isset($this->currentStatus[$index]);
    }

    /**
     * unset currentStatus
     *
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCurrentStatus($index)
    {
        unset($this->currentStatus[$index]);
    }

    /**
     * Gets as currentStatus
     *
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @return \Ubl21\CommonAggregateComponents\CurrentStatus[]
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * Sets a new currentStatus
     *
     * ASBIE
     *  Event. Current_ Status. Status
     *  The current status of this event.
     *  0..n
     *  Event
     *  Current
     *  Status
     *  Status
     *  Status
     *
     * @param \Ubl21\CommonAggregateComponents\CurrentStatus[] $currentStatus
     * @return self
     */
    public function setCurrentStatus(?array $currentStatus = null)
    {
        $this->currentStatus = $currentStatus;
        return $this;
    }

    /**
     * Adds as contact
     *
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\Contact $contact
     */
    public function addToContact(\Ubl21\CommonAggregateComponents\Contact $contact)
    {
        $this->contact[] = $contact;
        return $this;
    }

    /**
     * isset contact
     *
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @param int|string $index
     * @return bool
     */
    public function issetContact($index)
    {
        return isset($this->contact[$index]);
    }

    /**
     * unset contact
     *
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @param int|string $index
     * @return void
     */
    public function unsetContact($index)
    {
        unset($this->contact[$index]);
    }

    /**
     * Gets as contact
     *
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @return \Ubl21\CommonAggregateComponents\Contact[]
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets a new contact
     *
     * ASBIE
     *  Event. Contact
     *  Contacts associated with this event.
     *  0..n
     *  Event
     *  Contact
     *  Contact
     *  Contact
     *
     * @param \Ubl21\CommonAggregateComponents\Contact[] $contact
     * @return self
     */
    public function setContact(?array $contact = null)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Gets as occurenceLocation
     *
     * ASBIE
     *  Event. Occurence_ Location. Location
     *  The location of this event.
     *  0..1
     *  Event
     *  Occurence
     *  Location
     *  Location
     *  Location
     *
     * @return \Ubl21\CommonAggregateComponents\OccurenceLocation
     */
    public function getOccurenceLocation()
    {
        return $this->occurenceLocation;
    }

    /**
     * Sets a new occurenceLocation
     *
     * ASBIE
     *  Event. Occurence_ Location. Location
     *  The location of this event.
     *  0..1
     *  Event
     *  Occurence
     *  Location
     *  Location
     *  Location
     *
     * @param \Ubl21\CommonAggregateComponents\OccurenceLocation $occurenceLocation
     * @return self
     */
    public function setOccurenceLocation(?\Ubl21\CommonAggregateComponents\OccurenceLocation $occurenceLocation = null)
    {
        $this->occurenceLocation = $occurenceLocation;
        return $this;
    }
}

