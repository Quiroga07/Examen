<?php

namespace Ubl21\Xades\V132;

/**
 * Class representing OCSPIdentifierType
 *
 *
 * XSD Type: OCSPIdentifierType
 */
class OCSPIdentifierType
{
    /**
     * @var string $uRI
     */
    private $uRI = null;

    /**
     * @var \Ubl21\Xades\V132\ResponderIDType $responderID
     */
    private $responderID = null;

    /**
     * @var \DateTime $producedAt
     */
    private $producedAt = null;

    /**
     * Gets as uRI
     *
     * @return string
     */
    public function getURI()
    {
        return $this->uRI;
    }

    /**
     * Sets a new uRI
     *
     * @param string $uRI
     * @return self
     */
    public function setURI($uRI)
    {
        $this->uRI = $uRI;
        return $this;
    }

    /**
     * Gets as responderID
     *
     * @return \Ubl21\Xades\V132\ResponderIDType
     */
    public function getResponderID()
    {
        return $this->responderID;
    }

    /**
     * Sets a new responderID
     *
     * @param \Ubl21\Xades\V132\ResponderIDType $responderID
     * @return self
     */
    public function setResponderID(\Ubl21\Xades\V132\ResponderIDType $responderID)
    {
        $this->responderID = $responderID;
        return $this;
    }

    /**
     * Gets as producedAt
     *
     * @return \DateTime
     */
    public function getProducedAt()
    {
        return $this->producedAt;
    }

    /**
     * Sets a new producedAt
     *
     * @param \DateTime $producedAt
     * @return self
     */
    public function setProducedAt(\DateTime $producedAt)
    {
        $this->producedAt = $producedAt;
        return $this;
    }
}

