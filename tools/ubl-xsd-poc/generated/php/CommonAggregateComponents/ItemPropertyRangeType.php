<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ItemPropertyRangeType
 *
 * ABIE
 *  Item Property Range. Details
 *  A class to describe a range of values for an item property.
 *  Item Property Range
 * XSD Type: ItemPropertyRangeType
 */
class ItemPropertyRangeType
{
    /**
     * BBIE
     *  Item Property Range. Minimum_ Value. Text
     *  The minimum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Minimum
     *  Value
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\MinimumValue $minimumValue
     */
    private $minimumValue = null;

    /**
     * BBIE
     *  Item Property Range. Maximum_ Value. Text
     *  The maximum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Maximum
     *  Value
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\MaximumValue $maximumValue
     */
    private $maximumValue = null;

    /**
     * Gets as minimumValue
     *
     * BBIE
     *  Item Property Range. Minimum_ Value. Text
     *  The minimum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Minimum
     *  Value
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\MinimumValue
     */
    public function getMinimumValue()
    {
        return $this->minimumValue;
    }

    /**
     * Sets a new minimumValue
     *
     * BBIE
     *  Item Property Range. Minimum_ Value. Text
     *  The minimum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Minimum
     *  Value
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\MinimumValue $minimumValue
     * @return self
     */
    public function setMinimumValue(?\Ubl21\CommonBasicComponents\MinimumValue $minimumValue = null)
    {
        $this->minimumValue = $minimumValue;
        return $this;
    }

    /**
     * Gets as maximumValue
     *
     * BBIE
     *  Item Property Range. Maximum_ Value. Text
     *  The maximum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Maximum
     *  Value
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\MaximumValue
     */
    public function getMaximumValue()
    {
        return $this->maximumValue;
    }

    /**
     * Sets a new maximumValue
     *
     * BBIE
     *  Item Property Range. Maximum_ Value. Text
     *  The maximum value in this range of values.
     *  0..1
     *  Item Property Range
     *  Maximum
     *  Value
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\MaximumValue $maximumValue
     * @return self
     */
    public function setMaximumValue(?\Ubl21\CommonBasicComponents\MaximumValue $maximumValue = null)
    {
        $this->maximumValue = $maximumValue;
        return $this;
    }
}

