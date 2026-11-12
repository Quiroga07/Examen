<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ServiceProviderPartyType
 *
 * ABIE
 *  Service Provider Party. Details
 *  A class to describe a party contracting to provide services, such as transportation, finance, etc.
 *  Service Provider Party
 * XSD Type: ServiceProviderPartyType
 */
class ServiceProviderPartyType
{
    /**
     * BBIE
     *  Service Provider Party. Identifier
     *  An identifier for this service provider.
     *  0..1
     *  Service Provider Party
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Service Provider Party. Service Type Code. Code
     *  The type of service provided, expressed as a code.
     *  0..1
     *  Service Provider Party
     *  Service Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ServiceTypeCode $serviceTypeCode
     */
    private $serviceTypeCode = null;

    /**
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ServiceType[] $serviceType
     */
    private $serviceType = [
        
    ];

    /**
     * ASBIE
     *  Service Provider Party. Party
     *  The party providing the service.
     *  1
     *  Service Provider Party
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\Party $party
     */
    private $party = null;

    /**
     * ASBIE
     *  Service Provider Party. Seller_ Contact. Contact
     *  The contact for the service provider.
     *  0..1
     *  Service Provider Party
     *  Seller
     *  Contact
     *  Contact
     *  Contact
     *
     * @var \Ubl21\CommonAggregateComponents\SellerContact $sellerContact
     */
    private $sellerContact = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Service Provider Party. Identifier
     *  An identifier for this service provider.
     *  0..1
     *  Service Provider Party
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
     *  Service Provider Party. Identifier
     *  An identifier for this service provider.
     *  0..1
     *  Service Provider Party
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
     * Gets as serviceTypeCode
     *
     * BBIE
     *  Service Provider Party. Service Type Code. Code
     *  The type of service provided, expressed as a code.
     *  0..1
     *  Service Provider Party
     *  Service Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ServiceTypeCode
     */
    public function getServiceTypeCode()
    {
        return $this->serviceTypeCode;
    }

    /**
     * Sets a new serviceTypeCode
     *
     * BBIE
     *  Service Provider Party. Service Type Code. Code
     *  The type of service provided, expressed as a code.
     *  0..1
     *  Service Provider Party
     *  Service Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ServiceTypeCode $serviceTypeCode
     * @return self
     */
    public function setServiceTypeCode(?\Ubl21\CommonBasicComponents\ServiceTypeCode $serviceTypeCode = null)
    {
        $this->serviceTypeCode = $serviceTypeCode;
        return $this;
    }

    /**
     * Adds as serviceType
     *
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\ServiceType $serviceType
     */
    public function addToServiceType(\Ubl21\CommonBasicComponents\ServiceType $serviceType)
    {
        $this->serviceType[] = $serviceType;
        return $this;
    }

    /**
     * isset serviceType
     *
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetServiceType($index)
    {
        return isset($this->serviceType[$index]);
    }

    /**
     * unset serviceType
     *
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetServiceType($index)
    {
        unset($this->serviceType[$index]);
    }

    /**
     * Gets as serviceType
     *
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ServiceType[]
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * Sets a new serviceType
     *
     * BBIE
     *  Service Provider Party. Service Type. Text
     *  The type of service provided, expressed as text.
     *  0..n
     *  Service Provider Party
     *  Service Type
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ServiceType[] $serviceType
     * @return self
     */
    public function setServiceType(?array $serviceType = null)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * Gets as party
     *
     * ASBIE
     *  Service Provider Party. Party
     *  The party providing the service.
     *  1
     *  Service Provider Party
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\Party
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * Sets a new party
     *
     * ASBIE
     *  Service Provider Party. Party
     *  The party providing the service.
     *  1
     *  Service Provider Party
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\Party $party
     * @return self
     */
    public function setParty(\Ubl21\CommonAggregateComponents\Party $party)
    {
        $this->party = $party;
        return $this;
    }

    /**
     * Gets as sellerContact
     *
     * ASBIE
     *  Service Provider Party. Seller_ Contact. Contact
     *  The contact for the service provider.
     *  0..1
     *  Service Provider Party
     *  Seller
     *  Contact
     *  Contact
     *  Contact
     *
     * @return \Ubl21\CommonAggregateComponents\SellerContact
     */
    public function getSellerContact()
    {
        return $this->sellerContact;
    }

    /**
     * Sets a new sellerContact
     *
     * ASBIE
     *  Service Provider Party. Seller_ Contact. Contact
     *  The contact for the service provider.
     *  0..1
     *  Service Provider Party
     *  Seller
     *  Contact
     *  Contact
     *  Contact
     *
     * @param \Ubl21\CommonAggregateComponents\SellerContact $sellerContact
     * @return self
     */
    public function setSellerContact(?\Ubl21\CommonAggregateComponents\SellerContact $sellerContact = null)
    {
        $this->sellerContact = $sellerContact;
        return $this;
    }
}

