<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing UtilityItemType
 *
 * ABIE
 *  Utility Item. Details
 *  A class to describe the consumption of a utility product.
 *  Utility Item
 * XSD Type: UtilityItemType
 */
class UtilityItemType
{
    /**
     * BBIE
     *  Utility Item. Identifier
     *  An identifier for this utility item.
     *  1
     *  Utility Item
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  1
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Utility Item. Subscriber Identifier. Identifier
     *  An identifier for the subscriber to the utility.
     *  0..1
     *  Utility Item
     *  Subscriber Identifier
     *  Identifier
     *  Identifier. Type
     *  98143211
     *
     * @var \Ubl21\CommonBasicComponents\SubscriberID $subscriberID
     */
    private $subscriberID = null;

    /**
     * BBIE
     *  Utility Item. Subscriber Type. Text
     *  Identification of the subscriber type, expressed as text..
     *  0..1
     *  Utility Item
     *  Subscriber Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\SubscriberType $subscriberType
     */
    private $subscriberType = null;

    /**
     * BBIE
     *  Utility Item. Subscriber Type Code. Code
     *  The code identifying for the service type.
     *  0..1
     *  Utility Item
     *  Subscriber Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\SubscriberTypeCode $subscriberTypeCode
     */
    private $subscriberTypeCode = null;

    /**
     * BBIE
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * BBIE
     *  Utility Item. Pack Quantity. Quantity
     *  The unit packaging quantity.
     *  0..1
     *  Utility Item
     *  Pack Quantity
     *  Quantity
     *  Quantity. Type
     *  1
     *
     * @var \Ubl21\CommonBasicComponents\PackQuantity $packQuantity
     */
    private $packQuantity = null;

    /**
     * BBIE
     *  Utility Item. Pack Size. Numeric
     *  The number of items in a pack.
     *  0..1
     *  Utility Item
     *  Pack Size
     *  Numeric
     *  Numeric. Type
     *
     * @var \Ubl21\CommonBasicComponents\PackSizeNumeric $packSizeNumeric
     */
    private $packSizeNumeric = null;

    /**
     * BBIE
     *  Utility Item. Consumption Type. Text
     *  The type of product consumed, expressed as text.
     *  0..1
     *  Utility Item
     *  Consumption Type
     *  Text
     *  Text. Type
     *  Consumption
     *
     * @var \Ubl21\CommonBasicComponents\ConsumptionType $consumptionType
     */
    private $consumptionType = null;

    /**
     * BBIE
     *  Utility Item. Consumption Type Code. Code
     *  The type of product consumed, expressed as a code.
     *  0..1
     *  Utility Item
     *  Consumption Type Code
     *  Code
     *  Code. Type
     *  Consumption
     *
     * @var \Ubl21\CommonBasicComponents\ConsumptionTypeCode $consumptionTypeCode
     */
    private $consumptionTypeCode = null;

    /**
     * BBIE
     *  Utility Item. Current_ Charge Type. Text
     *  Information of the actual payments type for the utility Item
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\CurrentChargeType $currentChargeType
     */
    private $currentChargeType = null;

    /**
     * BBIE
     *  Utility Item. Current_ Charge Type Code. Code
     *  Information of the actual payments type code expressed as a code
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\CurrentChargeTypeCode $currentChargeTypeCode
     */
    private $currentChargeTypeCode = null;

    /**
     * BBIE
     *  Utility Item. One Time_ Charge Type. Text
     *  Information about the one-time payment type in case everything is paid One time
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\OneTimeChargeType $oneTimeChargeType
     */
    private $oneTimeChargeType = null;

    /**
     * BBIE
     *  Utility Item. One Time_ Charge Type Code. Code
     *  Information about the one-time payment type code
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\OneTimeChargeTypeCode $oneTimeChargeTypeCode
     */
    private $oneTimeChargeTypeCode = null;

    /**
     * ASBIE
     *  Utility Item. Tax Category
     *  The tax category applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Tax Category
     *  Tax Category
     *  Tax Category
     *
     * @var \Ubl21\CommonAggregateComponents\TaxCategory $taxCategory
     */
    private $taxCategory = null;

    /**
     * ASBIE
     *  Utility Item. Contract
     *  A contract setting forth conditions applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Contract
     *  Contract
     *  Contract
     *
     * @var \Ubl21\CommonAggregateComponents\Contract $contract
     */
    private $contract = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Utility Item. Identifier
     *  An identifier for this utility item.
     *  1
     *  Utility Item
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  1
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
     *  Utility Item. Identifier
     *  An identifier for this utility item.
     *  1
     *  Utility Item
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  1
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
     * Gets as subscriberID
     *
     * BBIE
     *  Utility Item. Subscriber Identifier. Identifier
     *  An identifier for the subscriber to the utility.
     *  0..1
     *  Utility Item
     *  Subscriber Identifier
     *  Identifier
     *  Identifier. Type
     *  98143211
     *
     * @return \Ubl21\CommonBasicComponents\SubscriberID
     */
    public function getSubscriberID()
    {
        return $this->subscriberID;
    }

    /**
     * Sets a new subscriberID
     *
     * BBIE
     *  Utility Item. Subscriber Identifier. Identifier
     *  An identifier for the subscriber to the utility.
     *  0..1
     *  Utility Item
     *  Subscriber Identifier
     *  Identifier
     *  Identifier. Type
     *  98143211
     *
     * @param \Ubl21\CommonBasicComponents\SubscriberID $subscriberID
     * @return self
     */
    public function setSubscriberID(?\Ubl21\CommonBasicComponents\SubscriberID $subscriberID = null)
    {
        $this->subscriberID = $subscriberID;
        return $this;
    }

    /**
     * Gets as subscriberType
     *
     * BBIE
     *  Utility Item. Subscriber Type. Text
     *  Identification of the subscriber type, expressed as text..
     *  0..1
     *  Utility Item
     *  Subscriber Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\SubscriberType
     */
    public function getSubscriberType()
    {
        return $this->subscriberType;
    }

    /**
     * Sets a new subscriberType
     *
     * BBIE
     *  Utility Item. Subscriber Type. Text
     *  Identification of the subscriber type, expressed as text..
     *  0..1
     *  Utility Item
     *  Subscriber Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\SubscriberType $subscriberType
     * @return self
     */
    public function setSubscriberType(?\Ubl21\CommonBasicComponents\SubscriberType $subscriberType = null)
    {
        $this->subscriberType = $subscriberType;
        return $this;
    }

    /**
     * Gets as subscriberTypeCode
     *
     * BBIE
     *  Utility Item. Subscriber Type Code. Code
     *  The code identifying for the service type.
     *  0..1
     *  Utility Item
     *  Subscriber Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\SubscriberTypeCode
     */
    public function getSubscriberTypeCode()
    {
        return $this->subscriberTypeCode;
    }

    /**
     * Sets a new subscriberTypeCode
     *
     * BBIE
     *  Utility Item. Subscriber Type Code. Code
     *  The code identifying for the service type.
     *  0..1
     *  Utility Item
     *  Subscriber Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\SubscriberTypeCode $subscriberTypeCode
     * @return self
     */
    public function setSubscriberTypeCode(?\Ubl21\CommonBasicComponents\SubscriberTypeCode $subscriberTypeCode = null)
    {
        $this->subscriberTypeCode = $subscriberTypeCode;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
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
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
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
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
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
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
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
     *  Utility Item. Description. Text
     *  Text describing the consumption product.
     *  0..n
     *  Utility Item
     *  Description
     *  Text
     *  Text. Type
     *  Basis price quarter (5.761 kWh per 35,58 cents), Transport of electricity, etc.
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
     * Gets as packQuantity
     *
     * BBIE
     *  Utility Item. Pack Quantity. Quantity
     *  The unit packaging quantity.
     *  0..1
     *  Utility Item
     *  Pack Quantity
     *  Quantity
     *  Quantity. Type
     *  1
     *
     * @return \Ubl21\CommonBasicComponents\PackQuantity
     */
    public function getPackQuantity()
    {
        return $this->packQuantity;
    }

    /**
     * Sets a new packQuantity
     *
     * BBIE
     *  Utility Item. Pack Quantity. Quantity
     *  The unit packaging quantity.
     *  0..1
     *  Utility Item
     *  Pack Quantity
     *  Quantity
     *  Quantity. Type
     *  1
     *
     * @param \Ubl21\CommonBasicComponents\PackQuantity $packQuantity
     * @return self
     */
    public function setPackQuantity(?\Ubl21\CommonBasicComponents\PackQuantity $packQuantity = null)
    {
        $this->packQuantity = $packQuantity;
        return $this;
    }

    /**
     * Gets as packSizeNumeric
     *
     * BBIE
     *  Utility Item. Pack Size. Numeric
     *  The number of items in a pack.
     *  0..1
     *  Utility Item
     *  Pack Size
     *  Numeric
     *  Numeric. Type
     *
     * @return \Ubl21\CommonBasicComponents\PackSizeNumeric
     */
    public function getPackSizeNumeric()
    {
        return $this->packSizeNumeric;
    }

    /**
     * Sets a new packSizeNumeric
     *
     * BBIE
     *  Utility Item. Pack Size. Numeric
     *  The number of items in a pack.
     *  0..1
     *  Utility Item
     *  Pack Size
     *  Numeric
     *  Numeric. Type
     *
     * @param \Ubl21\CommonBasicComponents\PackSizeNumeric $packSizeNumeric
     * @return self
     */
    public function setPackSizeNumeric(?\Ubl21\CommonBasicComponents\PackSizeNumeric $packSizeNumeric = null)
    {
        $this->packSizeNumeric = $packSizeNumeric;
        return $this;
    }

    /**
     * Gets as consumptionType
     *
     * BBIE
     *  Utility Item. Consumption Type. Text
     *  The type of product consumed, expressed as text.
     *  0..1
     *  Utility Item
     *  Consumption Type
     *  Text
     *  Text. Type
     *  Consumption
     *
     * @return \Ubl21\CommonBasicComponents\ConsumptionType
     */
    public function getConsumptionType()
    {
        return $this->consumptionType;
    }

    /**
     * Sets a new consumptionType
     *
     * BBIE
     *  Utility Item. Consumption Type. Text
     *  The type of product consumed, expressed as text.
     *  0..1
     *  Utility Item
     *  Consumption Type
     *  Text
     *  Text. Type
     *  Consumption
     *
     * @param \Ubl21\CommonBasicComponents\ConsumptionType $consumptionType
     * @return self
     */
    public function setConsumptionType(?\Ubl21\CommonBasicComponents\ConsumptionType $consumptionType = null)
    {
        $this->consumptionType = $consumptionType;
        return $this;
    }

    /**
     * Gets as consumptionTypeCode
     *
     * BBIE
     *  Utility Item. Consumption Type Code. Code
     *  The type of product consumed, expressed as a code.
     *  0..1
     *  Utility Item
     *  Consumption Type Code
     *  Code
     *  Code. Type
     *  Consumption
     *
     * @return \Ubl21\CommonBasicComponents\ConsumptionTypeCode
     */
    public function getConsumptionTypeCode()
    {
        return $this->consumptionTypeCode;
    }

    /**
     * Sets a new consumptionTypeCode
     *
     * BBIE
     *  Utility Item. Consumption Type Code. Code
     *  The type of product consumed, expressed as a code.
     *  0..1
     *  Utility Item
     *  Consumption Type Code
     *  Code
     *  Code. Type
     *  Consumption
     *
     * @param \Ubl21\CommonBasicComponents\ConsumptionTypeCode $consumptionTypeCode
     * @return self
     */
    public function setConsumptionTypeCode(?\Ubl21\CommonBasicComponents\ConsumptionTypeCode $consumptionTypeCode = null)
    {
        $this->consumptionTypeCode = $consumptionTypeCode;
        return $this;
    }

    /**
     * Gets as currentChargeType
     *
     * BBIE
     *  Utility Item. Current_ Charge Type. Text
     *  Information of the actual payments type for the utility Item
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\CurrentChargeType
     */
    public function getCurrentChargeType()
    {
        return $this->currentChargeType;
    }

    /**
     * Sets a new currentChargeType
     *
     * BBIE
     *  Utility Item. Current_ Charge Type. Text
     *  Information of the actual payments type for the utility Item
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\CurrentChargeType $currentChargeType
     * @return self
     */
    public function setCurrentChargeType(?\Ubl21\CommonBasicComponents\CurrentChargeType $currentChargeType = null)
    {
        $this->currentChargeType = $currentChargeType;
        return $this;
    }

    /**
     * Gets as currentChargeTypeCode
     *
     * BBIE
     *  Utility Item. Current_ Charge Type Code. Code
     *  Information of the actual payments type code expressed as a code
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\CurrentChargeTypeCode
     */
    public function getCurrentChargeTypeCode()
    {
        return $this->currentChargeTypeCode;
    }

    /**
     * Sets a new currentChargeTypeCode
     *
     * BBIE
     *  Utility Item. Current_ Charge Type Code. Code
     *  Information of the actual payments type code expressed as a code
     *  0..1
     *  Utility Item
     *  Current
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\CurrentChargeTypeCode $currentChargeTypeCode
     * @return self
     */
    public function setCurrentChargeTypeCode(?\Ubl21\CommonBasicComponents\CurrentChargeTypeCode $currentChargeTypeCode = null)
    {
        $this->currentChargeTypeCode = $currentChargeTypeCode;
        return $this;
    }

    /**
     * Gets as oneTimeChargeType
     *
     * BBIE
     *  Utility Item. One Time_ Charge Type. Text
     *  Information about the one-time payment type in case everything is paid One time
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\OneTimeChargeType
     */
    public function getOneTimeChargeType()
    {
        return $this->oneTimeChargeType;
    }

    /**
     * Sets a new oneTimeChargeType
     *
     * BBIE
     *  Utility Item. One Time_ Charge Type. Text
     *  Information about the one-time payment type in case everything is paid One time
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\OneTimeChargeType $oneTimeChargeType
     * @return self
     */
    public function setOneTimeChargeType(?\Ubl21\CommonBasicComponents\OneTimeChargeType $oneTimeChargeType = null)
    {
        $this->oneTimeChargeType = $oneTimeChargeType;
        return $this;
    }

    /**
     * Gets as oneTimeChargeTypeCode
     *
     * BBIE
     *  Utility Item. One Time_ Charge Type Code. Code
     *  Information about the one-time payment type code
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\OneTimeChargeTypeCode
     */
    public function getOneTimeChargeTypeCode()
    {
        return $this->oneTimeChargeTypeCode;
    }

    /**
     * Sets a new oneTimeChargeTypeCode
     *
     * BBIE
     *  Utility Item. One Time_ Charge Type Code. Code
     *  Information about the one-time payment type code
     *  0..1
     *  Utility Item
     *  One Time
     *  Charge Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\OneTimeChargeTypeCode $oneTimeChargeTypeCode
     * @return self
     */
    public function setOneTimeChargeTypeCode(?\Ubl21\CommonBasicComponents\OneTimeChargeTypeCode $oneTimeChargeTypeCode = null)
    {
        $this->oneTimeChargeTypeCode = $oneTimeChargeTypeCode;
        return $this;
    }

    /**
     * Gets as taxCategory
     *
     * ASBIE
     *  Utility Item. Tax Category
     *  The tax category applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Tax Category
     *  Tax Category
     *  Tax Category
     *
     * @return \Ubl21\CommonAggregateComponents\TaxCategory
     */
    public function getTaxCategory()
    {
        return $this->taxCategory;
    }

    /**
     * Sets a new taxCategory
     *
     * ASBIE
     *  Utility Item. Tax Category
     *  The tax category applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Tax Category
     *  Tax Category
     *  Tax Category
     *
     * @param \Ubl21\CommonAggregateComponents\TaxCategory $taxCategory
     * @return self
     */
    public function setTaxCategory(?\Ubl21\CommonAggregateComponents\TaxCategory $taxCategory = null)
    {
        $this->taxCategory = $taxCategory;
        return $this;
    }

    /**
     * Gets as contract
     *
     * ASBIE
     *  Utility Item. Contract
     *  A contract setting forth conditions applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Contract
     *  Contract
     *  Contract
     *
     * @return \Ubl21\CommonAggregateComponents\Contract
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Sets a new contract
     *
     * ASBIE
     *  Utility Item. Contract
     *  A contract setting forth conditions applicable to this utility item.
     *  0..1
     *  Utility Item
     *  Contract
     *  Contract
     *  Contract
     *
     * @param \Ubl21\CommonAggregateComponents\Contract $contract
     * @return self
     */
    public function setContract(?\Ubl21\CommonAggregateComponents\Contract $contract = null)
    {
        $this->contract = $contract;
        return $this;
    }
}

