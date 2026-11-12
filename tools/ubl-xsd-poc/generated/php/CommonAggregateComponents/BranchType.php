<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing BranchType
 *
 * ABIE
 *  Branch. Details
 *  A class to describe a branch or a division of an organization.
 *  Branch
 * XSD Type: BranchType
 */
class BranchType
{
    /**
     * BBIE
     *  Branch. Identifier
     *  An identifier for this branch or division of an organization.
     *  0..1
     *  Branch
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Branch. Name
     *  The name of this branch or division of an organization.
     *  0..1
     *  Branch
     *  Name
     *  Name
     *  Name. Type
     *
     * @var \Ubl21\CommonBasicComponents\Name $name
     */
    private $name = null;

    /**
     * ASBIE
     *  Branch. Financial Institution
     *  The financial institution that this branch belongs to (if applicable).
     *  0..1
     *  Branch
     *  Financial Institution
     *  Financial Institution
     *  Financial Institution
     *
     * @var \Ubl21\CommonAggregateComponents\FinancialInstitution $financialInstitution
     */
    private $financialInstitution = null;

    /**
     * ASBIE
     *  Branch. Address
     *  The address of this branch or division.
     *  0..1
     *  Branch
     *  Address
     *  Address
     *  Address
     *
     * @var \Ubl21\CommonAggregateComponents\Address $address
     */
    private $address = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Branch. Identifier
     *  An identifier for this branch or division of an organization.
     *  0..1
     *  Branch
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
     *  Branch. Identifier
     *  An identifier for this branch or division of an organization.
     *  0..1
     *  Branch
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ID $iD
     * @return self
     */
    public function setID(?\Ubl21\CommonBasicComponents\ID $iD = null)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Gets as name
     *
     * BBIE
     *  Branch. Name
     *  The name of this branch or division of an organization.
     *  0..1
     *  Branch
     *  Name
     *  Name
     *  Name. Type
     *
     * @return \Ubl21\CommonBasicComponents\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * BBIE
     *  Branch. Name
     *  The name of this branch or division of an organization.
     *  0..1
     *  Branch
     *  Name
     *  Name
     *  Name. Type
     *
     * @param \Ubl21\CommonBasicComponents\Name $name
     * @return self
     */
    public function setName(?\Ubl21\CommonBasicComponents\Name $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as financialInstitution
     *
     * ASBIE
     *  Branch. Financial Institution
     *  The financial institution that this branch belongs to (if applicable).
     *  0..1
     *  Branch
     *  Financial Institution
     *  Financial Institution
     *  Financial Institution
     *
     * @return \Ubl21\CommonAggregateComponents\FinancialInstitution
     */
    public function getFinancialInstitution()
    {
        return $this->financialInstitution;
    }

    /**
     * Sets a new financialInstitution
     *
     * ASBIE
     *  Branch. Financial Institution
     *  The financial institution that this branch belongs to (if applicable).
     *  0..1
     *  Branch
     *  Financial Institution
     *  Financial Institution
     *  Financial Institution
     *
     * @param \Ubl21\CommonAggregateComponents\FinancialInstitution $financialInstitution
     * @return self
     */
    public function setFinancialInstitution(?\Ubl21\CommonAggregateComponents\FinancialInstitution $financialInstitution = null)
    {
        $this->financialInstitution = $financialInstitution;
        return $this;
    }

    /**
     * Gets as address
     *
     * ASBIE
     *  Branch. Address
     *  The address of this branch or division.
     *  0..1
     *  Branch
     *  Address
     *  Address
     *  Address
     *
     * @return \Ubl21\CommonAggregateComponents\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets a new address
     *
     * ASBIE
     *  Branch. Address
     *  The address of this branch or division.
     *  0..1
     *  Branch
     *  Address
     *  Address
     *  Address
     *
     * @param \Ubl21\CommonAggregateComponents\Address $address
     * @return self
     */
    public function setAddress(?\Ubl21\CommonAggregateComponents\Address $address = null)
    {
        $this->address = $address;
        return $this;
    }
}

