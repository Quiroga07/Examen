<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\BinaryObjectType;

/**
 * Class representing PictureType
 *
 * UBLUDT000004
 *  UDT
 *  Picture. Type
 *  1.0
 *  A diagram, graph, mathematical curve, or similar representation.
 *  Picture
 *  binary
 * XSD Type: PictureType
 */
class PictureType extends BinaryObjectType
{
    /**
     * UNDT000004-SC3
     *  SC
     *  Picture. Mime. Code
     *  The mime type of the picture object.
     *  Picture
     *  Mime
     *  Code
     *  normalizedString
     *
     * @var string $mimeCode
     */
    private $mimeCode = null;

    /**
     * Gets as mimeCode
     *
     * UNDT000004-SC3
     *  SC
     *  Picture. Mime. Code
     *  The mime type of the picture object.
     *  Picture
     *  Mime
     *  Code
     *  normalizedString
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
     * UNDT000004-SC3
     *  SC
     *  Picture. Mime. Code
     *  The mime type of the picture object.
     *  Picture
     *  Mime
     *  Code
     *  normalizedString
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

