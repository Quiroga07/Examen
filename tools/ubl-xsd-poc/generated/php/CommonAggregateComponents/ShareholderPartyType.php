<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ShareholderPartyType
 *
 * ABIE
 *  Shareholder Party. Details
 *  A class to describe a shareholder party.
 *  Shareholder Party
 * XSD Type: ShareholderPartyType
 */
class ShareholderPartyType
{
    /**
     * BBIE
     *  Shareholder Party. Partecipation. Percent
     *  The shareholder participation, expressed as a percentage.
     *  0..1
     *  Shareholder Party
     *  Partecipation
     *  Percent
     *  Percent. Type
     *
     * @var \Ubl21\CommonBasicComponents\PartecipationPercent $partecipationPercent
     */
    private $partecipationPercent = null;

    /**
     * ASBIE
     *  Shareholder Party. Party
     *  The shareholder party.
     *  0..1
     *  Shareholder Party
     *  Party
     *  Party
     *  Party
     *
     * @var \Ubl21\CommonAggregateComponents\Party $party
     */
    private $party = null;

    /**
     * Gets as partecipationPercent
     *
     * BBIE
     *  Shareholder Party. Partecipation. Percent
     *  The shareholder participation, expressed as a percentage.
     *  0..1
     *  Shareholder Party
     *  Partecipation
     *  Percent
     *  Percent. Type
     *
     * @return \Ubl21\CommonBasicComponents\PartecipationPercent
     */
    public function getPartecipationPercent()
    {
        return $this->partecipationPercent;
    }

    /**
     * Sets a new partecipationPercent
     *
     * BBIE
     *  Shareholder Party. Partecipation. Percent
     *  The shareholder participation, expressed as a percentage.
     *  0..1
     *  Shareholder Party
     *  Partecipation
     *  Percent
     *  Percent. Type
     *
     * @param \Ubl21\CommonBasicComponents\PartecipationPercent $partecipationPercent
     * @return self
     */
    public function setPartecipationPercent(?\Ubl21\CommonBasicComponents\PartecipationPercent $partecipationPercent = null)
    {
        $this->partecipationPercent = $partecipationPercent;
        return $this;
    }

    /**
     * Gets as party
     *
     * ASBIE
     *  Shareholder Party. Party
     *  The shareholder party.
     *  0..1
     *  Shareholder Party
     *  Party
     *  Party
     *  Party
     *
     * @return \Ubl21\CommonAggregateComponents\Party
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * Sets a new party
     *
     * ASBIE
     *  Shareholder Party. Party
     *  The shareholder party.
     *  0..1
     *  Shareholder Party
     *  Party
     *  Party
     *  Party
     *
     * @param \Ubl21\CommonAggregateComponents\Party $party
     * @return self
     */
    public function setParty(?\Ubl21\CommonAggregateComponents\Party $party = null)
    {
        $this->party = $party;
        return $this;
    }
}

