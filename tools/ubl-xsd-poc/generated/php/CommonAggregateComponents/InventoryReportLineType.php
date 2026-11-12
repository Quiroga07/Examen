<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing InventoryReportLineType
 *
 * ABIE
 *  Inventory Report Line. Details
 *  A class to define a line in an Inventory Report.
 *  Inventory Report Line
 * XSD Type: InventoryReportLineType
 */
class InventoryReportLineType
{
    /**
     * BBIE
     *  Inventory Report Line. Identifier
     *  An identifier for this inventory report line.
     *  1
     *  Inventory Report Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     *  Inventory Report Line. Quantity
     *  The quantity of the item reported that is currently in stock.
     *  1
     *  Inventory Report Line
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\Quantity $quantity
     */
    private $quantity = null;

    /**
     * BBIE
     *  Inventory Report Line. Inventory_ Value. Amount
     *  The value of the quantity of the item reported that is currently in stock.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\InventoryValueAmount $inventoryValueAmount
     */
    private $inventoryValueAmount = null;

    /**
     * BBIE
     *  Inventory Report Line. Availability Date. Date
     *  The date from which the goods will be available. If not present, the goods are available now.
     *  0..1
     *  Inventory Report Line
     *  Availability Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $availabilityDate
     */
    private $availabilityDate = null;

    /**
     * BBIE
     *  Inventory Report Line. Availability Status Code. Code
     *  A code signifying the item's level of availability.
     *  0..1
     *  Inventory Report Line
     *  Availability Status Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\AvailabilityStatusCode $availabilityStatusCode
     */
    private $availabilityStatusCode = null;

    /**
     * ASBIE
     *  Inventory Report Line. Item
     *  The item associated with this inventory report line.
     *  1
     *  Inventory Report Line
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\Item $item
     */
    private $item = null;

    /**
     * ASBIE
     *  Inventory Report Line. Inventory_ Location. Location
     *  The location of the reported quantity of goods.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Location
     *  Location
     *  Location
     *
     * @var \Ubl21\CommonAggregateComponents\InventoryLocation $inventoryLocation
     */
    private $inventoryLocation = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Inventory Report Line. Identifier
     *  An identifier for this inventory report line.
     *  1
     *  Inventory Report Line
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
     *  Inventory Report Line. Identifier
     *  An identifier for this inventory report line.
     *  1
     *  Inventory Report Line
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
     * Adds as note
     *
     * BBIE
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     *  Inventory Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Inventory Report Line
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
     * Gets as quantity
     *
     * BBIE
     *  Inventory Report Line. Quantity
     *  The quantity of the item reported that is currently in stock.
     *  1
     *  Inventory Report Line
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
     *  Inventory Report Line. Quantity
     *  The quantity of the item reported that is currently in stock.
     *  1
     *  Inventory Report Line
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
     * Gets as inventoryValueAmount
     *
     * BBIE
     *  Inventory Report Line. Inventory_ Value. Amount
     *  The value of the quantity of the item reported that is currently in stock.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\InventoryValueAmount
     */
    public function getInventoryValueAmount()
    {
        return $this->inventoryValueAmount;
    }

    /**
     * Sets a new inventoryValueAmount
     *
     * BBIE
     *  Inventory Report Line. Inventory_ Value. Amount
     *  The value of the quantity of the item reported that is currently in stock.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\InventoryValueAmount $inventoryValueAmount
     * @return self
     */
    public function setInventoryValueAmount(?\Ubl21\CommonBasicComponents\InventoryValueAmount $inventoryValueAmount = null)
    {
        $this->inventoryValueAmount = $inventoryValueAmount;
        return $this;
    }

    /**
     * Gets as availabilityDate
     *
     * BBIE
     *  Inventory Report Line. Availability Date. Date
     *  The date from which the goods will be available. If not present, the goods are available now.
     *  0..1
     *  Inventory Report Line
     *  Availability Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getAvailabilityDate()
    {
        return $this->availabilityDate;
    }

    /**
     * Sets a new availabilityDate
     *
     * BBIE
     *  Inventory Report Line. Availability Date. Date
     *  The date from which the goods will be available. If not present, the goods are available now.
     *  0..1
     *  Inventory Report Line
     *  Availability Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $availabilityDate
     * @return self
     */
    public function setAvailabilityDate(?\DateTime $availabilityDate = null)
    {
        $this->availabilityDate = $availabilityDate;
        return $this;
    }

    /**
     * Gets as availabilityStatusCode
     *
     * BBIE
     *  Inventory Report Line. Availability Status Code. Code
     *  A code signifying the item's level of availability.
     *  0..1
     *  Inventory Report Line
     *  Availability Status Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\AvailabilityStatusCode
     */
    public function getAvailabilityStatusCode()
    {
        return $this->availabilityStatusCode;
    }

    /**
     * Sets a new availabilityStatusCode
     *
     * BBIE
     *  Inventory Report Line. Availability Status Code. Code
     *  A code signifying the item's level of availability.
     *  0..1
     *  Inventory Report Line
     *  Availability Status Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\AvailabilityStatusCode $availabilityStatusCode
     * @return self
     */
    public function setAvailabilityStatusCode(?\Ubl21\CommonBasicComponents\AvailabilityStatusCode $availabilityStatusCode = null)
    {
        $this->availabilityStatusCode = $availabilityStatusCode;
        return $this;
    }

    /**
     * Gets as item
     *
     * ASBIE
     *  Inventory Report Line. Item
     *  The item associated with this inventory report line.
     *  1
     *  Inventory Report Line
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
     *  Inventory Report Line. Item
     *  The item associated with this inventory report line.
     *  1
     *  Inventory Report Line
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
     * Gets as inventoryLocation
     *
     * ASBIE
     *  Inventory Report Line. Inventory_ Location. Location
     *  The location of the reported quantity of goods.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Location
     *  Location
     *  Location
     *
     * @return \Ubl21\CommonAggregateComponents\InventoryLocation
     */
    public function getInventoryLocation()
    {
        return $this->inventoryLocation;
    }

    /**
     * Sets a new inventoryLocation
     *
     * ASBIE
     *  Inventory Report Line. Inventory_ Location. Location
     *  The location of the reported quantity of goods.
     *  0..1
     *  Inventory Report Line
     *  Inventory
     *  Location
     *  Location
     *  Location
     *
     * @param \Ubl21\CommonAggregateComponents\InventoryLocation $inventoryLocation
     * @return self
     */
    public function setInventoryLocation(?\Ubl21\CommonAggregateComponents\InventoryLocation $inventoryLocation = null)
    {
        $this->inventoryLocation = $inventoryLocation;
        return $this;
    }
}

