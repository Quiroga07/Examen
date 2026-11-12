<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing PartyTaxSchemeType
 *
 * ABIE
 *  Party Tax Scheme. Details
 *  A class to describe a taxation scheme applying to a party.
 *  Party Tax Scheme
 * XSD Type: PartyTaxSchemeType
 */
class PartyTaxSchemeType
{
    /**
     * BBIE
     *  Party Tax Scheme. Registration_ Name. Name
     *  The name of the party as registered with the relevant fiscal authority.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Name
     *  Name
     *  Name. Type
     *  Microsoft Corporation
     *
     * @var \Ubl21\CommonBasicComponents\RegistrationName $registrationName
     */
    private $registrationName = null;

    /**
     * BBIE
     *  Party Tax Scheme. Company Identifier. Identifier
     *  An identifier for the party assigned for tax purposes by the taxation authority.
     *  0..1
     *  Party Tax Scheme
     *  Company Identifier
     *  Identifier
     *  Identifier. Type
     *  VAT Number
     *  3556625
     *
     * @var \Ubl21\CommonBasicComponents\CompanyID $companyID
     */
    private $companyID = null;

    /**
     * BBIE
     *  Party Tax Scheme. Tax Level Code. Code
     *  A code signifying the tax level applicable to the party within this taxation scheme.
     *  0..1
     *  Party Tax Scheme
     *  Tax Level Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\TaxLevelCode $taxLevelCode
     */
    private $taxLevelCode = null;

    /**
     * BBIE
     *  Party Tax Scheme. Exemption Reason Code. Code
     *  A reason for the party's exemption from tax, expressed as a code.
     *  0..1
     *  Party Tax Scheme
     *  Exemption Reason Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ExemptionReasonCode $exemptionReasonCode
     */
    private $exemptionReasonCode = null;

    /**
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ExemptionReason[] $exemptionReason
     */
    private $exemptionReason = [
        
    ];

    /**
     * ASBIE
     *  Party Tax Scheme. Registration_ Address. Address
     *  The address of the party as registered for tax purposes.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Address
     *  Address
     *  Address
     *
     * @var \Ubl21\CommonAggregateComponents\RegistrationAddress $registrationAddress
     */
    private $registrationAddress = null;

    /**
     * ASBIE
     *  Party Tax Scheme. Tax Scheme
     *  The taxation scheme applicable to the party.
     *  1
     *  Party Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *
     * @var \Ubl21\CommonAggregateComponents\TaxScheme $taxScheme
     */
    private $taxScheme = null;

    /**
     * Gets as registrationName
     *
     * BBIE
     *  Party Tax Scheme. Registration_ Name. Name
     *  The name of the party as registered with the relevant fiscal authority.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Name
     *  Name
     *  Name. Type
     *  Microsoft Corporation
     *
     * @return \Ubl21\CommonBasicComponents\RegistrationName
     */
    public function getRegistrationName()
    {
        return $this->registrationName;
    }

    /**
     * Sets a new registrationName
     *
     * BBIE
     *  Party Tax Scheme. Registration_ Name. Name
     *  The name of the party as registered with the relevant fiscal authority.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Name
     *  Name
     *  Name. Type
     *  Microsoft Corporation
     *
     * @param \Ubl21\CommonBasicComponents\RegistrationName $registrationName
     * @return self
     */
    public function setRegistrationName(?\Ubl21\CommonBasicComponents\RegistrationName $registrationName = null)
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * Gets as companyID
     *
     * BBIE
     *  Party Tax Scheme. Company Identifier. Identifier
     *  An identifier for the party assigned for tax purposes by the taxation authority.
     *  0..1
     *  Party Tax Scheme
     *  Company Identifier
     *  Identifier
     *  Identifier. Type
     *  VAT Number
     *  3556625
     *
     * @return \Ubl21\CommonBasicComponents\CompanyID
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * Sets a new companyID
     *
     * BBIE
     *  Party Tax Scheme. Company Identifier. Identifier
     *  An identifier for the party assigned for tax purposes by the taxation authority.
     *  0..1
     *  Party Tax Scheme
     *  Company Identifier
     *  Identifier
     *  Identifier. Type
     *  VAT Number
     *  3556625
     *
     * @param \Ubl21\CommonBasicComponents\CompanyID $companyID
     * @return self
     */
    public function setCompanyID(?\Ubl21\CommonBasicComponents\CompanyID $companyID = null)
    {
        $this->companyID = $companyID;
        return $this;
    }

    /**
     * Gets as taxLevelCode
     *
     * BBIE
     *  Party Tax Scheme. Tax Level Code. Code
     *  A code signifying the tax level applicable to the party within this taxation scheme.
     *  0..1
     *  Party Tax Scheme
     *  Tax Level Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\TaxLevelCode
     */
    public function getTaxLevelCode()
    {
        return $this->taxLevelCode;
    }

    /**
     * Sets a new taxLevelCode
     *
     * BBIE
     *  Party Tax Scheme. Tax Level Code. Code
     *  A code signifying the tax level applicable to the party within this taxation scheme.
     *  0..1
     *  Party Tax Scheme
     *  Tax Level Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\TaxLevelCode $taxLevelCode
     * @return self
     */
    public function setTaxLevelCode(?\Ubl21\CommonBasicComponents\TaxLevelCode $taxLevelCode = null)
    {
        $this->taxLevelCode = $taxLevelCode;
        return $this;
    }

    /**
     * Gets as exemptionReasonCode
     *
     * BBIE
     *  Party Tax Scheme. Exemption Reason Code. Code
     *  A reason for the party's exemption from tax, expressed as a code.
     *  0..1
     *  Party Tax Scheme
     *  Exemption Reason Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ExemptionReasonCode
     */
    public function getExemptionReasonCode()
    {
        return $this->exemptionReasonCode;
    }

    /**
     * Sets a new exemptionReasonCode
     *
     * BBIE
     *  Party Tax Scheme. Exemption Reason Code. Code
     *  A reason for the party's exemption from tax, expressed as a code.
     *  0..1
     *  Party Tax Scheme
     *  Exemption Reason Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ExemptionReasonCode $exemptionReasonCode
     * @return self
     */
    public function setExemptionReasonCode(?\Ubl21\CommonBasicComponents\ExemptionReasonCode $exemptionReasonCode = null)
    {
        $this->exemptionReasonCode = $exemptionReasonCode;
        return $this;
    }

    /**
     * Adds as exemptionReason
     *
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\ExemptionReason $exemptionReason
     */
    public function addToExemptionReason(\Ubl21\CommonBasicComponents\ExemptionReason $exemptionReason)
    {
        $this->exemptionReason[] = $exemptionReason;
        return $this;
    }

    /**
     * isset exemptionReason
     *
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetExemptionReason($index)
    {
        return isset($this->exemptionReason[$index]);
    }

    /**
     * unset exemptionReason
     *
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetExemptionReason($index)
    {
        unset($this->exemptionReason[$index]);
    }

    /**
     * Gets as exemptionReason
     *
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ExemptionReason[]
     */
    public function getExemptionReason()
    {
        return $this->exemptionReason;
    }

    /**
     * Sets a new exemptionReason
     *
     * BBIE
     *  Party Tax Scheme. Exemption_ Reason. Text
     *  A reason for the party's exemption from tax, expressed as text.
     *  0..n
     *  Party Tax Scheme
     *  Exemption
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ExemptionReason[] $exemptionReason
     * @return self
     */
    public function setExemptionReason(?array $exemptionReason = null)
    {
        $this->exemptionReason = $exemptionReason;
        return $this;
    }

    /**
     * Gets as registrationAddress
     *
     * ASBIE
     *  Party Tax Scheme. Registration_ Address. Address
     *  The address of the party as registered for tax purposes.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Address
     *  Address
     *  Address
     *
     * @return \Ubl21\CommonAggregateComponents\RegistrationAddress
     */
    public function getRegistrationAddress()
    {
        return $this->registrationAddress;
    }

    /**
     * Sets a new registrationAddress
     *
     * ASBIE
     *  Party Tax Scheme. Registration_ Address. Address
     *  The address of the party as registered for tax purposes.
     *  0..1
     *  Party Tax Scheme
     *  Registration
     *  Address
     *  Address
     *  Address
     *
     * @param \Ubl21\CommonAggregateComponents\RegistrationAddress $registrationAddress
     * @return self
     */
    public function setRegistrationAddress(?\Ubl21\CommonAggregateComponents\RegistrationAddress $registrationAddress = null)
    {
        $this->registrationAddress = $registrationAddress;
        return $this;
    }

    /**
     * Gets as taxScheme
     *
     * ASBIE
     *  Party Tax Scheme. Tax Scheme
     *  The taxation scheme applicable to the party.
     *  1
     *  Party Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *
     * @return \Ubl21\CommonAggregateComponents\TaxScheme
     */
    public function getTaxScheme()
    {
        return $this->taxScheme;
    }

    /**
     * Sets a new taxScheme
     *
     * ASBIE
     *  Party Tax Scheme. Tax Scheme
     *  The taxation scheme applicable to the party.
     *  1
     *  Party Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *  Tax Scheme
     *
     * @param \Ubl21\CommonAggregateComponents\TaxScheme $taxScheme
     * @return self
     */
    public function setTaxScheme(\Ubl21\CommonAggregateComponents\TaxScheme $taxScheme)
    {
        $this->taxScheme = $taxScheme;
        return $this;
    }
}

