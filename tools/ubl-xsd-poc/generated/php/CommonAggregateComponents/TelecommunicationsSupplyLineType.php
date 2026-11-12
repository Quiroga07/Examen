<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing TelecommunicationsSupplyLineType
 *
 * ABIE
 *  Telecommunications Supply Line. Details
 *  A class that outlines the telecommunication supply in details
 *  Telecommunications Supply Line
 * XSD Type: TelecommunicationsSupplyLineType
 */
class TelecommunicationsSupplyLineType
{
    /**
     * BBIE
     *  Telecommunications Supply Line. Identifier
     *  An identifier for this telecommunications supply line.
     *  1
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Phone Number. Text
     *  The phone number used for this telecommunication supply line
     *  1
     *  Telecommunications Supply Line
     *  Phone Number
     *  Text
     *  Text. Type
     *  12345678
     *
     * @var \Ubl21\CommonBasicComponents\PhoneNumber $phoneNumber
     */
    private $phoneNumber = null;

    /**
     * BBIE
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * BBIE
     *  Telecommunications Supply Line. Line Extension Amount. Amount
     *  An amount specifying the cost of this telecommunication line
     *  0..1
     *  Telecommunications Supply Line
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @var \Ubl21\CommonBasicComponents\LineExtensionAmount $lineExtensionAmount
     */
    private $lineExtensionAmount = null;

    /**
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @var \Ubl21\CommonAggregateComponents\ExchangeRate[] $exchangeRate
     */
    private $exchangeRate = [
        
    ];

    /**
     * ASBIE
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @var \Ubl21\CommonAggregateComponents\TelecommunicationsService[] $telecommunicationsService
     */
    private $telecommunicationsService = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Telecommunications Supply Line. Identifier
     *  An identifier for this telecommunications supply line.
     *  1
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Identifier
     *  An identifier for this telecommunications supply line.
     *  1
     *  Telecommunications Supply Line
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
     * Gets as phoneNumber
     *
     * BBIE
     *  Telecommunications Supply Line. Phone Number. Text
     *  The phone number used for this telecommunication supply line
     *  1
     *  Telecommunications Supply Line
     *  Phone Number
     *  Text
     *  Text. Type
     *  12345678
     *
     * @return \Ubl21\CommonBasicComponents\PhoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets a new phoneNumber
     *
     * BBIE
     *  Telecommunications Supply Line. Phone Number. Text
     *  The phone number used for this telecommunication supply line
     *  1
     *  Telecommunications Supply Line
     *  Phone Number
     *  Text
     *  Text. Type
     *  12345678
     *
     * @param \Ubl21\CommonBasicComponents\PhoneNumber $phoneNumber
     * @return self
     */
    public function setPhoneNumber(\Ubl21\CommonBasicComponents\PhoneNumber $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
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
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
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
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
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
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
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
     *  Telecommunications Supply Line. Description. Text
     *  The description of the telecommunication supply line
     *  0..n
     *  Telecommunications Supply Line
     *  Description
     *  Text
     *  Text. Type
     *  Additional informations
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
     * Gets as lineExtensionAmount
     *
     * BBIE
     *  Telecommunications Supply Line. Line Extension Amount. Amount
     *  An amount specifying the cost of this telecommunication line
     *  0..1
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Line Extension Amount. Amount
     *  An amount specifying the cost of this telecommunication line
     *  0..1
     *  Telecommunications Supply Line
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
     * Adds as exchangeRate
     *
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\ExchangeRate $exchangeRate
     */
    public function addToExchangeRate(\Ubl21\CommonAggregateComponents\ExchangeRate $exchangeRate)
    {
        $this->exchangeRate[] = $exchangeRate;
        return $this;
    }

    /**
     * isset exchangeRate
     *
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @param int|string $index
     * @return bool
     */
    public function issetExchangeRate($index)
    {
        return isset($this->exchangeRate[$index]);
    }

    /**
     * unset exchangeRate
     *
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @param int|string $index
     * @return void
     */
    public function unsetExchangeRate($index)
    {
        unset($this->exchangeRate[$index]);
    }

    /**
     * Gets as exchangeRate
     *
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @return \Ubl21\CommonAggregateComponents\ExchangeRate[]
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Sets a new exchangeRate
     *
     * ASBIE
     *  Telecommunications Supply Line. Exchange Rate
     *  Exchanges rates used to calculate the amount for this line.
     *  0..n
     *  Telecommunications Supply Line
     *  Exchange Rate
     *  Exchange Rate
     *  Exchange Rate
     *
     * @param \Ubl21\CommonAggregateComponents\ExchangeRate[] $exchangeRate
     * @return self
     */
    public function setExchangeRate(?array $exchangeRate = null)
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }

    /**
     * Adds as allowanceCharge
     *
     * ASBIE
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Allowance Charge
     *  An allowance or charge that applies to this telecommunication supply line.
     *  0..n
     *  Telecommunications Supply Line
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
     * Adds as taxTotal
     *
     * ASBIE
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     *  Telecommunications Supply Line. Tax Total
     *  A total amount of taxes of a particular kind applicable to this telecommunications supply line
     *  0..n
     *  Telecommunications Supply Line
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
     * Adds as telecommunicationsService
     *
     * ASBIE
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\TelecommunicationsService $telecommunicationsService
     */
    public function addToTelecommunicationsService(\Ubl21\CommonAggregateComponents\TelecommunicationsService $telecommunicationsService)
    {
        $this->telecommunicationsService[] = $telecommunicationsService;
        return $this;
    }

    /**
     * isset telecommunicationsService
     *
     * ASBIE
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTelecommunicationsService($index)
    {
        return isset($this->telecommunicationsService[$index]);
    }

    /**
     * unset telecommunicationsService
     *
     * ASBIE
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTelecommunicationsService($index)
    {
        unset($this->telecommunicationsService[$index]);
    }

    /**
     * Gets as telecommunicationsService
     *
     * ASBIE
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @return \Ubl21\CommonAggregateComponents\TelecommunicationsService[]
     */
    public function getTelecommunicationsService()
    {
        return $this->telecommunicationsService;
    }

    /**
     * Sets a new telecommunicationsService
     *
     * ASBIE
     *  Telecommunications Supply Line. Telecommunications Service
     *  A telecommunications service (e.g., a telephone call).
     *  1..n
     *  Telecommunications Supply Line
     *  Telecommunications Service
     *  Telecommunications Service
     *  Telecommunications Service
     *
     * @param \Ubl21\CommonAggregateComponents\TelecommunicationsService[] $telecommunicationsService
     * @return self
     */
    public function setTelecommunicationsService(array $telecommunicationsService)
    {
        $this->telecommunicationsService = $telecommunicationsService;
        return $this;
    }
}

