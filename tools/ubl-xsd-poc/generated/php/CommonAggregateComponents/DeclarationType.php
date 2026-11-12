<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing DeclarationType
 *
 * ABIE
 *  Declaration. Details
 *  A class to describe a declaration by an economic operator of certain characteristics or capabilities in fulfilment of requirements specified in a call for tenders.
 *  Declaration
 * XSD Type: DeclarationType
 */
class DeclarationType
{
    /**
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @var \Ubl21\CommonBasicComponents\Name[] $name
     */
    private $name = [
        
    ];

    /**
     * BBIE
     *  Declaration. Declaration Type Code. Code
     *  A code signifying the type of this declaration.
     *  0..1
     *  Declaration
     *  Declaration Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\DeclarationTypeCode $declarationTypeCode
     */
    private $declarationTypeCode = null;

    /**
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @var \Ubl21\CommonAggregateComponents\EvidenceSupplied[] $evidenceSupplied
     */
    private $evidenceSupplied = [
        
    ];

    /**
     * Adds as name
     *
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Name $name
     */
    public function addToName(\Ubl21\CommonBasicComponents\Name $name)
    {
        $this->name[] = $name;
        return $this;
    }

    /**
     * isset name
     *
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetName($index)
    {
        return isset($this->name[$index]);
    }

    /**
     * unset name
     *
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetName($index)
    {
        unset($this->name[$index]);
    }

    /**
     * Gets as name
     *
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @return \Ubl21\CommonBasicComponents\Name[]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * BBIE
     *  Declaration. Name
     *  The name of this declaration.
     *  0..n
     *  Declaration
     *  Name
     *  Name
     *  Name. Type
     *
     * @param \Ubl21\CommonBasicComponents\Name[] $name
     * @return self
     */
    public function setName(?array $name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as declarationTypeCode
     *
     * BBIE
     *  Declaration. Declaration Type Code. Code
     *  A code signifying the type of this declaration.
     *  0..1
     *  Declaration
     *  Declaration Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\DeclarationTypeCode
     */
    public function getDeclarationTypeCode()
    {
        return $this->declarationTypeCode;
    }

    /**
     * Sets a new declarationTypeCode
     *
     * BBIE
     *  Declaration. Declaration Type Code. Code
     *  A code signifying the type of this declaration.
     *  0..1
     *  Declaration
     *  Declaration Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\DeclarationTypeCode $declarationTypeCode
     * @return self
     */
    public function setDeclarationTypeCode(?\Ubl21\CommonBasicComponents\DeclarationTypeCode $declarationTypeCode = null)
    {
        $this->declarationTypeCode = $declarationTypeCode;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Description $description
     */
    public function addToDescription(\Ubl21\CommonBasicComponents\Description $description)
    {
        $this->description[] = $description;
        return $this;
    }

    /**
     * isset description
     *
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDescription($index)
    {
        return isset($this->description[$index]);
    }

    /**
     * unset description
     *
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDescription($index)
    {
        unset($this->description[$index]);
    }

    /**
     * Gets as description
     *
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Description[]
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets a new description
     *
     * BBIE
     *  Declaration. Description. Text
     *  Text describing this declaration.
     *  0..n
     *  Declaration
     *  Description
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Description[] $description
     * @return self
     */
    public function setDescription(?array $description = null)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Adds as evidenceSupplied
     *
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\EvidenceSupplied $evidenceSupplied
     */
    public function addToEvidenceSupplied(\Ubl21\CommonAggregateComponents\EvidenceSupplied $evidenceSupplied)
    {
        $this->evidenceSupplied[] = $evidenceSupplied;
        return $this;
    }

    /**
     * isset evidenceSupplied
     *
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param int|string $index
     * @return bool
     */
    public function issetEvidenceSupplied($index)
    {
        return isset($this->evidenceSupplied[$index]);
    }

    /**
     * unset evidenceSupplied
     *
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param int|string $index
     * @return void
     */
    public function unsetEvidenceSupplied($index)
    {
        unset($this->evidenceSupplied[$index]);
    }

    /**
     * Gets as evidenceSupplied
     *
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @return \Ubl21\CommonAggregateComponents\EvidenceSupplied[]
     */
    public function getEvidenceSupplied()
    {
        return $this->evidenceSupplied;
    }

    /**
     * Sets a new evidenceSupplied
     *
     * ASBIE
     *  Declaration. Evidence Supplied
     *  The evidence supporting this declaration.
     *  0..n
     *  Declaration
     *  Evidence Supplied
     *  Evidence Supplied
     *  Evidence Supplied
     *
     * @param \Ubl21\CommonAggregateComponents\EvidenceSupplied[] $evidenceSupplied
     * @return self
     */
    public function setEvidenceSupplied(?array $evidenceSupplied = null)
    {
        $this->evidenceSupplied = $evidenceSupplied;
        return $this;
    }
}

