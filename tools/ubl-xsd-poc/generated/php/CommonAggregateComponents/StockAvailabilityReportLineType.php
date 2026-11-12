<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing StockAvailabilityReportLineType
 *
 * ABIE
 *  Stock Availability Report Line. Details
 *  A class to define a line in a Stock Availability Report describing the availability of an item of sale.
 *  Stock Availability Report Line
 * XSD Type: StockAvailabilityReportLineType
 */
class StockAvailabilityReportLineType
{
    /**
     * BBIE
     *  Stock Availability Report Line. Identifier
     *  An identifier for this stock availability line.
     *  1
     *  Stock Availability Report Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Quantity
     *  The quantity of the item currently in stock.
     *  1
     *  Stock Availability Report Line
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\Quantity $quantity
     */
    private $quantity = null;

    /**
     * BBIE
     *  Stock Availability Report Line. Value. Amount
     *  The monetary value of the quantity of the item currently in stock.
     *  0..1
     *  Stock Availability Report Line
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValueAmount $valueAmount
     */
    private $valueAmount = null;

    /**
     * BBIE
     *  Stock Availability Report Line. Availability Date. Date
     *  The date from which the item will be available. A date identical to or earlier than the IssueDate of the Stock Availability Report means that the item is available now
     *  0..1
     *  Stock Availability Report Line
     *  Availability Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $availabilityDate
     */
    private $availabilityDate = null;

    /**
     * BBIE
     *  Stock Availability Report Line. Availability Status Code. Code
     *  A code signifying the level of availability of the item.
     *  0..1
     *  Stock Availability Report Line
     *  Availability Status Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\AvailabilityStatusCode $availabilityStatusCode
     */
    private $availabilityStatusCode = null;

    /**
     * ASBIE
     *  Stock Availability Report Line. Item
     *  The item associated with this stock availability report line.
     *  1
     *  Stock Availability Report Line
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\Item $item
     */
    private $item = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Stock Availability Report Line. Identifier
     *  An identifier for this stock availability line.
     *  1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Identifier
     *  An identifier for this stock availability line.
     *  1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Quantity
     *  The quantity of the item currently in stock.
     *  1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Quantity
     *  The quantity of the item currently in stock.
     *  1
     *  Stock Availability Report Line
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
     * Gets as valueAmount
     *
     * BBIE
     *  Stock Availability Report Line. Value. Amount
     *  The monetary value of the quantity of the item currently in stock.
     *  0..1
     *  Stock Availability Report Line
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValueAmount
     */
    public function getValueAmount()
    {
        return $this->valueAmount;
    }

    /**
     * Sets a new valueAmount
     *
     * BBIE
     *  Stock Availability Report Line. Value. Amount
     *  The monetary value of the quantity of the item currently in stock.
     *  0..1
     *  Stock Availability Report Line
     *  Value
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValueAmount $valueAmount
     * @return self
     */
    public function setValueAmount(?\Ubl21\CommonBasicComponents\ValueAmount $valueAmount = null)
    {
        $this->valueAmount = $valueAmount;
        return $this;
    }

    /**
     * Gets as availabilityDate
     *
     * BBIE
     *  Stock Availability Report Line. Availability Date. Date
     *  The date from which the item will be available. A date identical to or earlier than the IssueDate of the Stock Availability Report means that the item is available now
     *  0..1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Availability Date. Date
     *  The date from which the item will be available. A date identical to or earlier than the IssueDate of the Stock Availability Report means that the item is available now
     *  0..1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Availability Status Code. Code
     *  A code signifying the level of availability of the item.
     *  0..1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Availability Status Code. Code
     *  A code signifying the level of availability of the item.
     *  0..1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Item
     *  The item associated with this stock availability report line.
     *  1
     *  Stock Availability Report Line
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
     *  Stock Availability Report Line. Item
     *  The item associated with this stock availability report line.
     *  1
     *  Stock Availability Report Line
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

