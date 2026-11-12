<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ContractingActivityType
 *
 * ABIE
 *  Contracting Activity. Details
 *  The nature of the type of business of the organization.
 *  Contracting Activity
 * XSD Type: ContractingActivityType
 */
class ContractingActivityType
{
    /**
     * BBIE
     *  Contracting Activity. Activity Type Code. Code
     *  A code specifying the nature of the type of business of the organization.
     *  0..1
     *  Contracting Activity
     *  Activity Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ActivityTypeCode $activityTypeCode
     */
    private $activityTypeCode = null;

    /**
     * BBIE
     *  Contracting Activity. Activity Type. Text
     *  The nature of the type of business of the organization, expressed as text.
     *  0..1
     *  Contracting Activity
     *  Activity Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ActivityType $activityType
     */
    private $activityType = null;

    /**
     * Gets as activityTypeCode
     *
     * BBIE
     *  Contracting Activity. Activity Type Code. Code
     *  A code specifying the nature of the type of business of the organization.
     *  0..1
     *  Contracting Activity
     *  Activity Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ActivityTypeCode
     */
    public function getActivityTypeCode()
    {
        return $this->activityTypeCode;
    }

    /**
     * Sets a new activityTypeCode
     *
     * BBIE
     *  Contracting Activity. Activity Type Code. Code
     *  A code specifying the nature of the type of business of the organization.
     *  0..1
     *  Contracting Activity
     *  Activity Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ActivityTypeCode $activityTypeCode
     * @return self
     */
    public function setActivityTypeCode(?\Ubl21\CommonBasicComponents\ActivityTypeCode $activityTypeCode = null)
    {
        $this->activityTypeCode = $activityTypeCode;
        return $this;
    }

    /**
     * Gets as activityType
     *
     * BBIE
     *  Contracting Activity. Activity Type. Text
     *  The nature of the type of business of the organization, expressed as text.
     *  0..1
     *  Contracting Activity
     *  Activity Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ActivityType
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * Sets a new activityType
     *
     * BBIE
     *  Contracting Activity. Activity Type. Text
     *  The nature of the type of business of the organization, expressed as text.
     *  0..1
     *  Contracting Activity
     *  Activity Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ActivityType $activityType
     * @return self
     */
    public function setActivityType(?\Ubl21\CommonBasicComponents\ActivityType $activityType = null)
    {
        $this->activityType = $activityType;
        return $this;
    }
}

