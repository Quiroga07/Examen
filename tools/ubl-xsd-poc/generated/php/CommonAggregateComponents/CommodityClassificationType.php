<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing CommodityClassificationType
 *
 * ABIE
 *  Commodity Classification. Details
 *  A class to describe the classification of a commodity.
 *  Commodity Classification
 * XSD Type: CommodityClassificationType
 */
class CommodityClassificationType
{
    /**
     * BBIE
     *  Commodity Classification. Nature Code. Code
     *  A code defined by a specific maintenance agency signifying the high-level nature of the commodity.
     *  0..1
     *  Commodity Classification
     *  Nature Code
     *  Code
     *  Code. Type
     *  wooden products
     *
     * @var \Ubl21\CommonBasicComponents\NatureCode $natureCode
     */
    private $natureCode = null;

    /**
     * BBIE
     *  Commodity Classification. Cargo Type Code. Code
     *  A mutually agreed code signifying the type of cargo for purposes of commodity classification.
     *  0..1
     *  Commodity Classification
     *  Cargo Type Code
     *  Code
     *  Code. Type
     *  Refrigerated
     *
     * @var \Ubl21\CommonBasicComponents\CargoTypeCode $cargoTypeCode
     */
    private $cargoTypeCode = null;

    /**
     * BBIE
     *  Commodity Classification. Commodity Code. Code
     *  The harmonized international commodity code for cross border and regulatory (customs and trade statistics) purposes.
     *  0..1
     *  Commodity Classification
     *  Commodity Code
     *  Code
     *  Code. Type
     *  Harmonized Code
     *  1102222883
     *
     * @var \Ubl21\CommonBasicComponents\CommodityCode $commodityCode
     */
    private $commodityCode = null;

    /**
     * BBIE
     *  Commodity Classification. Item Classification Code. Code
     *  A code signifying the trade classification of the commodity.
     *  0..1
     *  Commodity Classification
     *  Item Classification Code
     *  Code
     *  Code. Type
     *  UN/SPSC Code
     *  3440234
     *
     * @var \Ubl21\CommonBasicComponents\ItemClassificationCode $itemClassificationCode
     */
    private $itemClassificationCode = null;

    /**
     * Gets as natureCode
     *
     * BBIE
     *  Commodity Classification. Nature Code. Code
     *  A code defined by a specific maintenance agency signifying the high-level nature of the commodity.
     *  0..1
     *  Commodity Classification
     *  Nature Code
     *  Code
     *  Code. Type
     *  wooden products
     *
     * @return \Ubl21\CommonBasicComponents\NatureCode
     */
    public function getNatureCode()
    {
        return $this->natureCode;
    }

    /**
     * Sets a new natureCode
     *
     * BBIE
     *  Commodity Classification. Nature Code. Code
     *  A code defined by a specific maintenance agency signifying the high-level nature of the commodity.
     *  0..1
     *  Commodity Classification
     *  Nature Code
     *  Code
     *  Code. Type
     *  wooden products
     *
     * @param \Ubl21\CommonBasicComponents\NatureCode $natureCode
     * @return self
     */
    public function setNatureCode(?\Ubl21\CommonBasicComponents\NatureCode $natureCode = null)
    {
        $this->natureCode = $natureCode;
        return $this;
    }

    /**
     * Gets as cargoTypeCode
     *
     * BBIE
     *  Commodity Classification. Cargo Type Code. Code
     *  A mutually agreed code signifying the type of cargo for purposes of commodity classification.
     *  0..1
     *  Commodity Classification
     *  Cargo Type Code
     *  Code
     *  Code. Type
     *  Refrigerated
     *
     * @return \Ubl21\CommonBasicComponents\CargoTypeCode
     */
    public function getCargoTypeCode()
    {
        return $this->cargoTypeCode;
    }

    /**
     * Sets a new cargoTypeCode
     *
     * BBIE
     *  Commodity Classification. Cargo Type Code. Code
     *  A mutually agreed code signifying the type of cargo for purposes of commodity classification.
     *  0..1
     *  Commodity Classification
     *  Cargo Type Code
     *  Code
     *  Code. Type
     *  Refrigerated
     *
     * @param \Ubl21\CommonBasicComponents\CargoTypeCode $cargoTypeCode
     * @return self
     */
    public function setCargoTypeCode(?\Ubl21\CommonBasicComponents\CargoTypeCode $cargoTypeCode = null)
    {
        $this->cargoTypeCode = $cargoTypeCode;
        return $this;
    }

    /**
     * Gets as commodityCode
     *
     * BBIE
     *  Commodity Classification. Commodity Code. Code
     *  The harmonized international commodity code for cross border and regulatory (customs and trade statistics) purposes.
     *  0..1
     *  Commodity Classification
     *  Commodity Code
     *  Code
     *  Code. Type
     *  Harmonized Code
     *  1102222883
     *
     * @return \Ubl21\CommonBasicComponents\CommodityCode
     */
    public function getCommodityCode()
    {
        return $this->commodityCode;
    }

    /**
     * Sets a new commodityCode
     *
     * BBIE
     *  Commodity Classification. Commodity Code. Code
     *  The harmonized international commodity code for cross border and regulatory (customs and trade statistics) purposes.
     *  0..1
     *  Commodity Classification
     *  Commodity Code
     *  Code
     *  Code. Type
     *  Harmonized Code
     *  1102222883
     *
     * @param \Ubl21\CommonBasicComponents\CommodityCode $commodityCode
     * @return self
     */
    public function setCommodityCode(?\Ubl21\CommonBasicComponents\CommodityCode $commodityCode = null)
    {
        $this->commodityCode = $commodityCode;
        return $this;
    }

    /**
     * Gets as itemClassificationCode
     *
     * BBIE
     *  Commodity Classification. Item Classification Code. Code
     *  A code signifying the trade classification of the commodity.
     *  0..1
     *  Commodity Classification
     *  Item Classification Code
     *  Code
     *  Code. Type
     *  UN/SPSC Code
     *  3440234
     *
     * @return \Ubl21\CommonBasicComponents\ItemClassificationCode
     */
    public function getItemClassificationCode()
    {
        return $this->itemClassificationCode;
    }

    /**
     * Sets a new itemClassificationCode
     *
     * BBIE
     *  Commodity Classification. Item Classification Code. Code
     *  A code signifying the trade classification of the commodity.
     *  0..1
     *  Commodity Classification
     *  Item Classification Code
     *  Code
     *  Code. Type
     *  UN/SPSC Code
     *  3440234
     *
     * @param \Ubl21\CommonBasicComponents\ItemClassificationCode $itemClassificationCode
     * @return self
     */
    public function setItemClassificationCode(?\Ubl21\CommonBasicComponents\ItemClassificationCode $itemClassificationCode = null)
    {
        $this->itemClassificationCode = $itemClassificationCode;
        return $this;
    }
}

