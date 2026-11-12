<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\AmountType as AmountTypeBase;

/**
 * Class representing AmountType
 *
 * UBLUDT000001
 *  UDT
 *  Amount. Type
 *  1.0
 *  A number of monetary units specified using a given unit of currency.
 *  Amount
 * XSD Type: AmountType
 */
class AmountType extends AmountTypeBase
{
    /**
     * UNDT000001-SC2
     *  SC
     *  Amount. Currency. Identifier
     *  The currency of the amount.
     *  Amount Currency
     *  Identification
     *  Identifier
     *  string
     *  Reference UNECE Rec 9, using 3-letter alphabetic codes.
     *
     * @var string $currencyID
     */
    private $currencyID = null;

    /**
     * Gets as currencyID
     *
     * UNDT000001-SC2
     *  SC
     *  Amount. Currency. Identifier
     *  The currency of the amount.
     *  Amount Currency
     *  Identification
     *  Identifier
     *  string
     *  Reference UNECE Rec 9, using 3-letter alphabetic codes.
     *
     * @return string
     */
    public function getCurrencyID()
    {
        return $this->currencyID;
    }

    /**
     * Sets a new currencyID
     *
     * UNDT000001-SC2
     *  SC
     *  Amount. Currency. Identifier
     *  The currency of the amount.
     *  Amount Currency
     *  Identification
     *  Identifier
     *  string
     *  Reference UNECE Rec 9, using 3-letter alphabetic codes.
     *
     * @param string $currencyID
     * @return self
     */
    public function setCurrencyID($currencyID)
    {
        $this->currencyID = $currencyID;
        return $this;
    }
}

