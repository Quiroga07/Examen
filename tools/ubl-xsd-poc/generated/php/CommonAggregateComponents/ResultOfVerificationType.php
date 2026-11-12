<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ResultOfVerificationType
 *
 * ABIE
 *  Result Of Verification. Details
 *  A class to describe the result of an attempt to verify a signature.
 *  Result Of Verification
 * XSD Type: ResultOfVerificationType
 */
class ResultOfVerificationType
{
    /**
     * BBIE
     *  Result Of Verification. Validator. Identifier
     *  An identifier for the organization, person, service, or server that verified the signature.
     *  0..1
     *  Result Of Verification
     *  Validator
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValidatorID $validatorID
     */
    private $validatorID = null;

    /**
     * BBIE
     *  Result Of Verification. Validation_ Result Code. Code
     *  A code signifying the result of the verification.
     *  0..1
     *  Result Of Verification
     *  Validation
     *  Result Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValidationResultCode $validationResultCode
     */
    private $validationResultCode = null;

    /**
     * BBIE
     *  Result Of Verification. Validation Date. Date
     *  The date upon which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $validationDate
     */
    private $validationDate = null;

    /**
     * BBIE
     *  Result Of Verification. Validation Time. Time
     *  The time at which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Time
     *  Time
     *  Time. Type
     *
     * @var \DateTime $validationTime
     */
    private $validationTime = null;

    /**
     * BBIE
     *  Result Of Verification. Validate_ Process. Text
     *  The verification process.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Process
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValidateProcess $validateProcess
     */
    private $validateProcess = null;

    /**
     * BBIE
     *  Result Of Verification. Validate_ Tool. Text
     *  The tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValidateTool $validateTool
     */
    private $validateTool = null;

    /**
     * BBIE
     *  Result Of Verification. Validate_ Tool Version. Text
     *  The version of the tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool Version
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValidateToolVersion $validateToolVersion
     */
    private $validateToolVersion = null;

    /**
     * ASBIE
     *  Result Of Verification. Signatory_ Party. Party
     *  The signing party.
     *  0..1
     *  Result Of Verification
     *  Signatory
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\SignatoryParty $signatoryParty
     */
    private $signatoryParty = null;

    /**
     * Gets as validatorID
     *
     * BBIE
     *  Result Of Verification. Validator. Identifier
     *  An identifier for the organization, person, service, or server that verified the signature.
     *  0..1
     *  Result Of Verification
     *  Validator
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValidatorID
     */
    public function getValidatorID()
    {
        return $this->validatorID;
    }

    /**
     * Sets a new validatorID
     *
     * BBIE
     *  Result Of Verification. Validator. Identifier
     *  An identifier for the organization, person, service, or server that verified the signature.
     *  0..1
     *  Result Of Verification
     *  Validator
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValidatorID $validatorID
     * @return self
     */
    public function setValidatorID(?\Ubl21\CommonBasicComponents\ValidatorID $validatorID = null)
    {
        $this->validatorID = $validatorID;
        return $this;
    }

    /**
     * Gets as validationResultCode
     *
     * BBIE
     *  Result Of Verification. Validation_ Result Code. Code
     *  A code signifying the result of the verification.
     *  0..1
     *  Result Of Verification
     *  Validation
     *  Result Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValidationResultCode
     */
    public function getValidationResultCode()
    {
        return $this->validationResultCode;
    }

    /**
     * Sets a new validationResultCode
     *
     * BBIE
     *  Result Of Verification. Validation_ Result Code. Code
     *  A code signifying the result of the verification.
     *  0..1
     *  Result Of Verification
     *  Validation
     *  Result Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValidationResultCode $validationResultCode
     * @return self
     */
    public function setValidationResultCode(?\Ubl21\CommonBasicComponents\ValidationResultCode $validationResultCode = null)
    {
        $this->validationResultCode = $validationResultCode;
        return $this;
    }

    /**
     * Gets as validationDate
     *
     * BBIE
     *  Result Of Verification. Validation Date. Date
     *  The date upon which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getValidationDate()
    {
        return $this->validationDate;
    }

    /**
     * Sets a new validationDate
     *
     * BBIE
     *  Result Of Verification. Validation Date. Date
     *  The date upon which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $validationDate
     * @return self
     */
    public function setValidationDate(?\DateTime $validationDate = null)
    {
        $this->validationDate = $validationDate;
        return $this;
    }

    /**
     * Gets as validationTime
     *
     * BBIE
     *  Result Of Verification. Validation Time. Time
     *  The time at which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Time
     *  Time
     *  Time. Type
     *
     * @return \DateTime
     */
    public function getValidationTime()
    {
        return $this->validationTime;
    }

    /**
     * Sets a new validationTime
     *
     * BBIE
     *  Result Of Verification. Validation Time. Time
     *  The time at which verification took place.
     *  0..1
     *  Result Of Verification
     *  Validation Time
     *  Time
     *  Time. Type
     *
     * @param \DateTime $validationTime
     * @return self
     */
    public function setValidationTime(?\DateTime $validationTime = null)
    {
        $this->validationTime = $validationTime;
        return $this;
    }

    /**
     * Gets as validateProcess
     *
     * BBIE
     *  Result Of Verification. Validate_ Process. Text
     *  The verification process.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Process
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValidateProcess
     */
    public function getValidateProcess()
    {
        return $this->validateProcess;
    }

    /**
     * Sets a new validateProcess
     *
     * BBIE
     *  Result Of Verification. Validate_ Process. Text
     *  The verification process.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Process
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValidateProcess $validateProcess
     * @return self
     */
    public function setValidateProcess(?\Ubl21\CommonBasicComponents\ValidateProcess $validateProcess = null)
    {
        $this->validateProcess = $validateProcess;
        return $this;
    }

    /**
     * Gets as validateTool
     *
     * BBIE
     *  Result Of Verification. Validate_ Tool. Text
     *  The tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValidateTool
     */
    public function getValidateTool()
    {
        return $this->validateTool;
    }

    /**
     * Sets a new validateTool
     *
     * BBIE
     *  Result Of Verification. Validate_ Tool. Text
     *  The tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValidateTool $validateTool
     * @return self
     */
    public function setValidateTool(?\Ubl21\CommonBasicComponents\ValidateTool $validateTool = null)
    {
        $this->validateTool = $validateTool;
        return $this;
    }

    /**
     * Gets as validateToolVersion
     *
     * BBIE
     *  Result Of Verification. Validate_ Tool Version. Text
     *  The version of the tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool Version
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValidateToolVersion
     */
    public function getValidateToolVersion()
    {
        return $this->validateToolVersion;
    }

    /**
     * Sets a new validateToolVersion
     *
     * BBIE
     *  Result Of Verification. Validate_ Tool Version. Text
     *  The version of the tool used to verify the signature.
     *  0..1
     *  Result Of Verification
     *  Validate
     *  Tool Version
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValidateToolVersion $validateToolVersion
     * @return self
     */
    public function setValidateToolVersion(?\Ubl21\CommonBasicComponents\ValidateToolVersion $validateToolVersion = null)
    {
        $this->validateToolVersion = $validateToolVersion;
        return $this;
    }

    /**
     * Gets as signatoryParty
     *
     * ASBIE
     *  Result Of Verification. Signatory_ Party. Party
     *  The signing party.
     *  0..1
     *  Result Of Verification
     *  Signatory
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\SignatoryParty
     */
    public function getSignatoryParty()
    {
        return $this->signatoryParty;
    }

    /**
     * Sets a new signatoryParty
     *
     * ASBIE
     *  Result Of Verification. Signatory_ Party. Party
     *  The signing party.
     *  0..1
     *  Result Of Verification
     *  Signatory
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\SignatoryParty $signatoryParty
     * @return self
     */
    public function setSignatoryParty(?\Ubl21\CommonAggregateComponents\SignatoryParty $signatoryParty = null)
    {
        $this->signatoryParty = $signatoryParty;
        return $this;
    }
}

