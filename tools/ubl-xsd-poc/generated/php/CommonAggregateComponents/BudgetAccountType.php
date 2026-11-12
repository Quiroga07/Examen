<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing BudgetAccountType
 *
 * ABIE
 *  Budget Account. Details
 *  A class to define a budget account.
 *  Budget Account
 * XSD Type: BudgetAccountType
 */
class BudgetAccountType
{
    /**
     * BBIE
     *  Budget Account. Identifier
     *  An identifier for the budget account, typically an internal accounting reference.
     *  0..1
     *  Budget Account
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Budget Account. Budget Year. Numeric
     *  The number of the year for this budget account, e.g. 2012
     *  0..1
     *  Budget Account
     *  Budget Year
     *  Numeric
     *  Numeric. Type
     *
     * @var \Ubl21\CommonBasicComponents\BudgetYearNumeric $budgetYearNumeric
     */
    private $budgetYearNumeric = null;

    /**
     * ASBIE
     *  Budget Account. Required_ Classification Scheme. Classification Scheme
     *  A classification scheme required for this budget account.
     *  0..1
     *  Budget Account
     *  Required
     *  Classification Scheme
     *  Classification Scheme
     *  Classification Scheme
     *
     * @var \Ubl21\CommonAggregateComponents\RequiredClassificationScheme $requiredClassificationScheme
     */
    private $requiredClassificationScheme = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Budget Account. Identifier
     *  An identifier for the budget account, typically an internal accounting reference.
     *  0..1
     *  Budget Account
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\ID
     */
    public function getID()
    {
        return $this->iD;
    }

    /**
     * Sets a new iD
     *
     * BBIE
     *  Budget Account. Identifier
     *  An identifier for the budget account, typically an internal accounting reference.
     *  0..1
     *  Budget Account
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ID $iD
     * @return self
     */
    public function setID(?\Ubl21\CommonBasicComponents\ID $iD = null)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Gets as budgetYearNumeric
     *
     * BBIE
     *  Budget Account. Budget Year. Numeric
     *  The number of the year for this budget account, e.g. 2012
     *  0..1
     *  Budget Account
     *  Budget Year
     *  Numeric
     *  Numeric. Type
     *
     * @return \Ubl21\CommonBasicComponents\BudgetYearNumeric
     */
    public function getBudgetYearNumeric()
    {
        return $this->budgetYearNumeric;
    }

    /**
     * Sets a new budgetYearNumeric
     *
     * BBIE
     *  Budget Account. Budget Year. Numeric
     *  The number of the year for this budget account, e.g. 2012
     *  0..1
     *  Budget Account
     *  Budget Year
     *  Numeric
     *  Numeric. Type
     *
     * @param \Ubl21\CommonBasicComponents\BudgetYearNumeric $budgetYearNumeric
     * @return self
     */
    public function setBudgetYearNumeric(?\Ubl21\CommonBasicComponents\BudgetYearNumeric $budgetYearNumeric = null)
    {
        $this->budgetYearNumeric = $budgetYearNumeric;
        return $this;
    }

    /**
     * Gets as requiredClassificationScheme
     *
     * ASBIE
     *  Budget Account. Required_ Classification Scheme. Classification Scheme
     *  A classification scheme required for this budget account.
     *  0..1
     *  Budget Account
     *  Required
     *  Classification Scheme
     *  Classification Scheme
     *  Classification Scheme
     *
     * @return \Ubl21\CommonAggregateComponents\RequiredClassificationScheme
     */
    public function getRequiredClassificationScheme()
    {
        return $this->requiredClassificationScheme;
    }

    /**
     * Sets a new requiredClassificationScheme
     *
     * ASBIE
     *  Budget Account. Required_ Classification Scheme. Classification Scheme
     *  A classification scheme required for this budget account.
     *  0..1
     *  Budget Account
     *  Required
     *  Classification Scheme
     *  Classification Scheme
     *  Classification Scheme
     *
     * @param \Ubl21\CommonAggregateComponents\RequiredClassificationScheme $requiredClassificationScheme
     * @return self
     */
    public function setRequiredClassificationScheme(?\Ubl21\CommonAggregateComponents\RequiredClassificationScheme $requiredClassificationScheme = null)
    {
        $this->requiredClassificationScheme = $requiredClassificationScheme;
        return $this;
    }
}

