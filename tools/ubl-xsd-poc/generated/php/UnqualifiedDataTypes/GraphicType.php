<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\BinaryObjectType;

/**
 * Class representing GraphicType
 *
 * UBLUDT000003
 *  UDT
 *  Graphic. Type
 *  1.0
 *  A diagram, graph, mathematical curve, or similar representation.
 *  Graphic
 *  binary
 * XSD Type: GraphicType
 */
class GraphicType extends BinaryObjectType
{
    /**
     * UNDT000003-SC3
     *  SC
     *  Graphic. Mime. Code
     *  The mime type of the graphic object.
     *  Graphic
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
     * UNDT000003-SC3
     *  SC
     *  Graphic. Mime. Code
     *  The mime type of the graphic object.
     *  Graphic
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
     * UNDT000003-SC3
     *  SC
     *  Graphic. Mime. Code
     *  The mime type of the graphic object.
     *  Graphic
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

