<?php

namespace Ubl21\UnqualifiedDataTypes;

use Ubl21\CoreComponentTypeSchemaModule\BinaryObjectType;

/**
 * Class representing SoundType
 *
 * UBLUDT000005
 *  UDT
 *  Sound. Type
 *  1.0
 *  An audio representation.
 *  Sound
 *  binary
 * XSD Type: SoundType
 */
class SoundType extends BinaryObjectType
{
    /**
     * UNDT000005-SC3
     *  SC
     *  Sound. Mime. Code
     *  The mime type of the sound object.
     *  Sound
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
     * UNDT000005-SC3
     *  SC
     *  Sound. Mime. Code
     *  The mime type of the sound object.
     *  Sound
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
     * UNDT000005-SC3
     *  SC
     *  Sound. Mime. Code
     *  The mime type of the sound object.
     *  Sound
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

