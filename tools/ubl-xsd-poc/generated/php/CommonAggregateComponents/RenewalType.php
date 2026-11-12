<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing RenewalType
 *
 * ABIE
 *  Renewal. Details
 *  A class to describe the renewal of a commercial arrangement, such as a contract or licence fee.
 *  Renewal
 * XSD Type: RenewalType
 */
class RenewalType
{
    /**
     * BBIE
     *  Renewal. Amount
     *  The monetary amount of this renewal.
     *  0..1
     *  Renewal
     *  Amount
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\Amount $amount
     */
    private $amount = null;

    /**
     * ASBIE
     *  Renewal. Period
     *  The period for which the arrangement is now valid
     *  0..1
     *  Renewal
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\Period $period
     */
    private $period = null;

    /**
     * Gets as amount
     *
     * BBIE
     *  Renewal. Amount
     *  The monetary amount of this renewal.
     *  0..1
     *  Renewal
     *  Amount
     *  Amount
     *  Amount. Type
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
     *  Renewal. Amount
     *  The monetary amount of this renewal.
     *  0..1
     *  Renewal
     *  Amount
     *  Amount
     *  Amount. Type
     *
     * @param \Ubl21\CommonBasicComponents\Amount $amount
     * @return self
     */
    public function setAmount(?\Ubl21\CommonBasicComponents\Amount $amount = null)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Gets as period
     *
     * ASBIE
     *  Renewal. Period
     *  The period for which the arrangement is now valid
     *  0..1
     *  Renewal
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
     *  Renewal. Period
     *  The period for which the arrangement is now valid
     *  0..1
     *  Renewal
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\Period $period
     * @return self
     */
    public function setPeriod(?\Ubl21\CommonAggregateComponents\Period $period = null)
    {
        $this->period = $period;
        return $this;
    }
}

