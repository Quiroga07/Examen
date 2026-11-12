<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\BinaryObjectType;

/**
 * Class representing VideoType
 *
 * UBLUDT000006
 *  UDT
 *  Video. Type
 *  1.0
 *  A video representation.
 *  Video
 *  binary
 * XSD Type: VideoType
 */
class VideoType extends BinaryObjectType
{
    /**
     * UNDT000006-SC3
     *  SC
     *  Video. Mime. Code
     *  The mime type of the video object.
     *  Video
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
     * UNDT000006-SC3
     *  SC
     *  Video. Mime. Code
     *  The mime type of the video object.
     *  Video
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
     * UNDT000006-SC3
     *  SC
     *  Video. Mime. Code
     *  The mime type of the video object.
     *  Video
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

