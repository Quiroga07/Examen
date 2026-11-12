<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing DutyType
 *
 * ABIE
 *  Duty. Details
 *  The charging rate used for both call charging and time dependent charging
 *  Duty
 * XSD Type: DutyType
 */
class DutyType
{
    /**
     * BBIE
     *  Duty. Amount
     *  The amount of this duty.
     *  1
     *  Duty
     *  Amount
     *  Amount
     *  Amount. Type
     *  88.23
     *
     * @var \Ubl21\CommonBasicComponents\Amount $amount
     */
    private $amount = null;

    /**
     * BBIE
     *  Duty. Duty. Text
     *  Text describing this duty.
     *  0..1
     *  Duty
     *  Duty
     *  Text
     *  Text. Type
     *  ConnectionFee
     *
     * @var \Ubl21\CommonBasicComponents\Duty $duty
     */
    private $duty = null;

    /**
     * BBIE
     *  Duty. Duty Code. Code
     *  The type of this charge rate, expressed as a code.
     *  0..1
     *  Duty
     *  Duty Code
     *  Code
     *  Code. Type
     *  ConnectionFee
     *
     * @var \Ubl21\CommonBasicComponents\DutyCode $dutyCode
     */
    private $dutyCode = null;

    /**
     * ASBIE
     *  Duty. Tax Category
     *  The tax category applicable to this duty.
     *  0..1
     *  Duty
     *  Tax Category
     *  Tax Category
     *  Tax Category
     *
     * @var \Ubl21\CommonAggregateComponents\TaxCategory $taxCategory
     */
    private $taxCategory = null;

    /**
     * Gets as amount
     *
     * BBIE
     *  Duty. Amount
     *  The amount of this duty.
     *  1
     *  Duty
     *  Amount
     *  Amount
     *  Amount. Type
     *  88.23
     *
     * @return \Ubl21\CommonBasicComponents\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets a new amount
     *
     * BBIE
     *  Duty. Amount
     *  The amount of this duty.
     *  1
     *  Duty
     *  Amount
     *  Amount
     *  Amount. Type
     *  88.23
     *
     * @param \Ubl21\CommonBasicComponents\Amount $amount
     * @return self
     */
    public function setAmount(\Ubl21\CommonBasicComponents\Amount $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as duty
     *
     * BBIE
     *  Duty. Duty. Text
     *  Text describing this duty.
     *  0..1
     *  Duty
     *  Duty
     *  Text
     *  Text. Type
     *  ConnectionFee
     *
     * @return \Ubl21\CommonBasicComponents\Duty
     */
    public function getDuty()
    {
        return $this->duty;
    }

    /**
     * Sets a new duty
     *
     * BBIE
     *  Duty. Duty. Text
     *  Text describing this duty.
     *  0..1
     *  Duty
     *  Duty
     *  Text
     *  Text. Type
     *  ConnectionFee
     *
     * @param \Ubl21\CommonBasicComponents\Duty $duty
     * @return self
     */
    public function setDuty(?\Ubl21\CommonBasicComponents\Duty $duty = null)
    {
        $this->duty = $duty;
        return $this;
    }

    /**
     * Gets as dutyCode
     *
     * BBIE
     *  Duty. Duty Code. Code
     *  The type of this charge rate, expressed as a code.
     *  0..1
     *  Duty
     *  Duty Code
     *  Code
     *  Code. Type
     *  ConnectionFee
     *
     * @return \Ubl21\CommonBasicComponents\DutyCode
     */
    public function getDutyCode()
    {
        return $this->dutyCode;
    }

    /**
     * Sets a new dutyCode
     *
     * BBIE
     *  Duty. Duty Code. Code
     *  The type of this charge rate, expressed as a code.
     *  0..1
     *  Duty
     *  Duty Code
     *  Code
     *  Code. Type
     *  ConnectionFee
     *
     * @param \Ubl21\CommonBasicComponents\DutyCode $dutyCode
     * @return self
     */
    public function setDutyCode(?\Ubl21\CommonBasicComponents\DutyCode $dutyCode = null)
    {
        $this->dutyCode = $dutyCode;
        return $this;
    }

    /**
     * Gets as taxCategory
     *
     * ASBIE
     *  Duty. Tax Category
     *  The tax category applicable to this duty.
     *  0..1
     *  Duty
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
     *  Duty. Tax Category
     *  The tax category applicable to this duty.
     *  0..1
     *  Duty
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
}

