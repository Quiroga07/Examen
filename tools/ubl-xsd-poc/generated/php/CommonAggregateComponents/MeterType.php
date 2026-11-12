<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing MeterType
 *
 * ABIE
 *  Meter. Details
 *  A class to describe a meter and its readings.
 *  Meter
 * XSD Type: MeterType
 */
class MeterType
{
    /**
     * BBIE
     *  Meter. Meter Number. Text
     *  The meter number, expressed as text.
     *  0..1
     *  Meter
     *  Meter Number
     *  Text
     *  Text. Type
     *  61722x
     *
     * @var \Ubl21\CommonBasicComponents\MeterNumber $meterNumber
     */
    private $meterNumber = null;

    /**
     * BBIE
     *  Meter. Meter Name. Text
     *  The name of this meter, which serves as an identifier to distinguish a main meter from a submeter.
     *  0..1
     *  Meter
     *  Meter Name
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\MeterName $meterName
     */
    private $meterName = null;

    /**
     * BBIE
     *  Meter. Meter Constant. Text
     *  The factor by which readings of this meter must be multiplied to calculate consumption, expressed as text.
     *  0..1
     *  Meter
     *  Meter Constant
     *  Text
     *  Text. Type
     *  1.000
     *
     * @var \Ubl21\CommonBasicComponents\MeterConstant $meterConstant
     */
    private $meterConstant = null;

    /**
     * BBIE
     *  Meter. Meter Constant Code. Code
     *  A code signifying the formula to be used in applying the meter constant.
     *  0..1
     *  Meter
     *  Meter Constant Code
     *  Code
     *  Code. Type
     *  Factor
     *
     * @var \Ubl21\CommonBasicComponents\MeterConstantCode $meterConstantCode
     */
    private $meterConstantCode = null;

    /**
     * BBIE
     *  Meter. Total_ Delivered Quantity. Quantity
     *  The quantity delivered; the total quantity consumed as calculated from the meter readings.
     *  0..1
     *  Meter
     *  Total
     *  Delivered Quantity
     *  Quantity
     *  Quantity. Type
     *  5761.00
     *
     * @var \Ubl21\CommonBasicComponents\TotalDeliveredQuantity $totalDeliveredQuantity
     */
    private $totalDeliveredQuantity = null;

    /**
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @var \Ubl21\CommonAggregateComponents\MeterReading[] $meterReading
     */
    private $meterReading = [
        
    ];

    /**
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @var \Ubl21\CommonAggregateComponents\MeterProperty[] $meterProperty
     */
    private $meterProperty = [
        
    ];

    /**
     * Gets as meterNumber
     *
     * BBIE
     *  Meter. Meter Number. Text
     *  The meter number, expressed as text.
     *  0..1
     *  Meter
     *  Meter Number
     *  Text
     *  Text. Type
     *  61722x
     *
     * @return \Ubl21\CommonBasicComponents\MeterNumber
     */
    public function getMeterNumber()
    {
        return $this->meterNumber;
    }

    /**
     * Sets a new meterNumber
     *
     * BBIE
     *  Meter. Meter Number. Text
     *  The meter number, expressed as text.
     *  0..1
     *  Meter
     *  Meter Number
     *  Text
     *  Text. Type
     *  61722x
     *
     * @param \Ubl21\CommonBasicComponents\MeterNumber $meterNumber
     * @return self
     */
    public function setMeterNumber(?\Ubl21\CommonBasicComponents\MeterNumber $meterNumber = null)
    {
        $this->meterNumber = $meterNumber;
        return $this;
    }

    /**
     * Gets as meterName
     *
     * BBIE
     *  Meter. Meter Name. Text
     *  The name of this meter, which serves as an identifier to distinguish a main meter from a submeter.
     *  0..1
     *  Meter
     *  Meter Name
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\MeterName
     */
    public function getMeterName()
    {
        return $this->meterName;
    }

    /**
     * Sets a new meterName
     *
     * BBIE
     *  Meter. Meter Name. Text
     *  The name of this meter, which serves as an identifier to distinguish a main meter from a submeter.
     *  0..1
     *  Meter
     *  Meter Name
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\MeterName $meterName
     * @return self
     */
    public function setMeterName(?\Ubl21\CommonBasicComponents\MeterName $meterName = null)
    {
        $this->meterName = $meterName;
        return $this;
    }

    /**
     * Gets as meterConstant
     *
     * BBIE
     *  Meter. Meter Constant. Text
     *  The factor by which readings of this meter must be multiplied to calculate consumption, expressed as text.
     *  0..1
     *  Meter
     *  Meter Constant
     *  Text
     *  Text. Type
     *  1.000
     *
     * @return \Ubl21\CommonBasicComponents\MeterConstant
     */
    public function getMeterConstant()
    {
        return $this->meterConstant;
    }

    /**
     * Sets a new meterConstant
     *
     * BBIE
     *  Meter. Meter Constant. Text
     *  The factor by which readings of this meter must be multiplied to calculate consumption, expressed as text.
     *  0..1
     *  Meter
     *  Meter Constant
     *  Text
     *  Text. Type
     *  1.000
     *
     * @param \Ubl21\CommonBasicComponents\MeterConstant $meterConstant
     * @return self
     */
    public function setMeterConstant(?\Ubl21\CommonBasicComponents\MeterConstant $meterConstant = null)
    {
        $this->meterConstant = $meterConstant;
        return $this;
    }

    /**
     * Gets as meterConstantCode
     *
     * BBIE
     *  Meter. Meter Constant Code. Code
     *  A code signifying the formula to be used in applying the meter constant.
     *  0..1
     *  Meter
     *  Meter Constant Code
     *  Code
     *  Code. Type
     *  Factor
     *
     * @return \Ubl21\CommonBasicComponents\MeterConstantCode
     */
    public function getMeterConstantCode()
    {
        return $this->meterConstantCode;
    }

    /**
     * Sets a new meterConstantCode
     *
     * BBIE
     *  Meter. Meter Constant Code. Code
     *  A code signifying the formula to be used in applying the meter constant.
     *  0..1
     *  Meter
     *  Meter Constant Code
     *  Code
     *  Code. Type
     *  Factor
     *
     * @param \Ubl21\CommonBasicComponents\MeterConstantCode $meterConstantCode
     * @return self
     */
    public function setMeterConstantCode(?\Ubl21\CommonBasicComponents\MeterConstantCode $meterConstantCode = null)
    {
        $this->meterConstantCode = $meterConstantCode;
        return $this;
    }

    /**
     * Gets as totalDeliveredQuantity
     *
     * BBIE
     *  Meter. Total_ Delivered Quantity. Quantity
     *  The quantity delivered; the total quantity consumed as calculated from the meter readings.
     *  0..1
     *  Meter
     *  Total
     *  Delivered Quantity
     *  Quantity
     *  Quantity. Type
     *  5761.00
     *
     * @return \Ubl21\CommonBasicComponents\TotalDeliveredQuantity
     */
    public function getTotalDeliveredQuantity()
    {
        return $this->totalDeliveredQuantity;
    }

    /**
     * Sets a new totalDeliveredQuantity
     *
     * BBIE
     *  Meter. Total_ Delivered Quantity. Quantity
     *  The quantity delivered; the total quantity consumed as calculated from the meter readings.
     *  0..1
     *  Meter
     *  Total
     *  Delivered Quantity
     *  Quantity
     *  Quantity. Type
     *  5761.00
     *
     * @param \Ubl21\CommonBasicComponents\TotalDeliveredQuantity $totalDeliveredQuantity
     * @return self
     */
    public function setTotalDeliveredQuantity(?\Ubl21\CommonBasicComponents\TotalDeliveredQuantity $totalDeliveredQuantity = null)
    {
        $this->totalDeliveredQuantity = $totalDeliveredQuantity;
        return $this;
    }

    /**
     * Adds as meterReading
     *
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\MeterReading $meterReading
     */
    public function addToMeterReading(\Ubl21\CommonAggregateComponents\MeterReading $meterReading)
    {
        $this->meterReading[] = $meterReading;
        return $this;
    }

    /**
     * isset meterReading
     *
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @param int|string $index
     * @return bool
     */
    public function issetMeterReading($index)
    {
        return isset($this->meterReading[$index]);
    }

    /**
     * unset meterReading
     *
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @param int|string $index
     * @return void
     */
    public function unsetMeterReading($index)
    {
        unset($this->meterReading[$index]);
    }

    /**
     * Gets as meterReading
     *
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @return \Ubl21\CommonAggregateComponents\MeterReading[]
     */
    public function getMeterReading()
    {
        return $this->meterReading;
    }

    /**
     * Sets a new meterReading
     *
     * ASBIE
     *  Meter. Meter Reading
     *  A reading of this meter.
     *  0..n
     *  Meter
     *  Meter Reading
     *  Meter Reading
     *  Meter Reading
     *
     * @param \Ubl21\CommonAggregateComponents\MeterReading[] $meterReading
     * @return self
     */
    public function setMeterReading(?array $meterReading = null)
    {
        $this->meterReading = $meterReading;
        return $this;
    }

    /**
     * Adds as meterProperty
     *
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\MeterProperty $meterProperty
     */
    public function addToMeterProperty(\Ubl21\CommonAggregateComponents\MeterProperty $meterProperty)
    {
        $this->meterProperty[] = $meterProperty;
        return $this;
    }

    /**
     * isset meterProperty
     *
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @param int|string $index
     * @return bool
     */
    public function issetMeterProperty($index)
    {
        return isset($this->meterProperty[$index]);
    }

    /**
     * unset meterProperty
     *
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @param int|string $index
     * @return void
     */
    public function unsetMeterProperty($index)
    {
        unset($this->meterProperty[$index]);
    }

    /**
     * Gets as meterProperty
     *
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @return \Ubl21\CommonAggregateComponents\MeterProperty[]
     */
    public function getMeterProperty()
    {
        return $this->meterProperty;
    }

    /**
     * Sets a new meterProperty
     *
     * ASBIE
     *  Meter. Meter Property
     *  A property of this meter.
     *  0..n
     *  Meter
     *  Meter Property
     *  Meter Property
     *  Meter Property
     *
     * @param \Ubl21\CommonAggregateComponents\MeterProperty[] $meterProperty
     * @return self
     */
    public function setMeterProperty(?array $meterProperty = null)
    {
        $this->meterProperty = $meterProperty;
        return $this;
    }
}

