<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing LineItemType
 *
 * ABIE
 *  Line Item. Details
 *  A class to describe a line item.
 *  Line Item
 * XSD Type: LineItemType
 */
class LineItemType
{
    /**
     * BBIE
     *  Line Item. Identifier
     *  An identifier for this line item, assigned by the buyer.
     *  1
     *  Line Item
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Line Item. Sales_ Order Identifier. Identifier
     *  An identifier for this line item, assigned by the seller.
     *  0..1
     *  Line Item
     *  Sales
     *  Order Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\SalesOrderID $salesOrderID
     */
    private $salesOrderID = null;

    /**
     * BBIE
     *  Line Item. UUID. Identifier
     *  A universally unique identifier for this line item.
     *  0..1
     *  Line Item
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\UUID $uUID
     */
    private $uUID = null;

    /**
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Note[] $note
     */
    private $note = [
        
    ];

    /**
     * BBIE
     *  Line Item. Line Status Code. Code
     *  A code signifying the status of this line item with respect to its original state.
     *  0..1
     *  Line Item
     *  Line Status Code
     *  Code
     *  Line Status
     *  Line Status_ Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\LineStatusCode $lineStatusCode
     */
    private $lineStatusCode = null;

    /**
     * BBIE
     *  Line Item. Quantity
     *  The quantity of items associated with this line item.
     *  0..1
     *  Line Item
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\Quantity $quantity
     */
    private $quantity = null;

    /**
     * BBIE
     *  Line Item. Line Extension Amount. Amount
     *  The total amount for this line item, including allowance charges but net of taxes.
     *  0..1
     *  Line Item
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\LineExtensionAmount $lineExtensionAmount
     */
    private $lineExtensionAmount = null;

    /**
     * BBIE
     *  Line Item. Total_ Tax Amount. Amount
     *  The total tax amount for this line item.
     *  0..1
     *  Line Item
     *  Total
     *  Tax Amount
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\TotalTaxAmount $totalTaxAmount
     */
    private $totalTaxAmount = null;

    /**
     * BBIE
     *  Line Item. Minimum_ Quantity. Quantity
     *  The minimum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Minimum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\MinimumQuantity $minimumQuantity
     */
    private $minimumQuantity = null;

    /**
     * BBIE
     *  Line Item. Maximum_ Quantity. Quantity
     *  The maximum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Maximum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\MaximumQuantity $maximumQuantity
     */
    private $maximumQuantity = null;

    /**
     * BBIE
     *  Line Item. Minimum_ Backorder. Quantity
     *  The minimum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Minimum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\MinimumBackorderQuantity $minimumBackorderQuantity
     */
    private $minimumBackorderQuantity = null;

    /**
     * BBIE
     *  Line Item. Maximum_ Backorder. Quantity
     *  The maximum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Maximum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\MaximumBackorderQuantity $maximumBackorderQuantity
     */
    private $maximumBackorderQuantity = null;

    /**
     * BBIE
     *  Line Item. Inspection Method Code. Code
     *  A code signifying the inspection requirements for the item associated with this line item.
     *  0..1
     *  Line Item
     *  Inspection Method Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\InspectionMethodCode $inspectionMethodCode
     */
    private $inspectionMethodCode = null;

    /**
     * BBIE
     *  Line Item. Partial Delivery Indicator. Indicator
     *  An indicator that a partial delivery is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Partial Delivery Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $partialDeliveryIndicator
     */
    private $partialDeliveryIndicator = null;

    /**
     * BBIE
     *  Line Item. Back Order Allowed Indicator. Indicator
     *  An indicator that back order is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Back Order Allowed Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $backOrderAllowedIndicator
     */
    private $backOrderAllowedIndicator = null;

    /**
     * BBIE
     *  Line Item. Accounting Cost Code. Code
     *  The buyer's accounting cost centre for this line item, expressed as a code.
     *  0..1
     *  Line Item
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\AccountingCostCode $accountingCostCode
     */
    private $accountingCostCode = null;

    /**
     * BBIE
     *  Line Item. Accounting Cost. Text
     *  The buyer's accounting cost centre for this line item, expressed as text.
     *  0..1
     *  Line Item
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\AccountingCost $accountingCost
     */
    private $accountingCost = null;

    /**
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @var \Ubl21\CommonBasicComponents\WarrantyInformation[] $warrantyInformation
     */
    private $warrantyInformation = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @var \Ubl21\CommonAggregateComponents\Delivery[] $delivery
     */
    private $delivery = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Delivery Terms
     *  Terms and conditions of the delivery associated with this line item.
     *  0..1
     *  Line Item
     *  Delivery Terms
     *  Delivery Terms
     *  Delivery Terms
     *
     * @var \Ubl21\CommonAggregateComponents\DeliveryTerms $deliveryTerms
     */
    private $deliveryTerms = null;

    /**
     * ASBIE
     *  Line Item. Originator_ Party. Party
     *  The party who originated the Order associated with this line item.
     *  0..1
     *  Line Item
     *  Originator
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\OriginatorParty $originatorParty
     */
    private $originatorParty = null;

    /**
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @var \Ubl21\CommonAggregateComponents\OrderedShipment[] $orderedShipment
     */
    private $orderedShipment = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Pricing Reference
     *  A reference to pricing and item location information associated with this line item.
     *  0..1
     *  Line Item
     *  Pricing Reference
     *  Pricing Reference
     *  Pricing Reference
     *
     * @var \Ubl21\CommonAggregateComponents\PricingReference $pricingReference
     */
    private $pricingReference = null;

    /**
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @var \Ubl21\CommonAggregateComponents\AllowanceCharge[] $allowanceCharge
     */
    private $allowanceCharge = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Price
     *  The price of the item of trade associated with this line item.
     *  0..1
     *  Line Item
     *  Price
     *  Price
     *  Price
     *
     * @var \Ubl21\CommonAggregateComponents\Price $price
     */
    private $price = null;

    /**
     * ASBIE
     *  Line Item. Item
     *  The item of trade associated with this line item.
     *  1
     *  Line Item
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\Item $item
     */
    private $item = null;

    /**
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @var \Ubl21\CommonAggregateComponents\SubLineItem[] $subLineItem
     */
    private $subLineItem = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Warranty Validity_ Period. Period
     *  The period during which the warranty associated with this line item is valid.
     *  0..1
     *  Line Item
     *  Warranty Validity
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\WarrantyValidityPeriod $warrantyValidityPeriod
     */
    private $warrantyValidityPeriod = null;

    /**
     * ASBIE
     *  Line Item. Warranty_ Party. Party
     *  The party responsible for any warranty associated with this line item.
     *  0..1
     *  Line Item
     *  Warranty
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\WarrantyParty $warrantyParty
     */
    private $warrantyParty = null;

    /**
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @var \Ubl21\CommonAggregateComponents\TaxTotal[] $taxTotal
     */
    private $taxTotal = [
        
    ];

    /**
     * ASBIE
     *  Line Item. Item_ Price Extension. Price Extension
     *  The price extension, calculated by multiplying the price per unit by the quantity of items.
     *  0..1
     *  Line Item
     *  Item
     *  Price Extension
     *  Price Extension
     *  Price Extension
     *
     * @var \Ubl21\CommonAggregateComponents\ItemPriceExtension $itemPriceExtension
     */
    private $itemPriceExtension = null;

    /**
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @var \Ubl21\CommonAggregateComponents\LineReference[] $lineReference
     */
    private $lineReference = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Line Item. Identifier
     *  An identifier for this line item, assigned by the buyer.
     *  1
     *  Line Item
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
     *  Line Item. Identifier
     *  An identifier for this line item, assigned by the buyer.
     *  1
     *  Line Item
     *  Identifier
     *  Identifier
     *  Identifier. Type
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
     * Gets as salesOrderID
     *
     * BBIE
     *  Line Item. Sales_ Order Identifier. Identifier
     *  An identifier for this line item, assigned by the seller.
     *  0..1
     *  Line Item
     *  Sales
     *  Order Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\SalesOrderID
     */
    public function getSalesOrderID()
    {
        return $this->salesOrderID;
    }

    /**
     * Sets a new salesOrderID
     *
     * BBIE
     *  Line Item. Sales_ Order Identifier. Identifier
     *  An identifier for this line item, assigned by the seller.
     *  0..1
     *  Line Item
     *  Sales
     *  Order Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\SalesOrderID $salesOrderID
     * @return self
     */
    public function setSalesOrderID(?\Ubl21\CommonBasicComponents\SalesOrderID $salesOrderID = null)
    {
        $this->salesOrderID = $salesOrderID;
        return $this;
    }

    /**
     * Gets as uUID
     *
     * BBIE
     *  Line Item. UUID. Identifier
     *  A universally unique identifier for this line item.
     *  0..1
     *  Line Item
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\UUID
     */
    public function getUUID()
    {
        return $this->uUID;
    }

    /**
     * Sets a new uUID
     *
     * BBIE
     *  Line Item. UUID. Identifier
     *  A universally unique identifier for this line item.
     *  0..1
     *  Line Item
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\UUID $uUID
     * @return self
     */
    public function setUUID(?\Ubl21\CommonBasicComponents\UUID $uUID = null)
    {
        $this->uUID = $uUID;
        return $this;
    }

    /**
     * Adds as note
     *
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Note $note
     */
    public function addToNote(\Ubl21\CommonBasicComponents\Note $note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * isset note
     *
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNote($index)
    {
        return isset($this->note[$index]);
    }

    /**
     * unset note
     *
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNote($index)
    {
        unset($this->note[$index]);
    }

    /**
     * Gets as note
     *
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Note[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets a new note
     *
     * BBIE
     *  Line Item. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Line Item
     *  Note
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Note[] $note
     * @return self
     */
    public function setNote(?array $note = null)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Gets as lineStatusCode
     *
     * BBIE
     *  Line Item. Line Status Code. Code
     *  A code signifying the status of this line item with respect to its original state.
     *  0..1
     *  Line Item
     *  Line Status Code
     *  Code
     *  Line Status
     *  Line Status_ Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\LineStatusCode
     */
    public function getLineStatusCode()
    {
        return $this->lineStatusCode;
    }

    /**
     * Sets a new lineStatusCode
     *
     * BBIE
     *  Line Item. Line Status Code. Code
     *  A code signifying the status of this line item with respect to its original state.
     *  0..1
     *  Line Item
     *  Line Status Code
     *  Code
     *  Line Status
     *  Line Status_ Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\LineStatusCode $lineStatusCode
     * @return self
     */
    public function setLineStatusCode(?\Ubl21\CommonBasicComponents\LineStatusCode $lineStatusCode = null)
    {
        $this->lineStatusCode = $lineStatusCode;
        return $this;
    }

    /**
     * Gets as quantity
     *
     * BBIE
     *  Line Item. Quantity
     *  The quantity of items associated with this line item.
     *  0..1
     *  Line Item
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
     *  Line Item. Quantity
     *  The quantity of items associated with this line item.
     *  0..1
     *  Line Item
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\Quantity $quantity
     * @return self
     */
    public function setQuantity(?\Ubl21\CommonBasicComponents\Quantity $quantity = null)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Gets as lineExtensionAmount
     *
     * BBIE
     *  Line Item. Line Extension Amount. Amount
     *  The total amount for this line item, including allowance charges but net of taxes.
     *  0..1
     *  Line Item
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\LineExtensionAmount
     */
    public function getLineExtensionAmount()
    {
        return $this->lineExtensionAmount;
    }

    /**
     * Sets a new lineExtensionAmount
     *
     * BBIE
     *  Line Item. Line Extension Amount. Amount
     *  The total amount for this line item, including allowance charges but net of taxes.
     *  0..1
     *  Line Item
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\LineExtensionAmount $lineExtensionAmount
     * @return self
     */
    public function setLineExtensionAmount(?\Ubl21\CommonBasicComponents\LineExtensionAmount $lineExtensionAmount = null)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /**
     * Gets as totalTaxAmount
     *
     * BBIE
     *  Line Item. Total_ Tax Amount. Amount
     *  The total tax amount for this line item.
     *  0..1
     *  Line Item
     *  Total
     *  Tax Amount
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\TotalTaxAmount
     */
    public function getTotalTaxAmount()
    {
        return $this->totalTaxAmount;
    }

    /**
     * Sets a new totalTaxAmount
     *
     * BBIE
     *  Line Item. Total_ Tax Amount. Amount
     *  The total tax amount for this line item.
     *  0..1
     *  Line Item
     *  Total
     *  Tax Amount
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\TotalTaxAmount $totalTaxAmount
     * @return self
     */
    public function setTotalTaxAmount(?\Ubl21\CommonBasicComponents\TotalTaxAmount $totalTaxAmount = null)
    {
        $this->totalTaxAmount = $totalTaxAmount;
        return $this;
    }

    /**
     * Gets as minimumQuantity
     *
     * BBIE
     *  Line Item. Minimum_ Quantity. Quantity
     *  The minimum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Minimum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\MinimumQuantity
     */
    public function getMinimumQuantity()
    {
        return $this->minimumQuantity;
    }

    /**
     * Sets a new minimumQuantity
     *
     * BBIE
     *  Line Item. Minimum_ Quantity. Quantity
     *  The minimum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Minimum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\MinimumQuantity $minimumQuantity
     * @return self
     */
    public function setMinimumQuantity(?\Ubl21\CommonBasicComponents\MinimumQuantity $minimumQuantity = null)
    {
        $this->minimumQuantity = $minimumQuantity;
        return $this;
    }

    /**
     * Gets as maximumQuantity
     *
     * BBIE
     *  Line Item. Maximum_ Quantity. Quantity
     *  The maximum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Maximum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\MaximumQuantity
     */
    public function getMaximumQuantity()
    {
        return $this->maximumQuantity;
    }

    /**
     * Sets a new maximumQuantity
     *
     * BBIE
     *  Line Item. Maximum_ Quantity. Quantity
     *  The maximum quantity of the item associated with this line.
     *  0..1
     *  Line Item
     *  Maximum
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\MaximumQuantity $maximumQuantity
     * @return self
     */
    public function setMaximumQuantity(?\Ubl21\CommonBasicComponents\MaximumQuantity $maximumQuantity = null)
    {
        $this->maximumQuantity = $maximumQuantity;
        return $this;
    }

    /**
     * Gets as minimumBackorderQuantity
     *
     * BBIE
     *  Line Item. Minimum_ Backorder. Quantity
     *  The minimum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Minimum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\MinimumBackorderQuantity
     */
    public function getMinimumBackorderQuantity()
    {
        return $this->minimumBackorderQuantity;
    }

    /**
     * Sets a new minimumBackorderQuantity
     *
     * BBIE
     *  Line Item. Minimum_ Backorder. Quantity
     *  The minimum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Minimum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\MinimumBackorderQuantity $minimumBackorderQuantity
     * @return self
     */
    public function setMinimumBackorderQuantity(?\Ubl21\CommonBasicComponents\MinimumBackorderQuantity $minimumBackorderQuantity = null)
    {
        $this->minimumBackorderQuantity = $minimumBackorderQuantity;
        return $this;
    }

    /**
     * Gets as maximumBackorderQuantity
     *
     * BBIE
     *  Line Item. Maximum_ Backorder. Quantity
     *  The maximum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Maximum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\MaximumBackorderQuantity
     */
    public function getMaximumBackorderQuantity()
    {
        return $this->maximumBackorderQuantity;
    }

    /**
     * Sets a new maximumBackorderQuantity
     *
     * BBIE
     *  Line Item. Maximum_ Backorder. Quantity
     *  The maximum back order quantity of the item associated with this line (where back order is allowed).
     *  0..1
     *  Line Item
     *  Maximum
     *  Backorder
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\MaximumBackorderQuantity $maximumBackorderQuantity
     * @return self
     */
    public function setMaximumBackorderQuantity(?\Ubl21\CommonBasicComponents\MaximumBackorderQuantity $maximumBackorderQuantity = null)
    {
        $this->maximumBackorderQuantity = $maximumBackorderQuantity;
        return $this;
    }

    /**
     * Gets as inspectionMethodCode
     *
     * BBIE
     *  Line Item. Inspection Method Code. Code
     *  A code signifying the inspection requirements for the item associated with this line item.
     *  0..1
     *  Line Item
     *  Inspection Method Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\InspectionMethodCode
     */
    public function getInspectionMethodCode()
    {
        return $this->inspectionMethodCode;
    }

    /**
     * Sets a new inspectionMethodCode
     *
     * BBIE
     *  Line Item. Inspection Method Code. Code
     *  A code signifying the inspection requirements for the item associated with this line item.
     *  0..1
     *  Line Item
     *  Inspection Method Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\InspectionMethodCode $inspectionMethodCode
     * @return self
     */
    public function setInspectionMethodCode(?\Ubl21\CommonBasicComponents\InspectionMethodCode $inspectionMethodCode = null)
    {
        $this->inspectionMethodCode = $inspectionMethodCode;
        return $this;
    }

    /**
     * Gets as partialDeliveryIndicator
     *
     * BBIE
     *  Line Item. Partial Delivery Indicator. Indicator
     *  An indicator that a partial delivery is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Partial Delivery Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getPartialDeliveryIndicator()
    {
        return $this->partialDeliveryIndicator;
    }

    /**
     * Sets a new partialDeliveryIndicator
     *
     * BBIE
     *  Line Item. Partial Delivery Indicator. Indicator
     *  An indicator that a partial delivery is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Partial Delivery Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $partialDeliveryIndicator
     * @return self
     */
    public function setPartialDeliveryIndicator($partialDeliveryIndicator)
    {
        $this->partialDeliveryIndicator = $partialDeliveryIndicator;
        return $this;
    }

    /**
     * Gets as backOrderAllowedIndicator
     *
     * BBIE
     *  Line Item. Back Order Allowed Indicator. Indicator
     *  An indicator that back order is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Back Order Allowed Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getBackOrderAllowedIndicator()
    {
        return $this->backOrderAllowedIndicator;
    }

    /**
     * Sets a new backOrderAllowedIndicator
     *
     * BBIE
     *  Line Item. Back Order Allowed Indicator. Indicator
     *  An indicator that back order is allowed (true) or not (false).
     *  0..1
     *  Line Item
     *  Back Order Allowed Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $backOrderAllowedIndicator
     * @return self
     */
    public function setBackOrderAllowedIndicator($backOrderAllowedIndicator)
    {
        $this->backOrderAllowedIndicator = $backOrderAllowedIndicator;
        return $this;
    }

    /**
     * Gets as accountingCostCode
     *
     * BBIE
     *  Line Item. Accounting Cost Code. Code
     *  The buyer's accounting cost centre for this line item, expressed as a code.
     *  0..1
     *  Line Item
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\AccountingCostCode
     */
    public function getAccountingCostCode()
    {
        return $this->accountingCostCode;
    }

    /**
     * Sets a new accountingCostCode
     *
     * BBIE
     *  Line Item. Accounting Cost Code. Code
     *  The buyer's accounting cost centre for this line item, expressed as a code.
     *  0..1
     *  Line Item
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\AccountingCostCode $accountingCostCode
     * @return self
     */
    public function setAccountingCostCode(?\Ubl21\CommonBasicComponents\AccountingCostCode $accountingCostCode = null)
    {
        $this->accountingCostCode = $accountingCostCode;
        return $this;
    }

    /**
     * Gets as accountingCost
     *
     * BBIE
     *  Line Item. Accounting Cost. Text
     *  The buyer's accounting cost centre for this line item, expressed as text.
     *  0..1
     *  Line Item
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\AccountingCost
     */
    public function getAccountingCost()
    {
        return $this->accountingCost;
    }

    /**
     * Sets a new accountingCost
     *
     * BBIE
     *  Line Item. Accounting Cost. Text
     *  The buyer's accounting cost centre for this line item, expressed as text.
     *  0..1
     *  Line Item
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\AccountingCost $accountingCost
     * @return self
     */
    public function setAccountingCost(?\Ubl21\CommonBasicComponents\AccountingCost $accountingCost = null)
    {
        $this->accountingCost = $accountingCost;
        return $this;
    }

    /**
     * Adds as warrantyInformation
     *
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\WarrantyInformation $warrantyInformation
     */
    public function addToWarrantyInformation(\Ubl21\CommonBasicComponents\WarrantyInformation $warrantyInformation)
    {
        $this->warrantyInformation[] = $warrantyInformation;
        return $this;
    }

    /**
     * isset warrantyInformation
     *
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @param int|string $index
     * @return bool
     */
    public function issetWarrantyInformation($index)
    {
        return isset($this->warrantyInformation[$index]);
    }

    /**
     * unset warrantyInformation
     *
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @param int|string $index
     * @return void
     */
    public function unsetWarrantyInformation($index)
    {
        unset($this->warrantyInformation[$index]);
    }

    /**
     * Gets as warrantyInformation
     *
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @return \Ubl21\CommonBasicComponents\WarrantyInformation[]
     */
    public function getWarrantyInformation()
    {
        return $this->warrantyInformation;
    }

    /**
     * Sets a new warrantyInformation
     *
     * BBIE
     *  Line Item. Warranty_ Information. Text
     *  Text describing a warranty (provided by WarrantyParty) for the good or service described in this line item.
     *  0..n
     *  Line Item
     *  Warranty
     *  Information
     *  Text
     *  Text. Type
     *  Unless specified otherwise and in addition to any rights the Customer may have under statute, Dell warrants to the Customer that Dell branded Products (excluding third party products and software), will be free from defects in materials and workmanship affecting normal use for a period of one year from invoice date ( Standard Warranty ).
     *
     * @param \Ubl21\CommonBasicComponents\WarrantyInformation[] $warrantyInformation
     * @return self
     */
    public function setWarrantyInformation(?array $warrantyInformation = null)
    {
        $this->warrantyInformation = $warrantyInformation;
        return $this;
    }

    /**
     * Adds as delivery
     *
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\Delivery $delivery
     */
    public function addToDelivery(\Ubl21\CommonAggregateComponents\Delivery $delivery)
    {
        $this->delivery[] = $delivery;
        return $this;
    }

    /**
     * isset delivery
     *
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDelivery($index)
    {
        return isset($this->delivery[$index]);
    }

    /**
     * unset delivery
     *
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDelivery($index)
    {
        unset($this->delivery[$index]);
    }

    /**
     * Gets as delivery
     *
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @return \Ubl21\CommonAggregateComponents\Delivery[]
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Sets a new delivery
     *
     * ASBIE
     *  Line Item. Delivery
     *  A delivery associated with this line item.
     *  0..n
     *  Line Item
     *  Delivery
     *  Delivery
     *  Delivery
     *
     * @param \Ubl21\CommonAggregateComponents\Delivery[] $delivery
     * @return self
     */
    public function setDelivery(?array $delivery = null)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * Gets as deliveryTerms
     *
     * ASBIE
     *  Line Item. Delivery Terms
     *  Terms and conditions of the delivery associated with this line item.
     *  0..1
     *  Line Item
     *  Delivery Terms
     *  Delivery Terms
     *  Delivery Terms
     *
     * @return \Ubl21\CommonAggregateComponents\DeliveryTerms
     */
    public function getDeliveryTerms()
    {
        return $this->deliveryTerms;
    }

    /**
     * Sets a new deliveryTerms
     *
     * ASBIE
     *  Line Item. Delivery Terms
     *  Terms and conditions of the delivery associated with this line item.
     *  0..1
     *  Line Item
     *  Delivery Terms
     *  Delivery Terms
     *  Delivery Terms
     *
     * @param \Ubl21\CommonAggregateComponents\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function setDeliveryTerms(?\Ubl21\CommonAggregateComponents\DeliveryTerms $deliveryTerms = null)
    {
        $this->deliveryTerms = $deliveryTerms;
        return $this;
    }

    /**
     * Gets as originatorParty
     *
     * ASBIE
     *  Line Item. Originator_ Party. Party
     *  The party who originated the Order associated with this line item.
     *  0..1
     *  Line Item
     *  Originator
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\OriginatorParty
     */
    public function getOriginatorParty()
    {
        return $this->originatorParty;
    }

    /**
     * Sets a new originatorParty
     *
     * ASBIE
     *  Line Item. Originator_ Party. Party
     *  The party who originated the Order associated with this line item.
     *  0..1
     *  Line Item
     *  Originator
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\OriginatorParty $originatorParty
     * @return self
     */
    public function setOriginatorParty(?\Ubl21\CommonAggregateComponents\OriginatorParty $originatorParty = null)
    {
        $this->originatorParty = $originatorParty;
        return $this;
    }

    /**
     * Adds as orderedShipment
     *
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\OrderedShipment $orderedShipment
     */
    public function addToOrderedShipment(\Ubl21\CommonAggregateComponents\OrderedShipment $orderedShipment)
    {
        $this->orderedShipment[] = $orderedShipment;
        return $this;
    }

    /**
     * isset orderedShipment
     *
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOrderedShipment($index)
    {
        return isset($this->orderedShipment[$index]);
    }

    /**
     * unset orderedShipment
     *
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOrderedShipment($index)
    {
        unset($this->orderedShipment[$index]);
    }

    /**
     * Gets as orderedShipment
     *
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @return \Ubl21\CommonAggregateComponents\OrderedShipment[]
     */
    public function getOrderedShipment()
    {
        return $this->orderedShipment;
    }

    /**
     * Sets a new orderedShipment
     *
     * ASBIE
     *  Line Item. Ordered Shipment
     *  An ordered shipment associated with this line item.
     *  0..n
     *  Line Item
     *  Ordered Shipment
     *  Ordered Shipment
     *  Ordered Shipment
     *
     * @param \Ubl21\CommonAggregateComponents\OrderedShipment[] $orderedShipment
     * @return self
     */
    public function setOrderedShipment(?array $orderedShipment = null)
    {
        $this->orderedShipment = $orderedShipment;
        return $this;
    }

    /**
     * Gets as pricingReference
     *
     * ASBIE
     *  Line Item. Pricing Reference
     *  A reference to pricing and item location information associated with this line item.
     *  0..1
     *  Line Item
     *  Pricing Reference
     *  Pricing Reference
     *  Pricing Reference
     *
     * @return \Ubl21\CommonAggregateComponents\PricingReference
     */
    public function getPricingReference()
    {
        return $this->pricingReference;
    }

    /**
     * Sets a new pricingReference
     *
     * ASBIE
     *  Line Item. Pricing Reference
     *  A reference to pricing and item location information associated with this line item.
     *  0..1
     *  Line Item
     *  Pricing Reference
     *  Pricing Reference
     *  Pricing Reference
     *
     * @param \Ubl21\CommonAggregateComponents\PricingReference $pricingReference
     * @return self
     */
    public function setPricingReference(?\Ubl21\CommonAggregateComponents\PricingReference $pricingReference = null)
    {
        $this->pricingReference = $pricingReference;
        return $this;
    }

    /**
     * Adds as allowanceCharge
     *
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\AllowanceCharge $allowanceCharge
     */
    public function addToAllowanceCharge(\Ubl21\CommonAggregateComponents\AllowanceCharge $allowanceCharge)
    {
        $this->allowanceCharge[] = $allowanceCharge;
        return $this;
    }

    /**
     * isset allowanceCharge
     *
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAllowanceCharge($index)
    {
        return isset($this->allowanceCharge[$index]);
    }

    /**
     * unset allowanceCharge
     *
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAllowanceCharge($index)
    {
        unset($this->allowanceCharge[$index]);
    }

    /**
     * Gets as allowanceCharge
     *
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @return \Ubl21\CommonAggregateComponents\AllowanceCharge[]
     */
    public function getAllowanceCharge()
    {
        return $this->allowanceCharge;
    }

    /**
     * Sets a new allowanceCharge
     *
     * ASBIE
     *  Line Item. Allowance Charge
     *  An allowance or charge associated with this line item.
     *  0..n
     *  Line Item
     *  Allowance Charge
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param \Ubl21\CommonAggregateComponents\AllowanceCharge[] $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(?array $allowanceCharge = null)
    {
        $this->allowanceCharge = $allowanceCharge;
        return $this;
    }

    /**
     * Gets as price
     *
     * ASBIE
     *  Line Item. Price
     *  The price of the item of trade associated with this line item.
     *  0..1
     *  Line Item
     *  Price
     *  Price
     *  Price
     *
     * @return \Ubl21\CommonAggregateComponents\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * ASBIE
     *  Line Item. Price
     *  The price of the item of trade associated with this line item.
     *  0..1
     *  Line Item
     *  Price
     *  Price
     *  Price
     *
     * @param \Ubl21\CommonAggregateComponents\Price $price
     * @return self
     */
    public function setPrice(?\Ubl21\CommonAggregateComponents\Price $price = null)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Gets as item
     *
     * ASBIE
     *  Line Item. Item
     *  The item of trade associated with this line item.
     *  1
     *  Line Item
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
     *  Line Item. Item
     *  The item of trade associated with this line item.
     *  1
     *  Line Item
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

    /**
     * Adds as subLineItem
     *
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\SubLineItem $subLineItem
     */
    public function addToSubLineItem(\Ubl21\CommonAggregateComponents\SubLineItem $subLineItem)
    {
        $this->subLineItem[] = $subLineItem;
        return $this;
    }

    /**
     * isset subLineItem
     *
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSubLineItem($index)
    {
        return isset($this->subLineItem[$index]);
    }

    /**
     * unset subLineItem
     *
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSubLineItem($index)
    {
        unset($this->subLineItem[$index]);
    }

    /**
     * Gets as subLineItem
     *
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @return \Ubl21\CommonAggregateComponents\SubLineItem[]
     */
    public function getSubLineItem()
    {
        return $this->subLineItem;
    }

    /**
     * Sets a new subLineItem
     *
     * ASBIE
     *  Line Item. Sub_ Line Item. Line Item
     *  The subsidiary line items that constitute the main line item, such as in a bill of materials.
     *  0..n
     *  Line Item
     *  Sub
     *  Line Item
     *  Line Item
     *  Line Item
     *
     * @param \Ubl21\CommonAggregateComponents\SubLineItem[] $subLineItem
     * @return self
     */
    public function setSubLineItem(?array $subLineItem = null)
    {
        $this->subLineItem = $subLineItem;
        return $this;
    }

    /**
     * Gets as warrantyValidityPeriod
     *
     * ASBIE
     *  Line Item. Warranty Validity_ Period. Period
     *  The period during which the warranty associated with this line item is valid.
     *  0..1
     *  Line Item
     *  Warranty Validity
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\WarrantyValidityPeriod
     */
    public function getWarrantyValidityPeriod()
    {
        return $this->warrantyValidityPeriod;
    }

    /**
     * Sets a new warrantyValidityPeriod
     *
     * ASBIE
     *  Line Item. Warranty Validity_ Period. Period
     *  The period during which the warranty associated with this line item is valid.
     *  0..1
     *  Line Item
     *  Warranty Validity
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\WarrantyValidityPeriod $warrantyValidityPeriod
     * @return self
     */
    public function setWarrantyValidityPeriod(?\Ubl21\CommonAggregateComponents\WarrantyValidityPeriod $warrantyValidityPeriod = null)
    {
        $this->warrantyValidityPeriod = $warrantyValidityPeriod;
        return $this;
    }

    /**
     * Gets as warrantyParty
     *
     * ASBIE
     *  Line Item. Warranty_ Party. Party
     *  The party responsible for any warranty associated with this line item.
     *  0..1
     *  Line Item
     *  Warranty
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\WarrantyParty
     */
    public function getWarrantyParty()
    {
        return $this->warrantyParty;
    }

    /**
     * Sets a new warrantyParty
     *
     * ASBIE
     *  Line Item. Warranty_ Party. Party
     *  The party responsible for any warranty associated with this line item.
     *  0..1
     *  Line Item
     *  Warranty
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\WarrantyParty $warrantyParty
     * @return self
     */
    public function setWarrantyParty(?\Ubl21\CommonAggregateComponents\WarrantyParty $warrantyParty = null)
    {
        $this->warrantyParty = $warrantyParty;
        return $this;
    }

    /**
     * Adds as taxTotal
     *
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\TaxTotal $taxTotal
     */
    public function addToTaxTotal(\Ubl21\CommonAggregateComponents\TaxTotal $taxTotal)
    {
        $this->taxTotal[] = $taxTotal;
        return $this;
    }

    /**
     * isset taxTotal
     *
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTaxTotal($index)
    {
        return isset($this->taxTotal[$index]);
    }

    /**
     * unset taxTotal
     *
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTaxTotal($index)
    {
        unset($this->taxTotal[$index]);
    }

    /**
     * Gets as taxTotal
     *
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @return \Ubl21\CommonAggregateComponents\TaxTotal[]
     */
    public function getTaxTotal()
    {
        return $this->taxTotal;
    }

    /**
     * Sets a new taxTotal
     *
     * ASBIE
     *  Line Item. Tax Total
     *  A total amount of taxes of a particular kind applicable to this item.
     *  0..n
     *  Line Item
     *  Tax Total
     *  Tax Total
     *  Tax Total
     *
     * @param \Ubl21\CommonAggregateComponents\TaxTotal[] $taxTotal
     * @return self
     */
    public function setTaxTotal(?array $taxTotal = null)
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    /**
     * Gets as itemPriceExtension
     *
     * ASBIE
     *  Line Item. Item_ Price Extension. Price Extension
     *  The price extension, calculated by multiplying the price per unit by the quantity of items.
     *  0..1
     *  Line Item
     *  Item
     *  Price Extension
     *  Price Extension
     *  Price Extension
     *
     * @return \Ubl21\CommonAggregateComponents\ItemPriceExtension
     */
    public function getItemPriceExtension()
    {
        return $this->itemPriceExtension;
    }

    /**
     * Sets a new itemPriceExtension
     *
     * ASBIE
     *  Line Item. Item_ Price Extension. Price Extension
     *  The price extension, calculated by multiplying the price per unit by the quantity of items.
     *  0..1
     *  Line Item
     *  Item
     *  Price Extension
     *  Price Extension
     *  Price Extension
     *
     * @param \Ubl21\CommonAggregateComponents\ItemPriceExtension $itemPriceExtension
     * @return self
     */
    public function setItemPriceExtension(?\Ubl21\CommonAggregateComponents\ItemPriceExtension $itemPriceExtension = null)
    {
        $this->itemPriceExtension = $itemPriceExtension;
        return $this;
    }

    /**
     * Adds as lineReference
     *
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\LineReference $lineReference
     */
    public function addToLineReference(\Ubl21\CommonAggregateComponents\LineReference $lineReference)
    {
        $this->lineReference[] = $lineReference;
        return $this;
    }

    /**
     * isset lineReference
     *
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLineReference($index)
    {
        return isset($this->lineReference[$index]);
    }

    /**
     * unset lineReference
     *
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLineReference($index)
    {
        unset($this->lineReference[$index]);
    }

    /**
     * Gets as lineReference
     *
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @return \Ubl21\CommonAggregateComponents\LineReference[]
     */
    public function getLineReference()
    {
        return $this->lineReference;
    }

    /**
     * Sets a new lineReference
     *
     * ASBIE
     *  Line Item. Line Reference
     *  A reference to a line in a document associated with this line item.
     *  0..n
     *  Line Item
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param \Ubl21\CommonAggregateComponents\LineReference[] $lineReference
     * @return self
     */
    public function setLineReference(?array $lineReference = null)
    {
        $this->lineReference = $lineReference;
        return $this;
    }
}

