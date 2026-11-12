<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\MeasureType as MeasureTypeBase;

/**
 * Class representing MeasureType
 *
 * UBLUDT0000013
 *  UDT
 *  Measure. Type
 *  1.0
 *  A numeric value determined by measuring an object using a specified unit of measure.
 *  Measure
 *  Type
 *  decimal
 * XSD Type: MeasureType
 */
class MeasureType extends MeasureTypeBase
{
    /**
     * UNDT000013-SC2
     *  SC
     *  Measure. Unit. Code
     *  The type of unit of measure.
     *  Measure Unit
     *  Code
     *  Code
     *  normalizedString
     *  Reference UNECE Rec. 20 and X12 355
     *
     * @var string $unitCode
     */
    private $unitCode = null;

    /**
     * Gets as unitCode
     *
     * UNDT000013-SC2
     *  SC
     *  Measure. Unit. Code
     *  The type of unit of measure.
     *  Measure Unit
     *  Code
     *  Code
     *  normalizedString
     *  Reference UNECE Rec. 20 and X12 355
     *
     * @return string
     */
    public function getUnitCode()
    {
        return $this->unitCode;
    }

    /**
     * Sets a new unitCode
     *
     * UNDT000013-SC2
     *  SC
     *  Measure. Unit. Code
     *  The type of unit of measure.
     *  Measure Unit
     *  Code
     *  Code
     *  normalizedString
     *  Reference UNECE Rec. 20 and X12 355
     *
     * @param string $unitCode
     * @return self
     */
    public function setUnitCode($unitCode)
    {
        $this->unitCode = $unitCode;
        return $this;
    }
}

