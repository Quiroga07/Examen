<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing LocationType
 *
 * ABIE
 *  Location. Details
 *  A class to describe a location.
 *  Location
 * XSD Type: LocationType
 */
class LocationType
{
    /**
     * BBIE
     *  Location. Identifier
     *  An identifier for this location, e.g., the EAN Location Number, GLN.
     *  0..1
     *  Location
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  5790002221134
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Conditions[] $conditions
     */
    private $conditions = [
        
    ];

    /**
     * BBIE
     *  Location. Country Subentity. Text
     *  A territorial division of a country, such as a county or state, expressed as text.
     *  0..1
     *  Location
     *  Country Subentity
     *  Text
     *  Text. Type
     *  AdministrativeArea, State, Country, Shire, Canton
     *  Florida , Tamilnadu
     *
     * @var \Ubl21\CommonBasicComponents\CountrySubentity $countrySubentity
     */
    private $countrySubentity = null;

    /**
     * BBIE
     *  Location. Country Subentity Code. Code
     *  A territorial division of a country, such as a county or state, expressed as a code.
     *  0..1
     *  Location
     *  Country Subentity Code
     *  Code
     *  Code. Type
     *  AdministrativeAreaCode, State Code
     *
     * @var \Ubl21\CommonBasicComponents\CountrySubentityCode $countrySubentityCode
     */
    private $countrySubentityCode = null;

    /**
     * BBIE
     *  Location. Location Type Code. Code
     *  A code signifying the type of location.
     *  0..1
     *  Location
     *  Location Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\LocationTypeCode $locationTypeCode
     */
    private $locationTypeCode = null;

    /**
     * BBIE
     *  Location. Information_ URI. Identifier
     *  The Uniform Resource Identifier (URI) of a document providing information about this location.
     *  0..1
     *  Location
     *  Information
     *  URI
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\InformationURI $informationURI
     */
    private $informationURI = null;

    /**
     * BBIE
     *  Location. Name
     *  The name of this location.
     *  0..1
     *  Location
     *  Name
     *  Name
     *  Name. Type
     *  winter 2005 collection
     *
     * @var \Ubl21\CommonBasicComponents\Name $name
     */
    private $name = null;

    /**
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\ValidityPeriod[] $validityPeriod
     */
    private $validityPeriod = [
        
    ];

    /**
     * ASBIE
     *  Location. Address
     *  The address of this location.
     *  0..1
     *  Location
     *  Address
     *  Address
     *  Address
     *
     * @var \Ubl21\CommonAggregateComponents\Address $address
     */
    private $address = null;

    /**
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @var \Ubl21\CommonAggregateComponents\SubsidiaryLocation[] $subsidiaryLocation
     */
    private $subsidiaryLocation = [
        
    ];

    /**
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @var \Ubl21\CommonAggregateComponents\LocationCoordinate[] $locationCoordinate
     */
    private $locationCoordinate = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Location. Identifier
     *  An identifier for this location, e.g., the EAN Location Number, GLN.
     *  0..1
     *  Location
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  5790002221134
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
     *  Location. Identifier
     *  An identifier for this location, e.g., the EAN Location Number, GLN.
     *  0..1
     *  Location
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *  5790002221134
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
     * Adds as description
     *
     * BBIE
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
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
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
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
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
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
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
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
     *  Location. Description. Text
     *  Text describing this location.
     *  0..n
     *  Location
     *  Description
     *  Text
     *  Text. Type
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
     * Adds as conditions
     *
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Conditions $conditions
     */
    public function addToConditions(\Ubl21\CommonBasicComponents\Conditions $conditions)
    {
        $this->conditions[] = $conditions;
        return $this;
    }

    /**
     * isset conditions
     *
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetConditions($index)
    {
        return isset($this->conditions[$index]);
    }

    /**
     * unset conditions
     *
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetConditions($index)
    {
        unset($this->conditions[$index]);
    }

    /**
     * Gets as conditions
     *
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Conditions[]
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Sets a new conditions
     *
     * BBIE
     *  Location. Conditions. Text
     *  Free-form text describing the physical conditions of the location.
     *  0..n
     *  Location
     *  Conditions
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Conditions[] $conditions
     * @return self
     */
    public function setConditions(?array $conditions = null)
    {
        $this->conditions = $conditions;
        return $this;
    }

    /**
     * Gets as countrySubentity
     *
     * BBIE
     *  Location. Country Subentity. Text
     *  A territorial division of a country, such as a county or state, expressed as text.
     *  0..1
     *  Location
     *  Country Subentity
     *  Text
     *  Text. Type
     *  AdministrativeArea, State, Country, Shire, Canton
     *  Florida , Tamilnadu
     *
     * @return \Ubl21\CommonBasicComponents\CountrySubentity
     */
    public function getCountrySubentity()
    {
        return $this->countrySubentity;
    }

    /**
     * Sets a new countrySubentity
     *
     * BBIE
     *  Location. Country Subentity. Text
     *  A territorial division of a country, such as a county or state, expressed as text.
     *  0..1
     *  Location
     *  Country Subentity
     *  Text
     *  Text. Type
     *  AdministrativeArea, State, Country, Shire, Canton
     *  Florida , Tamilnadu
     *
     * @param \Ubl21\CommonBasicComponents\CountrySubentity $countrySubentity
     * @return self
     */
    public function setCountrySubentity(?\Ubl21\CommonBasicComponents\CountrySubentity $countrySubentity = null)
    {
        $this->countrySubentity = $countrySubentity;
        return $this;
    }

    /**
     * Gets as countrySubentityCode
     *
     * BBIE
     *  Location. Country Subentity Code. Code
     *  A territorial division of a country, such as a county or state, expressed as a code.
     *  0..1
     *  Location
     *  Country Subentity Code
     *  Code
     *  Code. Type
     *  AdministrativeAreaCode, State Code
     *
     * @return \Ubl21\CommonBasicComponents\CountrySubentityCode
     */
    public function getCountrySubentityCode()
    {
        return $this->countrySubentityCode;
    }

    /**
     * Sets a new countrySubentityCode
     *
     * BBIE
     *  Location. Country Subentity Code. Code
     *  A territorial division of a country, such as a county or state, expressed as a code.
     *  0..1
     *  Location
     *  Country Subentity Code
     *  Code
     *  Code. Type
     *  AdministrativeAreaCode, State Code
     *
     * @param \Ubl21\CommonBasicComponents\CountrySubentityCode $countrySubentityCode
     * @return self
     */
    public function setCountrySubentityCode(?\Ubl21\CommonBasicComponents\CountrySubentityCode $countrySubentityCode = null)
    {
        $this->countrySubentityCode = $countrySubentityCode;
        return $this;
    }

    /**
     * Gets as locationTypeCode
     *
     * BBIE
     *  Location. Location Type Code. Code
     *  A code signifying the type of location.
     *  0..1
     *  Location
     *  Location Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\LocationTypeCode
     */
    public function getLocationTypeCode()
    {
        return $this->locationTypeCode;
    }

    /**
     * Sets a new locationTypeCode
     *
     * BBIE
     *  Location. Location Type Code. Code
     *  A code signifying the type of location.
     *  0..1
     *  Location
     *  Location Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\LocationTypeCode $locationTypeCode
     * @return self
     */
    public function setLocationTypeCode(?\Ubl21\CommonBasicComponents\LocationTypeCode $locationTypeCode = null)
    {
        $this->locationTypeCode = $locationTypeCode;
        return $this;
    }

    /**
     * Gets as informationURI
     *
     * BBIE
     *  Location. Information_ URI. Identifier
     *  The Uniform Resource Identifier (URI) of a document providing information about this location.
     *  0..1
     *  Location
     *  Information
     *  URI
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\InformationURI
     */
    public function getInformationURI()
    {
        return $this->informationURI;
    }

    /**
     * Sets a new informationURI
     *
     * BBIE
     *  Location. Information_ URI. Identifier
     *  The Uniform Resource Identifier (URI) of a document providing information about this location.
     *  0..1
     *  Location
     *  Information
     *  URI
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\InformationURI $informationURI
     * @return self
     */
    public function setInformationURI(?\Ubl21\CommonBasicComponents\InformationURI $informationURI = null)
    {
        $this->informationURI = $informationURI;
        return $this;
    }

    /**
     * Gets as name
     *
     * BBIE
     *  Location. Name
     *  The name of this location.
     *  0..1
     *  Location
     *  Name
     *  Name
     *  Name. Type
     *  winter 2005 collection
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
     *  Location. Name
     *  The name of this location.
     *  0..1
     *  Location
     *  Name
     *  Name
     *  Name. Type
     *  winter 2005 collection
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
     * Adds as validityPeriod
     *
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\ValidityPeriod $validityPeriod
     */
    public function addToValidityPeriod(\Ubl21\CommonAggregateComponents\ValidityPeriod $validityPeriod)
    {
        $this->validityPeriod[] = $validityPeriod;
        return $this;
    }

    /**
     * isset validityPeriod
     *
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @param int|string $index
     * @return bool
     */
    public function issetValidityPeriod($index)
    {
        return isset($this->validityPeriod[$index]);
    }

    /**
     * unset validityPeriod
     *
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @param int|string $index
     * @return void
     */
    public function unsetValidityPeriod($index)
    {
        unset($this->validityPeriod[$index]);
    }

    /**
     * Gets as validityPeriod
     *
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\ValidityPeriod[]
     */
    public function getValidityPeriod()
    {
        return $this->validityPeriod;
    }

    /**
     * Sets a new validityPeriod
     *
     * ASBIE
     *  Location. Validity_ Period. Period
     *  A period during which this location can be used (e.g., for delivery).
     *  0..n
     *  Location
     *  Validity
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\ValidityPeriod[] $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?array $validityPeriod = null)
    {
        $this->validityPeriod = $validityPeriod;
        return $this;
    }

    /**
     * Gets as address
     *
     * ASBIE
     *  Location. Address
     *  The address of this location.
     *  0..1
     *  Location
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
     *  Location. Address
     *  The address of this location.
     *  0..1
     *  Location
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

    /**
     * Adds as subsidiaryLocation
     *
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\SubsidiaryLocation $subsidiaryLocation
     */
    public function addToSubsidiaryLocation(\Ubl21\CommonAggregateComponents\SubsidiaryLocation $subsidiaryLocation)
    {
        $this->subsidiaryLocation[] = $subsidiaryLocation;
        return $this;
    }

    /**
     * isset subsidiaryLocation
     *
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @param int|string $index
     * @return bool
     */
    public function issetSubsidiaryLocation($index)
    {
        return isset($this->subsidiaryLocation[$index]);
    }

    /**
     * unset subsidiaryLocation
     *
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @param int|string $index
     * @return void
     */
    public function unsetSubsidiaryLocation($index)
    {
        unset($this->subsidiaryLocation[$index]);
    }

    /**
     * Gets as subsidiaryLocation
     *
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @return \Ubl21\CommonAggregateComponents\SubsidiaryLocation[]
     */
    public function getSubsidiaryLocation()
    {
        return $this->subsidiaryLocation;
    }

    /**
     * Sets a new subsidiaryLocation
     *
     * ASBIE
     *  Location. Subsidiary_ Location. Location
     *  A location subsidiary to this location.
     *  0..n
     *  Location
     *  Subsidiary
     *  Location
     *  Location
     *  Location
     *
     * @param \Ubl21\CommonAggregateComponents\SubsidiaryLocation[] $subsidiaryLocation
     * @return self
     */
    public function setSubsidiaryLocation(?array $subsidiaryLocation = null)
    {
        $this->subsidiaryLocation = $subsidiaryLocation;
        return $this;
    }

    /**
     * Adds as locationCoordinate
     *
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\LocationCoordinate $locationCoordinate
     */
    public function addToLocationCoordinate(\Ubl21\CommonAggregateComponents\LocationCoordinate $locationCoordinate)
    {
        $this->locationCoordinate[] = $locationCoordinate;
        return $this;
    }

    /**
     * isset locationCoordinate
     *
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @param int|string $index
     * @return bool
     */
    public function issetLocationCoordinate($index)
    {
        return isset($this->locationCoordinate[$index]);
    }

    /**
     * unset locationCoordinate
     *
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @param int|string $index
     * @return void
     */
    public function unsetLocationCoordinate($index)
    {
        unset($this->locationCoordinate[$index]);
    }

    /**
     * Gets as locationCoordinate
     *
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @return \Ubl21\CommonAggregateComponents\LocationCoordinate[]
     */
    public function getLocationCoordinate()
    {
        return $this->locationCoordinate;
    }

    /**
     * Sets a new locationCoordinate
     *
     * ASBIE
     *  Location. Location Coordinate
     *  The geographical coordinates of this location.
     *  0..n
     *  Location
     *  Location Coordinate
     *  Location Coordinate
     *  Location Coordinate
     *
     * @param \Ubl21\CommonAggregateComponents\LocationCoordinate[] $locationCoordinate
     * @return self
     */
    public function setLocationCoordinate(?array $locationCoordinate = null)
    {
        $this->locationCoordinate = $locationCoordinate;
        return $this;
    }
}

