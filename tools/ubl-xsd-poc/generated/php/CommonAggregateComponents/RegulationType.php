<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing RegulationType
 *
 * ABIE
 *  Regulation. Details
 *  A class to describe a regulation.
 *  Regulation
 *  Points to regulation at atomic level
 * XSD Type: RegulationType
 */
class RegulationType
{
    /**
     * BBIE
     *  Regulation. Name
     *  A name for this regulation.
     *  1
     *  Regulation
     *  Name
     *  Name
     *  Name. Type
     *
     * @var \Ubl21\CommonBasicComponents\Name $name
     */
    private $name = null;

    /**
     * BBIE
     *  Regulation. Legal Reference. Text
     *  Text describing a legal reference.
     *  0..1
     *  Regulation
     *  Legal Reference
     *  Text
     *  Text. Type
     *  Art. 45 2 b
     *
     * @var \Ubl21\CommonBasicComponents\LegalReference $legalReference
     */
    private $legalReference = null;

    /**
     * BBIE
     *  Regulation. Ontology URI. Identifier
     *  The Uniform Resource Identifier (URI) of an ontology related to this regulation.
     *  0..1
     *  Regulation
     *  Ontology URI
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\OntologyURI $ontologyURI
     */
    private $ontologyURI = null;

    /**
     * Gets as name
     *
     * BBIE
     *  Regulation. Name
     *  A name for this regulation.
     *  1
     *  Regulation
     *  Name
     *  Name
     *  Name. Type
     *
     * @return \Ubl21\CommonBasicComponents\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a new name
     *
     * BBIE
     *  Regulation. Name
     *  A name for this regulation.
     *  1
     *  Regulation
     *  Name
     *  Name
     *  Name. Type
     *
     * @param \Ubl21\CommonBasicComponents\Name $name
     * @return self
     */
    public function setName(\Ubl21\CommonBasicComponents\Name $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets as legalReference
     *
     * BBIE
     *  Regulation. Legal Reference. Text
     *  Text describing a legal reference.
     *  0..1
     *  Regulation
     *  Legal Reference
     *  Text
     *  Text. Type
     *  Art. 45 2 b
     *
     * @return \Ubl21\CommonBasicComponents\LegalReference
     */
    public function getLegalReference()
    {
        return $this->legalReference;
    }

    /**
     * Sets a new legalReference
     *
     * BBIE
     *  Regulation. Legal Reference. Text
     *  Text describing a legal reference.
     *  0..1
     *  Regulation
     *  Legal Reference
     *  Text
     *  Text. Type
     *  Art. 45 2 b
     *
     * @param \Ubl21\CommonBasicComponents\LegalReference $legalReference
     * @return self
     */
    public function setLegalReference(?\Ubl21\CommonBasicComponents\LegalReference $legalReference = null)
    {
        $this->legalReference = $legalReference;
        return $this;
    }

    /**
     * Gets as ontologyURI
     *
     * BBIE
     *  Regulation. Ontology URI. Identifier
     *  The Uniform Resource Identifier (URI) of an ontology related to this regulation.
     *  0..1
     *  Regulation
     *  Ontology URI
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\OntologyURI
     */
    public function getOntologyURI()
    {
        return $this->ontologyURI;
    }

    /**
     * Sets a new ontologyURI
     *
     * BBIE
     *  Regulation. Ontology URI. Identifier
     *  The Uniform Resource Identifier (URI) of an ontology related to this regulation.
     *  0..1
     *  Regulation
     *  Ontology URI
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\OntologyURI $ontologyURI
     * @return self
     */
    public function setOntologyURI(?\Ubl21\CommonBasicComponents\OntologyURI $ontologyURI = null)
    {
        $this->ontologyURI = $ontologyURI;
        return $this;
    }
}

