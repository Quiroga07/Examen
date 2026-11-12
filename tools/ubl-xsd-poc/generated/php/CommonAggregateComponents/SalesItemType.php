<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing SalesItemType
 *
 * ABIE
 *  Sales Item. Details
 *  A class to describe information related to an item in a sales context
 *  Sales Item
 * XSD Type: SalesItemType
 */
class SalesItemType
{
    /**
     * BBIE
     *  Sales Item. Quantity
     *  The quantity the given information are related to
     *  1
     *  Sales Item
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\Quantity $quantity
     */
    private $quantity = null;

    /**
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @var \Ubl21\CommonAggregateComponents\ActivityProperty[] $activityProperty
     */
    private $activityProperty = [
        
    ];

    /**
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @var \Ubl21\CommonAggregateComponents\TaxExclusivePrice[] $taxExclusivePrice
     */
    private $taxExclusivePrice = [
        
    ];

    /**
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @var \Ubl21\CommonAggregateComponents\TaxInclusivePrice[] $taxInclusivePrice
     */
    private $taxInclusivePrice = [
        
    ];

    /**
     * ASBIE
     *  Sales Item. Item
     *  The sales item itself.
     *  1
     *  Sales Item
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\Item $item
     */
    private $item = null;

    /**
     * Gets as quantity
     *
     * BBIE
     *  Sales Item. Quantity
     *  The quantity the given information are related to
     *  1
     *  Sales Item
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\Quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets a new quantity
     *
     * BBIE
     *  Sales Item. Quantity
     *  The quantity the given information are related to
     *  1
     *  Sales Item
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\Quantity $quantity
     * @return self
     */
    public function setQuantity(\Ubl21\CommonBasicComponents\Quantity $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Adds as activityProperty
     *
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\ActivityProperty $activityProperty
     */
    public function addToActivityProperty(\Ubl21\CommonAggregateComponents\ActivityProperty $activityProperty)
    {
        $this->activityProperty[] = $activityProperty;
        return $this;
    }

    /**
     * isset activityProperty
     *
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @param int|string $index
     * @return bool
     */
    public function issetActivityProperty($index)
    {
        return isset($this->activityProperty[$index]);
    }

    /**
     * unset activityProperty
     *
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @param int|string $index
     * @return void
     */
    public function unsetActivityProperty($index)
    {
        unset($this->activityProperty[$index]);
    }

    /**
     * Gets as activityProperty
     *
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @return \Ubl21\CommonAggregateComponents\ActivityProperty[]
     */
    public function getActivityProperty()
    {
        return $this->activityProperty;
    }

    /**
     * Sets a new activityProperty
     *
     * ASBIE
     *  Sales Item. Activity Property
     *  A class to describe the activity (for example "sales", "movement", ...) related to the item.
     *  0..n
     *  Sales Item
     *  Activity Property
     *  Activity Property
     *  Activity Property
     *
     * @param \Ubl21\CommonAggregateComponents\ActivityProperty[] $activityProperty
     * @return self
     */
    public function setActivityProperty(?array $activityProperty = null)
    {
        $this->activityProperty = $activityProperty;
        return $this;
    }

    /**
     * Adds as taxExclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\TaxExclusivePrice $taxExclusivePrice
     */
    public function addToTaxExclusivePrice(\Ubl21\CommonAggregateComponents\TaxExclusivePrice $taxExclusivePrice)
    {
        $this->taxExclusivePrice[] = $taxExclusivePrice;
        return $this;
    }

    /**
     * isset taxExclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTaxExclusivePrice($index)
    {
        return isset($this->taxExclusivePrice[$index]);
    }

    /**
     * unset taxExclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTaxExclusivePrice($index)
    {
        unset($this->taxExclusivePrice[$index]);
    }

    /**
     * Gets as taxExclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @return \Ubl21\CommonAggregateComponents\TaxExclusivePrice[]
     */
    public function getTaxExclusivePrice()
    {
        return $this->taxExclusivePrice;
    }

    /**
     * Sets a new taxExclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Exclusive_ Price. Price
     *  A price for this sales item, exclusive of tax.
     *  0..n
     *  Sales Item
     *  Tax Exclusive
     *  Price
     *  Price
     *  Price
     *
     * @param \Ubl21\CommonAggregateComponents\TaxExclusivePrice[] $taxExclusivePrice
     * @return self
     */
    public function setTaxExclusivePrice(?array $taxExclusivePrice = null)
    {
        $this->taxExclusivePrice = $taxExclusivePrice;
        return $this;
    }

    /**
     * Adds as taxInclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\TaxInclusivePrice $taxInclusivePrice
     */
    public function addToTaxInclusivePrice(\Ubl21\CommonAggregateComponents\TaxInclusivePrice $taxInclusivePrice)
    {
        $this->taxInclusivePrice[] = $taxInclusivePrice;
        return $this;
    }

    /**
     * isset taxInclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTaxInclusivePrice($index)
    {
        return isset($this->taxInclusivePrice[$index]);
    }

    /**
     * unset taxInclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTaxInclusivePrice($index)
    {
        unset($this->taxInclusivePrice[$index]);
    }

    /**
     * Gets as taxInclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @return \Ubl21\CommonAggregateComponents\TaxInclusivePrice[]
     */
    public function getTaxInclusivePrice()
    {
        return $this->taxInclusivePrice;
    }

    /**
     * Sets a new taxInclusivePrice
     *
     * ASBIE
     *  Sales Item. Tax Inclusive_ Price. Price
     *  A price for this sales item, including tax.
     *  0..n
     *  Sales Item
     *  Tax Inclusive
     *  Price
     *  Price
     *  Price
     *
     * @param \Ubl21\CommonAggregateComponents\TaxInclusivePrice[] $taxInclusivePrice
     * @return self
     */
    public function setTaxInclusivePrice(?array $taxInclusivePrice = null)
    {
        $this->taxInclusivePrice = $taxInclusivePrice;
        return $this;
    }

    /**
     * Gets as item
     *
     * ASBIE
     *  Sales Item. Item
     *  The sales item itself.
     *  1
     *  Sales Item
     *  Item
     *  Item
     *  Item
     *
     * @return \Ubl21\CommonAggregateComponents\Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Sets a new item
     *
     * ASBIE
     *  Sales Item. Item
     *  The sales item itself.
     *  1
     *  Sales Item
     *  Item
     *  Item
     *  Item
     *
     * @param \Ubl21\CommonAggregateComponents\Item $item
     * @return self
     */
    public function setItem(\Ubl21\CommonAggregateComponents\Item $item)
    {
        $this->item = $item;
        return $this;
    }
}

