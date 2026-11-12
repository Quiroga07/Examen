<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ExceptionNotificationLineType
 *
 * ABIE
 *  Exception Notification Line. Details
 *  A class to define a line in an Exception Notification.
 *  Exception Notification Line
 * XSD Type: ExceptionNotificationLineType
 */
class ExceptionNotificationLineType
{
    /**
     * BBIE
     *  Exception Notification Line. Identifier
     *  An identifier for this exception notification line.
     *  1
     *  Exception Notification Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Note[] $note
     */
    private $note = [
        
    ];

    /**
     * BBIE
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
     *  Description
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\Description[] $description
     */
    private $description = [
        
    ];

    /**
     * BBIE
     *  Exception Notification Line. Exception Status Code. Code
     *  A code signifying status specific to a shipment exception.
     *  0..1
     *  Exception Notification Line
     *  Exception Status Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ExceptionStatusCode $exceptionStatusCode
     */
    private $exceptionStatusCode = null;

    /**
     * BBIE
     *  Exception Notification Line. Collaboration_ Priority Code. Code
     *  Priority of Exception.
     *  0..1
     *  Exception Notification Line
     *  Collaboration
     *  Priority Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\CollaborationPriorityCode $collaborationPriorityCode
     */
    private $collaborationPriorityCode = null;

    /**
     * BBIE
     *  Exception Notification Line. Resolution Code. Code
     *  Coded representation of possible resolution methods". Possible values are: DEFAULT_TO_AVERAGE_OF_COMPARED_VALUES DEFAULT_TO_BUYERS_VALUE DEFAULT_TO_HIGH_VALUE DEFAULT_TO_LOW_VALUE DEFAULT_TO_SELLERS_VALUE MANUAL_RESOLUTION MUTUALLY_DEFINED
     *  0..1
     *  Exception Notification Line
     *  Resolution Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ResolutionCode $resolutionCode
     */
    private $resolutionCode = null;

    /**
     * BBIE
     *  Exception Notification Line. Compared Value. Measure
     *  The value that was compared with the source value that resulted in the exception
     *  1
     *  Exception Notification Line
     *  Compared Value
     *  Measure
     *  Measure. Type
     *
     * @var \Ubl21\CommonBasicComponents\ComparedValueMeasure $comparedValueMeasure
     */
    private $comparedValueMeasure = null;

    /**
     * BBIE
     *  Exception Notification Line. Source Value. Measure
     *  The value used as the basis of comparison
     *  1
     *  Exception Notification Line
     *  Source Value
     *  Measure
     *  Measure. Type
     *
     * @var \Ubl21\CommonBasicComponents\SourceValueMeasure $sourceValueMeasure
     */
    private $sourceValueMeasure = null;

    /**
     * BBIE
     *  Exception Notification Line. Variance. Quantity
     *  The variance of a data item from an expected value during a particular time interval.
     *  0..1
     *  Exception Notification Line
     *  Variance
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\VarianceQuantity $varianceQuantity
     */
    private $varianceQuantity = null;

    /**
     * BBIE
     *  Exception Notification Line. Supply Chain Activity Type Code. Code
     *  Establishes the criterion for one of the three types of exceptions: Operational, performance metric and forecast. This reports an exception notification about an operational exception. Description could be: A code used to identify an operational exception. Possible values are: CANCELED_ORDERS EMERGENCY_ORDERS ON_HAND ORDERS RECEIPTS SALES SHIPMENTS
     *  0..1
     *  Exception Notification Line
     *  Supply Chain Activity Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     */
    private $supplyChainActivityTypeCode = null;

    /**
     * BBIE
     *  Exception Notification Line. Performance Metric Type Code. Code
     *  A code used to identify a measure of performance. It defines the type of the Performance Metric on which an exception criteria is being defined
     *  0..1
     *  Exception Notification Line
     *  Performance Metric Type Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\PerformanceMetricTypeCode $performanceMetricTypeCode
     */
    private $performanceMetricTypeCode = null;

    /**
     * ASBIE
     *  Exception Notification Line. Exception Observation_ Period. Period
     *  The period (start-end date) when this exception is observed
     *  0..1
     *  Exception Notification Line
     *  Exception Observation
     *  Period
     *  Period
     *  Period
     *
     * @var \Ubl21\CommonAggregateComponents\ExceptionObservationPeriod $exceptionObservationPeriod
     */
    private $exceptionObservationPeriod = null;

    /**
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @var \Ubl21\CommonAggregateComponents\DocumentReference[] $documentReference
     */
    private $documentReference = [
        
    ];

    /**
     * ASBIE
     *  Exception Notification Line. Forecast Exception
     *  A forecast accuracy or comparison exception.
     *  0..1
     *  Exception Notification Line
     *  Forecast Exception
     *  Forecast Exception
     *  Forecast Exception
     *
     * @var \Ubl21\CommonAggregateComponents\ForecastException $forecastException
     */
    private $forecastException = null;

    /**
     * ASBIE
     *  Exception Notification Line. Supply_ Item. Item
     *  The product associated with this exception notification line.
     *  1
     *  Exception Notification Line
     *  Supply
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\SupplyItem $supplyItem
     */
    private $supplyItem = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Exception Notification Line. Identifier
     *  An identifier for this exception notification line.
     *  1
     *  Exception Notification Line
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
     *  Exception Notification Line. Identifier
     *  An identifier for this exception notification line.
     *  1
     *  Exception Notification Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\ID $iD
     * @return self
     */
    public function setID(\Ubl21\CommonBasicComponents\ID $iD)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Adds as note
     *
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\Note $note
     */
    public function addToNote(\Ubl21\CommonBasicComponents\Note $note)
    {
        $this->note[] = $note;
        return $this;
    }

    /**
     * isset note
     *
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetNote($index)
    {
        return isset($this->note[$index]);
    }

    /**
     * unset note
     *
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetNote($index)
    {
        unset($this->note[$index]);
    }

    /**
     * Gets as note
     *
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\Note[]
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets a new note
     *
     * BBIE
     *  Exception Notification Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Exception Notification Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\Note[] $note
     * @return self
     */
    public function setNote(?array $note = null)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Adds as description
     *
     * BBIE
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
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
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
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
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
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
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
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
     *  Exception Notification Line. Description. Text
     *  Text describing the exception.
     *  0..n
     *  Exception Notification Line
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
     * Gets as exceptionStatusCode
     *
     * BBIE
     *  Exception Notification Line. Exception Status Code. Code
     *  A code signifying status specific to a shipment exception.
     *  0..1
     *  Exception Notification Line
     *  Exception Status Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ExceptionStatusCode
     */
    public function getExceptionStatusCode()
    {
        return $this->exceptionStatusCode;
    }

    /**
     * Sets a new exceptionStatusCode
     *
     * BBIE
     *  Exception Notification Line. Exception Status Code. Code
     *  A code signifying status specific to a shipment exception.
     *  0..1
     *  Exception Notification Line
     *  Exception Status Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ExceptionStatusCode $exceptionStatusCode
     * @return self
     */
    public function setExceptionStatusCode(?\Ubl21\CommonBasicComponents\ExceptionStatusCode $exceptionStatusCode = null)
    {
        $this->exceptionStatusCode = $exceptionStatusCode;
        return $this;
    }

    /**
     * Gets as collaborationPriorityCode
     *
     * BBIE
     *  Exception Notification Line. Collaboration_ Priority Code. Code
     *  Priority of Exception.
     *  0..1
     *  Exception Notification Line
     *  Collaboration
     *  Priority Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\CollaborationPriorityCode
     */
    public function getCollaborationPriorityCode()
    {
        return $this->collaborationPriorityCode;
    }

    /**
     * Sets a new collaborationPriorityCode
     *
     * BBIE
     *  Exception Notification Line. Collaboration_ Priority Code. Code
     *  Priority of Exception.
     *  0..1
     *  Exception Notification Line
     *  Collaboration
     *  Priority Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\CollaborationPriorityCode $collaborationPriorityCode
     * @return self
     */
    public function setCollaborationPriorityCode(?\Ubl21\CommonBasicComponents\CollaborationPriorityCode $collaborationPriorityCode = null)
    {
        $this->collaborationPriorityCode = $collaborationPriorityCode;
        return $this;
    }

    /**
     * Gets as resolutionCode
     *
     * BBIE
     *  Exception Notification Line. Resolution Code. Code
     *  Coded representation of possible resolution methods". Possible values are: DEFAULT_TO_AVERAGE_OF_COMPARED_VALUES DEFAULT_TO_BUYERS_VALUE DEFAULT_TO_HIGH_VALUE DEFAULT_TO_LOW_VALUE DEFAULT_TO_SELLERS_VALUE MANUAL_RESOLUTION MUTUALLY_DEFINED
     *  0..1
     *  Exception Notification Line
     *  Resolution Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ResolutionCode
     */
    public function getResolutionCode()
    {
        return $this->resolutionCode;
    }

    /**
     * Sets a new resolutionCode
     *
     * BBIE
     *  Exception Notification Line. Resolution Code. Code
     *  Coded representation of possible resolution methods". Possible values are: DEFAULT_TO_AVERAGE_OF_COMPARED_VALUES DEFAULT_TO_BUYERS_VALUE DEFAULT_TO_HIGH_VALUE DEFAULT_TO_LOW_VALUE DEFAULT_TO_SELLERS_VALUE MANUAL_RESOLUTION MUTUALLY_DEFINED
     *  0..1
     *  Exception Notification Line
     *  Resolution Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ResolutionCode $resolutionCode
     * @return self
     */
    public function setResolutionCode(?\Ubl21\CommonBasicComponents\ResolutionCode $resolutionCode = null)
    {
        $this->resolutionCode = $resolutionCode;
        return $this;
    }

    /**
     * Gets as comparedValueMeasure
     *
     * BBIE
     *  Exception Notification Line. Compared Value. Measure
     *  The value that was compared with the source value that resulted in the exception
     *  1
     *  Exception Notification Line
     *  Compared Value
     *  Measure
     *  Measure. Type
     *
     * @return \Ubl21\CommonBasicComponents\ComparedValueMeasure
     */
    public function getComparedValueMeasure()
    {
        return $this->comparedValueMeasure;
    }

    /**
     * Sets a new comparedValueMeasure
     *
     * BBIE
     *  Exception Notification Line. Compared Value. Measure
     *  The value that was compared with the source value that resulted in the exception
     *  1
     *  Exception Notification Line
     *  Compared Value
     *  Measure
     *  Measure. Type
     *
     * @param \Ubl21\CommonBasicComponents\ComparedValueMeasure $comparedValueMeasure
     * @return self
     */
    public function setComparedValueMeasure(\Ubl21\CommonBasicComponents\ComparedValueMeasure $comparedValueMeasure)
    {
        $this->comparedValueMeasure = $comparedValueMeasure;
        return $this;
    }

    /**
     * Gets as sourceValueMeasure
     *
     * BBIE
     *  Exception Notification Line. Source Value. Measure
     *  The value used as the basis of comparison
     *  1
     *  Exception Notification Line
     *  Source Value
     *  Measure
     *  Measure. Type
     *
     * @return \Ubl21\CommonBasicComponents\SourceValueMeasure
     */
    public function getSourceValueMeasure()
    {
        return $this->sourceValueMeasure;
    }

    /**
     * Sets a new sourceValueMeasure
     *
     * BBIE
     *  Exception Notification Line. Source Value. Measure
     *  The value used as the basis of comparison
     *  1
     *  Exception Notification Line
     *  Source Value
     *  Measure
     *  Measure. Type
     *
     * @param \Ubl21\CommonBasicComponents\SourceValueMeasure $sourceValueMeasure
     * @return self
     */
    public function setSourceValueMeasure(\Ubl21\CommonBasicComponents\SourceValueMeasure $sourceValueMeasure)
    {
        $this->sourceValueMeasure = $sourceValueMeasure;
        return $this;
    }

    /**
     * Gets as varianceQuantity
     *
     * BBIE
     *  Exception Notification Line. Variance. Quantity
     *  The variance of a data item from an expected value during a particular time interval.
     *  0..1
     *  Exception Notification Line
     *  Variance
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\VarianceQuantity
     */
    public function getVarianceQuantity()
    {
        return $this->varianceQuantity;
    }

    /**
     * Sets a new varianceQuantity
     *
     * BBIE
     *  Exception Notification Line. Variance. Quantity
     *  The variance of a data item from an expected value during a particular time interval.
     *  0..1
     *  Exception Notification Line
     *  Variance
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\VarianceQuantity $varianceQuantity
     * @return self
     */
    public function setVarianceQuantity(?\Ubl21\CommonBasicComponents\VarianceQuantity $varianceQuantity = null)
    {
        $this->varianceQuantity = $varianceQuantity;
        return $this;
    }

    /**
     * Gets as supplyChainActivityTypeCode
     *
     * BBIE
     *  Exception Notification Line. Supply Chain Activity Type Code. Code
     *  Establishes the criterion for one of the three types of exceptions: Operational, performance metric and forecast. This reports an exception notification about an operational exception. Description could be: A code used to identify an operational exception. Possible values are: CANCELED_ORDERS EMERGENCY_ORDERS ON_HAND ORDERS RECEIPTS SALES SHIPMENTS
     *  0..1
     *  Exception Notification Line
     *  Supply Chain Activity Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCode()
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * Sets a new supplyChainActivityTypeCode
     *
     * BBIE
     *  Exception Notification Line. Supply Chain Activity Type Code. Code
     *  Establishes the criterion for one of the three types of exceptions: Operational, performance metric and forecast. This reports an exception notification about an operational exception. Description could be: A code used to identify an operational exception. Possible values are: CANCELED_ORDERS EMERGENCY_ORDERS ON_HAND ORDERS RECEIPTS SALES SHIPMENTS
     *  0..1
     *  Exception Notification Line
     *  Supply Chain Activity Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     * @return self
     */
    public function setSupplyChainActivityTypeCode(?\Ubl21\CommonBasicComponents\SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null)
    {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;
        return $this;
    }

    /**
     * Gets as performanceMetricTypeCode
     *
     * BBIE
     *  Exception Notification Line. Performance Metric Type Code. Code
     *  A code used to identify a measure of performance. It defines the type of the Performance Metric on which an exception criteria is being defined
     *  0..1
     *  Exception Notification Line
     *  Performance Metric Type Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCode()
    {
        return $this->performanceMetricTypeCode;
    }

    /**
     * Sets a new performanceMetricTypeCode
     *
     * BBIE
     *  Exception Notification Line. Performance Metric Type Code. Code
     *  A code used to identify a measure of performance. It defines the type of the Performance Metric on which an exception criteria is being defined
     *  0..1
     *  Exception Notification Line
     *  Performance Metric Type Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\PerformanceMetricTypeCode $performanceMetricTypeCode
     * @return self
     */
    public function setPerformanceMetricTypeCode(?\Ubl21\CommonBasicComponents\PerformanceMetricTypeCode $performanceMetricTypeCode = null)
    {
        $this->performanceMetricTypeCode = $performanceMetricTypeCode;
        return $this;
    }

    /**
     * Gets as exceptionObservationPeriod
     *
     * ASBIE
     *  Exception Notification Line. Exception Observation_ Period. Period
     *  The period (start-end date) when this exception is observed
     *  0..1
     *  Exception Notification Line
     *  Exception Observation
     *  Period
     *  Period
     *  Period
     *
     * @return \Ubl21\CommonAggregateComponents\ExceptionObservationPeriod
     */
    public function getExceptionObservationPeriod()
    {
        return $this->exceptionObservationPeriod;
    }

    /**
     * Sets a new exceptionObservationPeriod
     *
     * ASBIE
     *  Exception Notification Line. Exception Observation_ Period. Period
     *  The period (start-end date) when this exception is observed
     *  0..1
     *  Exception Notification Line
     *  Exception Observation
     *  Period
     *  Period
     *  Period
     *
     * @param \Ubl21\CommonAggregateComponents\ExceptionObservationPeriod $exceptionObservationPeriod
     * @return self
     */
    public function setExceptionObservationPeriod(?\Ubl21\CommonAggregateComponents\ExceptionObservationPeriod $exceptionObservationPeriod = null)
    {
        $this->exceptionObservationPeriod = $exceptionObservationPeriod;
        return $this;
    }

    /**
     * Adds as documentReference
     *
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\DocumentReference $documentReference
     */
    public function addToDocumentReference(\Ubl21\CommonAggregateComponents\DocumentReference $documentReference)
    {
        $this->documentReference[] = $documentReference;
        return $this;
    }

    /**
     * isset documentReference
     *
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocumentReference($index)
    {
        return isset($this->documentReference[$index]);
    }

    /**
     * unset documentReference
     *
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocumentReference($index)
    {
        unset($this->documentReference[$index]);
    }

    /**
     * Gets as documentReference
     *
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @return \Ubl21\CommonAggregateComponents\DocumentReference[]
     */
    public function getDocumentReference()
    {
        return $this->documentReference;
    }

    /**
     * Sets a new documentReference
     *
     * ASBIE
     *  Exception Notification Line. Document Reference
     *  A reference to Exception Criteria document can be provided.
     *  0..n
     *  Exception Notification Line
     *  Document Reference
     *  Document Reference
     *  Document Reference
     *
     * @param \Ubl21\CommonAggregateComponents\DocumentReference[] $documentReference
     * @return self
     */
    public function setDocumentReference(?array $documentReference = null)
    {
        $this->documentReference = $documentReference;
        return $this;
    }

    /**
     * Gets as forecastException
     *
     * ASBIE
     *  Exception Notification Line. Forecast Exception
     *  A forecast accuracy or comparison exception.
     *  0..1
     *  Exception Notification Line
     *  Forecast Exception
     *  Forecast Exception
     *  Forecast Exception
     *
     * @return \Ubl21\CommonAggregateComponents\ForecastException
     */
    public function getForecastException()
    {
        return $this->forecastException;
    }

    /**
     * Sets a new forecastException
     *
     * ASBIE
     *  Exception Notification Line. Forecast Exception
     *  A forecast accuracy or comparison exception.
     *  0..1
     *  Exception Notification Line
     *  Forecast Exception
     *  Forecast Exception
     *  Forecast Exception
     *
     * @param \Ubl21\CommonAggregateComponents\ForecastException $forecastException
     * @return self
     */
    public function setForecastException(?\Ubl21\CommonAggregateComponents\ForecastException $forecastException = null)
    {
        $this->forecastException = $forecastException;
        return $this;
    }

    /**
     * Gets as supplyItem
     *
     * ASBIE
     *  Exception Notification Line. Supply_ Item. Item
     *  The product associated with this exception notification line.
     *  1
     *  Exception Notification Line
     *  Supply
     *  Item
     *  Item
     *  Item
     *
     * @return \Ubl21\CommonAggregateComponents\SupplyItem
     */
    public function getSupplyItem()
    {
        return $this->supplyItem;
    }

    /**
     * Sets a new supplyItem
     *
     * ASBIE
     *  Exception Notification Line. Supply_ Item. Item
     *  The product associated with this exception notification line.
     *  1
     *  Exception Notification Line
     *  Supply
     *  Item
     *  Item
     *  Item
     *
     * @param \Ubl21\CommonAggregateComponents\SupplyItem $supplyItem
     * @return self
     */
    public function setSupplyItem(\Ubl21\CommonAggregateComponents\SupplyItem $supplyItem)
    {
        $this->supplyItem = $supplyItem;
        return $this;
    }
}

