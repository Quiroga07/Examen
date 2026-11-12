<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ConsumptionReportReferenceType
 *
 * ABIE
 *  Consumption Report Reference. Details
 *  A class to define a reference to an earlier consumption report (e.g., last year's consumption).
 *  Consumption Report Reference
 * XSD Type: ConsumptionReportReferenceType
 */
class ConsumptionReportReferenceType
{
    /**
     * BBIE
     *  Consumption Report Reference. Consumption_ Report Identifier. Identifier
     *  An identifier for the referenced consumption report.
     *  1
     *  Consumption Report Reference
     *  Consumption
     *  Report Identifier
     *  Identifier
     *  Identifier. Type
     *  n/a
     *
     * @var \Ubl21\CommonBasicComponents\ConsumptionReportID $consumptionReportID
     */
    private $consumptionReportID = null;

    /**
     * BBIE
     *  Consumption Report Reference. Consumption Type. Text
     *  The reported consumption type, expressed as text.
     *  0..1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Consumption Type Code. Code
     *  The reported consumption type, expressed as a code.
     *  0..1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Total_ Consumed Quantity. Quantity
     *  The total quantity consumed during the period of the referenced report.
     *  1
     *  Consumption Report Reference
     *  Total
     *  Consumed Quantity
     *  Quantity
     *  Quantity. Type
     *  20479.00
     *
     * @var \Ubl21\CommonBasicComponents\TotalConsumedQuantity $totalConsumedQuantity
     */
    private $totalConsumedQuantity = null;

    /**
     * ASBIE
     *  Consumption Report Reference. Period
     *  The period of consumption covered by the referenced report.
     *  1
     *  Consumption Report Reference
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\Period $period
     */
    private $period = null;

    /**
     * Gets as consumptionReportID
     *
     * BBIE
     *  Consumption Report Reference. Consumption_ Report Identifier. Identifier
     *  An identifier for the referenced consumption report.
     *  1
     *  Consumption Report Reference
     *  Consumption
     *  Report Identifier
     *  Identifier
     *  Identifier. Type
     *  n/a
     *
     * @return \Ubl21\CommonBasicComponents\ConsumptionReportID
     */
    public function getConsumptionReportID()
    {
        return $this->consumptionReportID;
    }

    /**
     * Sets a new consumptionReportID
     *
     * BBIE
     *  Consumption Report Reference. Consumption_ Report Identifier. Identifier
     *  An identifier for the referenced consumption report.
     *  1
     *  Consumption Report Reference
     *  Consumption
     *  Report Identifier
     *  Identifier
     *  Identifier. Type
     *  n/a
     *
     * @param \Ubl21\CommonBasicComponents\ConsumptionReportID $consumptionReportID
     * @return self
     */
    public function setConsumptionReportID(\Ubl21\CommonBasicComponents\ConsumptionReportID $consumptionReportID)
    {
        $this->consumptionReportID = $consumptionReportID;
        return $this;
    }

    /**
     * Gets as consumptionType
     *
     * BBIE
     *  Consumption Report Reference. Consumption Type. Text
     *  The reported consumption type, expressed as text.
     *  0..1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Consumption Type. Text
     *  The reported consumption type, expressed as text.
     *  0..1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Consumption Type Code. Code
     *  The reported consumption type, expressed as a code.
     *  0..1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Consumption Type Code. Code
     *  The reported consumption type, expressed as a code.
     *  0..1
     *  Consumption Report Reference
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
     * Gets as totalConsumedQuantity
     *
     * BBIE
     *  Consumption Report Reference. Total_ Consumed Quantity. Quantity
     *  The total quantity consumed during the period of the referenced report.
     *  1
     *  Consumption Report Reference
     *  Total
     *  Consumed Quantity
     *  Quantity
     *  Quantity. Type
     *  20479.00
     *
     * @return \Ubl21\CommonBasicComponents\TotalConsumedQuantity
     */
    public function getTotalConsumedQuantity()
    {
        return $this->totalConsumedQuantity;
    }

    /**
     * Sets a new totalConsumedQuantity
     *
     * BBIE
     *  Consumption Report Reference. Total_ Consumed Quantity. Quantity
     *  The total quantity consumed during the period of the referenced report.
     *  1
     *  Consumption Report Reference
     *  Total
     *  Consumed Quantity
     *  Quantity
     *  Quantity. Type
     *  20479.00
     *
     * @param \Ubl21\CommonBasicComponents\TotalConsumedQuantity $totalConsumedQuantity
     * @return self
     */
    public function setTotalConsumedQuantity(\Ubl21\CommonBasicComponents\TotalConsumedQuantity $totalConsumedQuantity)
    {
        $this->totalConsumedQuantity = $totalConsumedQuantity;
        return $this;
    }

    /**
     * Gets as period
     *
     * ASBIE
     *  Consumption Report Reference. Period
     *  The period of consumption covered by the referenced report.
     *  1
     *  Consumption Report Reference
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
     *  Consumption Report Reference. Period
     *  The period of consumption covered by the referenced report.
     *  1
     *  Consumption Report Reference
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\Period $period
     * @return self
     */
    public function setPeriod(\Ubl21\CommonAggregateComponents\Period $period)
    {
        $this->period = $period;
        return $this;
    }
}

