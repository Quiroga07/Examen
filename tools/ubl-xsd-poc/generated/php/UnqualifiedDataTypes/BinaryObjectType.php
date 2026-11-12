<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\BinaryObjectType as BinaryObjectTypeBase;

/**
 * Class representing BinaryObjectType
 *
 * UBLUDT000002
 *  UDT
 *  Binary Object. Type
 *  1.0
 *  A set of finite-length sequences of binary octets.
 *  Binary Object
 *  binary
 * XSD Type: BinaryObjectType
 */
class BinaryObjectType extends BinaryObjectTypeBase
{
    /**
     * UNDT000002-SC3
     *  SC
     *  Binary Object. Mime. Code
     *  The mime type of the binary object.
     *  Binary Object
     *  Mime
     *  Code
     *  string
     *
     * @var string $mimeCode
     */
    private $mimeCode = null;

    /**
     * Gets as mimeCode
     *
     * UNDT000002-SC3
     *  SC
     *  Binary Object. Mime. Code
     *  The mime type of the binary object.
     *  Binary Object
     *  Mime
     *  Code
     *  string
     *
     * @return string
     */
    public function getMimeCode()
    {
        return $this->mimeCode;
    }

    /**
     * Sets a new mimeCode
     *
     * UNDT000002-SC3
     *  SC
     *  Binary Object. Mime. Code
     *  The mime type of the binary object.
     *  Binary Object
     *  Mime
     *  Code
     *  string
     *
     * @param string $mimeCode
     * @return self
     */
    public function setMimeCode($mimeCode)
    {
        $this->mimeCode = $mimeCode;
        return $this;
    }
}

