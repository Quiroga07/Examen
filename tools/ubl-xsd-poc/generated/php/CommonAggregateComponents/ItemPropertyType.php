<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ItemPropertyType
 *
 * ABIE
 *  Item Property. Details
 *  A class to describe a specific property of an item.
 *  Item Property
 * XSD Type: ItemPropertyType
 */
class ItemPropertyType
{
    /**
     * BBIE
     *  Item Property. Identifier
     *  An identifier for this property of an item.
     *  0..1
     *  Item Property
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Item Property. Name
     *  The name of this item property.
     *  1
     *  Item Property
     *  Name
     *  Name
     *  Name. Type
     *  Energy Rating , Collar Size , Fat Content
     *
     * @var \Ubl21\CommonBasicComponents\Name $name
     */
    private $name = null;

    /**
     * BBIE
     *  Item Property. Name Code. Code
     *  The name of this item property, expressed as a code.
     *  0..1
     *  Item Property
     *  Name Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\NameCode $nameCode
     */
    private $nameCode = null;

    /**
     * BBIE
     *  Item Property. Test Method. Text
     *  The method of testing the value of this item property.
     *  0..1
     *  Item Property
     *  Test Method
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @var \Ubl21\CommonBasicComponents\TestMethod $testMethod
     */
    private $testMethod = null;

    /**
     * BBIE
     *  Item Property. Value. Text
     *  The value of this item property, expressed as text.
     *  0..1
     *  Item Property
     *  Value
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @var \Ubl21\CommonBasicComponents\Value $value
     */
    private $value = null;

    /**
     * BBIE
     *  Item Property. Value_ Quantity. Quantity
     *  The value of this item property, expressed as a quantity.
     *  0..1
     *  Item Property
     *  Value
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValueQuantity $valueQuantity
     */
    private $valueQuantity = null;

    /**
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ValueQualifier[] $valueQualifier
     */
    private $valueQualifier = [
        
    ];

    /**
     * BBIE
     *  Item Property. Importance Code. Code
     *  A code signifying the importance of this property in using it to describe a related Item.
     *  0..1
     *  Item Property
     *  Importance Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ImportanceCode $importanceCode
     */
    private $importanceCode = null;

    /**
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\ListValue[] $listValue
     */
    private $listValue = [
        
    ];

    /**
     * ASBIE
     *  Item Property. Usability_ Period. Period
     *  The period during which this item property is valid.
     *  0..1
     *  Item Property
     *  Usability
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\UsabilityPeriod $usabilityPeriod
     */
    private $usabilityPeriod = null;

    /**
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @var \Ubl21\CommonAggregateComponents\ItemPropertyGroup[] $itemPropertyGroup
     */
    private $itemPropertyGroup = [
        
    ];

    /**
     * ASBIE
     *  Item Property. Range_ Dimension. Dimension
     *  The range of values for the dimensions of this property.
     *  0..1
     *  Item Property
     *  Range
     *  Dimension
     *  Dimension
     *  Dimension
     *
     * @var \Ubl21\CommonAggregateComponents\RangeDimension $rangeDimension
     */
    private $rangeDimension = null;

    /**
     * ASBIE
     *  Item Property. Item Property Range
     *  A range of values for this item property.
     *  0..1
     *  Item Property
     *  Item Property Range
     *  Item Property Range
     *  Item Property Range
     *
     * @var \Ubl21\CommonAggregateComponents\ItemPropertyRange $itemPropertyRange
     */
    private $itemPropertyRange = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Item Property. Identifier
     *  An identifier for this property of an item.
     *  0..1
     *  Item Property
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
     *  Item Property. Identifier
     *  An identifier for this property of an item.
     *  0..1
     *  Item Property
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
     *  Item Property. Name
     *  The name of this item property.
     *  1
     *  Item Property
     *  Name
     *  Name
     *  Name. Type
     *  Energy Rating , Collar Size , Fat Content
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
     *  Item Property. Name
     *  The name of this item property.
     *  1
     *  Item Property
     *  Name
     *  Name
     *  Name. Type
     *  Energy Rating , Collar Size , Fat Content
     *
     * @param \Ubl21\CommonBasicComponents\Name $name
     * @return self
     */
    public function setName(\Ubl21\CommonBasicComponents\Name $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as nameCode
     *
     * BBIE
     *  Item Property. Name Code. Code
     *  The name of this item property, expressed as a code.
     *  0..1
     *  Item Property
     *  Name Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\NameCode
     */
    public function getNameCode()
    {
        return $this->nameCode;
    }

    /**
     * Sets a new nameCode
     *
     * BBIE
     *  Item Property. Name Code. Code
     *  The name of this item property, expressed as a code.
     *  0..1
     *  Item Property
     *  Name Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\NameCode $nameCode
     * @return self
     */
    public function setNameCode(?\Ubl21\CommonBasicComponents\NameCode $nameCode = null)
    {
        $this->nameCode = $nameCode;
        return $this;
    }

    /**
     * Gets as testMethod
     *
     * BBIE
     *  Item Property. Test Method. Text
     *  The method of testing the value of this item property.
     *  0..1
     *  Item Property
     *  Test Method
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @return \Ubl21\CommonBasicComponents\TestMethod
     */
    public function getTestMethod()
    {
        return $this->testMethod;
    }

    /**
     * Sets a new testMethod
     *
     * BBIE
     *  Item Property. Test Method. Text
     *  The method of testing the value of this item property.
     *  0..1
     *  Item Property
     *  Test Method
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @param \Ubl21\CommonBasicComponents\TestMethod $testMethod
     * @return self
     */
    public function setTestMethod(?\Ubl21\CommonBasicComponents\TestMethod $testMethod = null)
    {
        $this->testMethod = $testMethod;
        return $this;
    }

    /**
     * Gets as value
     *
     * BBIE
     *  Item Property. Value. Text
     *  The value of this item property, expressed as text.
     *  0..1
     *  Item Property
     *  Value
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @return \Ubl21\CommonBasicComponents\Value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets a new value
     *
     * BBIE
     *  Item Property. Value. Text
     *  The value of this item property, expressed as text.
     *  0..1
     *  Item Property
     *  Value
     *  Text
     *  Text. Type
     *  100 watts , 15 European , 20% +/- 5%
     *
     * @param \Ubl21\CommonBasicComponents\Value $value
     * @return self
     */
    public function setValue(?\Ubl21\CommonBasicComponents\Value $value = null)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Gets as valueQuantity
     *
     * BBIE
     *  Item Property. Value_ Quantity. Quantity
     *  The value of this item property, expressed as a quantity.
     *  0..1
     *  Item Property
     *  Value
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValueQuantity
     */
    public function getValueQuantity()
    {
        return $this->valueQuantity;
    }

    /**
     * Sets a new valueQuantity
     *
     * BBIE
     *  Item Property. Value_ Quantity. Quantity
     *  The value of this item property, expressed as a quantity.
     *  0..1
     *  Item Property
     *  Value
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValueQuantity $valueQuantity
     * @return self
     */
    public function setValueQuantity(?\Ubl21\CommonBasicComponents\ValueQuantity $valueQuantity = null)
    {
        $this->valueQuantity = $valueQuantity;
        return $this;
    }

    /**
     * Adds as valueQualifier
     *
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\ValueQualifier $valueQualifier
     */
    public function addToValueQualifier(\Ubl21\CommonBasicComponents\ValueQualifier $valueQualifier)
    {
        $this->valueQualifier[] = $valueQualifier;
        return $this;
    }

    /**
     * isset valueQualifier
     *
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetValueQualifier($index)
    {
        return isset($this->valueQualifier[$index]);
    }

    /**
     * unset valueQualifier
     *
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetValueQualifier($index)
    {
        unset($this->valueQualifier[$index]);
    }

    /**
     * Gets as valueQualifier
     *
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ValueQualifier[]
     */
    public function getValueQualifier()
    {
        return $this->valueQualifier;
    }

    /**
     * Sets a new valueQualifier
     *
     * BBIE
     *  Item Property. Value Qualifier. Text
     *  Text qualifying the value of the property.
     *  0..n
     *  Item Property
     *  Value Qualifier
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ValueQualifier[] $valueQualifier
     * @return self
     */
    public function setValueQualifier(?array $valueQualifier = null)
    {
        $this->valueQualifier = $valueQualifier;
        return $this;
    }

    /**
     * Gets as importanceCode
     *
     * BBIE
     *  Item Property. Importance Code. Code
     *  A code signifying the importance of this property in using it to describe a related Item.
     *  0..1
     *  Item Property
     *  Importance Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ImportanceCode
     */
    public function getImportanceCode()
    {
        return $this->importanceCode;
    }

    /**
     * Sets a new importanceCode
     *
     * BBIE
     *  Item Property. Importance Code. Code
     *  A code signifying the importance of this property in using it to describe a related Item.
     *  0..1
     *  Item Property
     *  Importance Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ImportanceCode $importanceCode
     * @return self
     */
    public function setImportanceCode(?\Ubl21\CommonBasicComponents\ImportanceCode $importanceCode = null)
    {
        $this->importanceCode = $importanceCode;
        return $this;
    }

    /**
     * Adds as listValue
     *
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\ListValue $listValue
     */
    public function addToListValue(\Ubl21\CommonBasicComponents\ListValue $listValue)
    {
        $this->listValue[] = $listValue;
        return $this;
    }

    /**
     * isset listValue
     *
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetListValue($index)
    {
        return isset($this->listValue[$index]);
    }

    /**
     * unset listValue
     *
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetListValue($index)
    {
        unset($this->listValue[$index]);
    }

    /**
     * Gets as listValue
     *
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\ListValue[]
     */
    public function getListValue()
    {
        return $this->listValue;
    }

    /**
     * Sets a new listValue
     *
     * BBIE
     *  Item Property. List Value. Text
     *  The value expressed as a text in case the property is a value in a list. For example, a colour.
     *  0..n
     *  Item Property
     *  List Value
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\ListValue[] $listValue
     * @return self
     */
    public function setListValue(?array $listValue = null)
    {
        $this->listValue = $listValue;
        return $this;
    }

    /**
     * Gets as usabilityPeriod
     *
     * ASBIE
     *  Item Property. Usability_ Period. Period
     *  The period during which this item property is valid.
     *  0..1
     *  Item Property
     *  Usability
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\UsabilityPeriod
     */
    public function getUsabilityPeriod()
    {
        return $this->usabilityPeriod;
    }

    /**
     * Sets a new usabilityPeriod
     *
     * ASBIE
     *  Item Property. Usability_ Period. Period
     *  The period during which this item property is valid.
     *  0..1
     *  Item Property
     *  Usability
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\UsabilityPeriod $usabilityPeriod
     * @return self
     */
    public function setUsabilityPeriod(?\Ubl21\CommonAggregateComponents\UsabilityPeriod $usabilityPeriod = null)
    {
        $this->usabilityPeriod = $usabilityPeriod;
        return $this;
    }

    /**
     * Adds as itemPropertyGroup
     *
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\ItemPropertyGroup $itemPropertyGroup
     */
    public function addToItemPropertyGroup(\Ubl21\CommonAggregateComponents\ItemPropertyGroup $itemPropertyGroup)
    {
        $this->itemPropertyGroup[] = $itemPropertyGroup;
        return $this;
    }

    /**
     * isset itemPropertyGroup
     *
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @param int|string $index
     * @return bool
     */
    public function issetItemPropertyGroup($index)
    {
        return isset($this->itemPropertyGroup[$index]);
    }

    /**
     * unset itemPropertyGroup
     *
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @param int|string $index
     * @return void
     */
    public function unsetItemPropertyGroup($index)
    {
        unset($this->itemPropertyGroup[$index]);
    }

    /**
     * Gets as itemPropertyGroup
     *
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @return \Ubl21\CommonAggregateComponents\ItemPropertyGroup[]
     */
    public function getItemPropertyGroup()
    {
        return $this->itemPropertyGroup;
    }

    /**
     * Sets a new itemPropertyGroup
     *
     * ASBIE
     *  Item Property. Item Property Group
     *  A description of the property group to which this item property belongs.
     *  0..n
     *  Item Property
     *  Item Property Group
     *  Item Property Group
     *  Item Property Group
     *
     * @param \Ubl21\CommonAggregateComponents\ItemPropertyGroup[] $itemPropertyGroup
     * @return self
     */
    public function setItemPropertyGroup(?array $itemPropertyGroup = null)
    {
        $this->itemPropertyGroup = $itemPropertyGroup;
        return $this;
    }

    /**
     * Gets as rangeDimension
     *
     * ASBIE
     *  Item Property. Range_ Dimension. Dimension
     *  The range of values for the dimensions of this property.
     *  0..1
     *  Item Property
     *  Range
     *  Dimension
     *  Dimension
     *  Dimension
     *
     * @return \Ubl21\CommonAggregateComponents\RangeDimension
     */
    public function getRangeDimension()
    {
        return $this->rangeDimension;
    }

    /**
     * Sets a new rangeDimension
     *
     * ASBIE
     *  Item Property. Range_ Dimension. Dimension
     *  The range of values for the dimensions of this property.
     *  0..1
     *  Item Property
     *  Range
     *  Dimension
     *  Dimension
     *  Dimension
     *
     * @param \Ubl21\CommonAggregateComponents\RangeDimension $rangeDimension
     * @return self
     */
    public function setRangeDimension(?\Ubl21\CommonAggregateComponents\RangeDimension $rangeDimension = null)
    {
        $this->rangeDimension = $rangeDimension;
        return $this;
    }

    /**
     * Gets as itemPropertyRange
     *
     * ASBIE
     *  Item Property. Item Property Range
     *  A range of values for this item property.
     *  0..1
     *  Item Property
     *  Item Property Range
     *  Item Property Range
     *  Item Property Range
     *
     * @return \Ubl21\CommonAggregateComponents\ItemPropertyRange
     */
    public function getItemPropertyRange()
    {
        return $this->itemPropertyRange;
    }

    /**
     * Sets a new itemPropertyRange
     *
     * ASBIE
     *  Item Property. Item Property Range
     *  A range of values for this item property.
     *  0..1
     *  Item Property
     *  Item Property Range
     *  Item Property Range
     *  Item Property Range
     *
     * @param \Ubl21\CommonAggregateComponents\ItemPropertyRange $itemPropertyRange
     * @return self
     */
    public function setItemPropertyRange(?\Ubl21\CommonAggregateComponents\ItemPropertyRange $itemPropertyRange = null)
    {
        $this->itemPropertyRange = $itemPropertyRange;
        return $this;
    }
}

