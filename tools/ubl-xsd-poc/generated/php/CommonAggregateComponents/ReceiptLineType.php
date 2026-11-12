<?php

namespace Ubl21\CommonAggregateComponents;

/**
 * Class representing ReceiptLineType
 *
 * ABIE
 *  Receipt Line. Details
 *  A class to define a line in a Receipt Advice.
 *  Receipt Line
 * XSD Type: ReceiptLineType
 */
class ReceiptLineType
{
    /**
     * BBIE
     *  Receipt Line. Identifier
     *  An identifier for this receipt line.
     *  1
     *  Receipt Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Receipt Line. UUID. Identifier
     *  A universally unique identifier for this receipt line.
     *  0..1
     *  Receipt Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @var \Ubl21\CommonBasicComponents\UUID $uUID
     */
    private $uUID = null;

    /**
     * BBIE
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Received_ Quantity. Quantity
     *  The quantity received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\ReceivedQuantity $receivedQuantity
     */
    private $receivedQuantity = null;

    /**
     * BBIE
     *  Receipt Line. Short_ Quantity. Quantity
     *  The quantity received short; the difference between the quantity reported despatched and the quantity actually received.
     *  0..1
     *  Receipt Line
     *  Short
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\ShortQuantity $shortQuantity
     */
    private $shortQuantity = null;

    /**
     * BBIE
     *  Receipt Line. Shortage Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a shortage.
     *  0..1
     *  Receipt Line
     *  Shortage Action Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\ShortageActionCode $shortageActionCode
     */
    private $shortageActionCode = null;

    /**
     * BBIE
     *  Receipt Line. Rejected_ Quantity. Quantity
     *  The quantity rejected.
     *  0..1
     *  Receipt Line
     *  Rejected
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\RejectedQuantity $rejectedQuantity
     */
    private $rejectedQuantity = null;

    /**
     * BBIE
     *  Receipt Line. Reject Reason Code. Code
     *  The reason for a rejection, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Reject Reason Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\RejectReasonCode $rejectReasonCode
     */
    private $rejectReasonCode = null;

    /**
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\RejectReason[] $rejectReason
     */
    private $rejectReason = [
        
    ];

    /**
     * BBIE
     *  Receipt Line. Reject Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a rejection.
     *  0..1
     *  Receipt Line
     *  Reject Action Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\RejectActionCode $rejectActionCode
     */
    private $rejectActionCode = null;

    /**
     * BBIE
     *  Receipt Line. Quantity Discrepancy Code. Code
     *  A code signifying the type of a discrepancy in quantity.
     *  0..1
     *  Receipt Line
     *  Quantity Discrepancy Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\QuantityDiscrepancyCode $quantityDiscrepancyCode
     */
    private $quantityDiscrepancyCode = null;

    /**
     * BBIE
     *  Receipt Line. Oversupply_ Quantity. Quantity
     *  The quantity over-supplied, i.e., the quantity over and above the quantity ordered.
     *  0..1
     *  Receipt Line
     *  Oversupply
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \Ubl21\CommonBasicComponents\OversupplyQuantity $oversupplyQuantity
     */
    private $oversupplyQuantity = null;

    /**
     * BBIE
     *  Receipt Line. Received_ Date. Date
     *  The date on which the goods or services were received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $receivedDate
     */
    private $receivedDate = null;

    /**
     * BBIE
     *  Receipt Line. Timing Complaint Code. Code
     *  A complaint about the timing of delivery, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Timing Complaint Code
     *  Code
     *  Code. Type
     *
     * @var \Ubl21\CommonBasicComponents\TimingComplaintCode $timingComplaintCode
     */
    private $timingComplaintCode = null;

    /**
     * BBIE
     *  Receipt Line. Timing Complaint. Text
     *  A complaint about the timing of delivery, expressed as text.
     *  0..1
     *  Receipt Line
     *  Timing Complaint
     *  Text
     *  Text. Type
     *
     * @var \Ubl21\CommonBasicComponents\TimingComplaint $timingComplaint
     */
    private $timingComplaint = null;

    /**
     * ASBIE
     *  Receipt Line. Order Line Reference
     *  A reference to the order line associated with this receipt line.
     *  0..1
     *  Receipt Line
     *  Order Line Reference
     *  Order Line Reference
     *  Order Line Reference
     *
     * @var \Ubl21\CommonAggregateComponents\OrderLineReference $orderLineReference
     */
    private $orderLineReference = null;

    /**
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @var \Ubl21\CommonAggregateComponents\DespatchLineReference[] $despatchLineReference
     */
    private $despatchLineReference = [
        
    ];

    /**
     * ASBIE
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @var \Ubl21\CommonAggregateComponents\Item[] $item
     */
    private $item = [
        
    ];

    /**
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @var \Ubl21\CommonAggregateComponents\Shipment[] $shipment
     */
    private $shipment = [
        
    ];

    /**
     * Gets as iD
     *
     * BBIE
     *  Receipt Line. Identifier
     *  An identifier for this receipt line.
     *  1
     *  Receipt Line
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
     *  Receipt Line. Identifier
     *  An identifier for this receipt line.
     *  1
     *  Receipt Line
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
     * Gets as uUID
     *
     * BBIE
     *  Receipt Line. UUID. Identifier
     *  A universally unique identifier for this receipt line.
     *  0..1
     *  Receipt Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @return \Ubl21\CommonBasicComponents\UUID
     */
    public function getUUID()
    {
        return $this->uUID;
    }

    /**
     * Sets a new uUID
     *
     * BBIE
     *  Receipt Line. UUID. Identifier
     *  A universally unique identifier for this receipt line.
     *  0..1
     *  Receipt Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @param \Ubl21\CommonBasicComponents\UUID $uUID
     * @return self
     */
    public function setUUID(?\Ubl21\CommonBasicComponents\UUID $uUID = null)
    {
        $this->uUID = $uUID;
        return $this;
    }

    /**
     * Adds as note
     *
     * BBIE
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Note. Text
     *  Free-form text conveying information that is not contained explicitly in other structures.
     *  0..n
     *  Receipt Line
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
     * Gets as receivedQuantity
     *
     * BBIE
     *  Receipt Line. Received_ Quantity. Quantity
     *  The quantity received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\ReceivedQuantity
     */
    public function getReceivedQuantity()
    {
        return $this->receivedQuantity;
    }

    /**
     * Sets a new receivedQuantity
     *
     * BBIE
     *  Receipt Line. Received_ Quantity. Quantity
     *  The quantity received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\ReceivedQuantity $receivedQuantity
     * @return self
     */
    public function setReceivedQuantity(?\Ubl21\CommonBasicComponents\ReceivedQuantity $receivedQuantity = null)
    {
        $this->receivedQuantity = $receivedQuantity;
        return $this;
    }

    /**
     * Gets as shortQuantity
     *
     * BBIE
     *  Receipt Line. Short_ Quantity. Quantity
     *  The quantity received short; the difference between the quantity reported despatched and the quantity actually received.
     *  0..1
     *  Receipt Line
     *  Short
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\ShortQuantity
     */
    public function getShortQuantity()
    {
        return $this->shortQuantity;
    }

    /**
     * Sets a new shortQuantity
     *
     * BBIE
     *  Receipt Line. Short_ Quantity. Quantity
     *  The quantity received short; the difference between the quantity reported despatched and the quantity actually received.
     *  0..1
     *  Receipt Line
     *  Short
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\ShortQuantity $shortQuantity
     * @return self
     */
    public function setShortQuantity(?\Ubl21\CommonBasicComponents\ShortQuantity $shortQuantity = null)
    {
        $this->shortQuantity = $shortQuantity;
        return $this;
    }

    /**
     * Gets as shortageActionCode
     *
     * BBIE
     *  Receipt Line. Shortage Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a shortage.
     *  0..1
     *  Receipt Line
     *  Shortage Action Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\ShortageActionCode
     */
    public function getShortageActionCode()
    {
        return $this->shortageActionCode;
    }

    /**
     * Sets a new shortageActionCode
     *
     * BBIE
     *  Receipt Line. Shortage Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a shortage.
     *  0..1
     *  Receipt Line
     *  Shortage Action Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\ShortageActionCode $shortageActionCode
     * @return self
     */
    public function setShortageActionCode(?\Ubl21\CommonBasicComponents\ShortageActionCode $shortageActionCode = null)
    {
        $this->shortageActionCode = $shortageActionCode;
        return $this;
    }

    /**
     * Gets as rejectedQuantity
     *
     * BBIE
     *  Receipt Line. Rejected_ Quantity. Quantity
     *  The quantity rejected.
     *  0..1
     *  Receipt Line
     *  Rejected
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\RejectedQuantity
     */
    public function getRejectedQuantity()
    {
        return $this->rejectedQuantity;
    }

    /**
     * Sets a new rejectedQuantity
     *
     * BBIE
     *  Receipt Line. Rejected_ Quantity. Quantity
     *  The quantity rejected.
     *  0..1
     *  Receipt Line
     *  Rejected
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\RejectedQuantity $rejectedQuantity
     * @return self
     */
    public function setRejectedQuantity(?\Ubl21\CommonBasicComponents\RejectedQuantity $rejectedQuantity = null)
    {
        $this->rejectedQuantity = $rejectedQuantity;
        return $this;
    }

    /**
     * Gets as rejectReasonCode
     *
     * BBIE
     *  Receipt Line. Reject Reason Code. Code
     *  The reason for a rejection, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Reject Reason Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\RejectReasonCode
     */
    public function getRejectReasonCode()
    {
        return $this->rejectReasonCode;
    }

    /**
     * Sets a new rejectReasonCode
     *
     * BBIE
     *  Receipt Line. Reject Reason Code. Code
     *  The reason for a rejection, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Reject Reason Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\RejectReasonCode $rejectReasonCode
     * @return self
     */
    public function setRejectReasonCode(?\Ubl21\CommonBasicComponents\RejectReasonCode $rejectReasonCode = null)
    {
        $this->rejectReasonCode = $rejectReasonCode;
        return $this;
    }

    /**
     * Adds as rejectReason
     *
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return self
     * @param \Ubl21\CommonBasicComponents\RejectReason $rejectReason
     */
    public function addToRejectReason(\Ubl21\CommonBasicComponents\RejectReason $rejectReason)
    {
        $this->rejectReason[] = $rejectReason;
        return $this;
    }

    /**
     * isset rejectReason
     *
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return bool
     */
    public function issetRejectReason($index)
    {
        return isset($this->rejectReason[$index]);
    }

    /**
     * unset rejectReason
     *
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param int|string $index
     * @return void
     */
    public function unsetRejectReason($index)
    {
        unset($this->rejectReason[$index]);
    }

    /**
     * Gets as rejectReason
     *
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\RejectReason[]
     */
    public function getRejectReason()
    {
        return $this->rejectReason;
    }

    /**
     * Sets a new rejectReason
     *
     * BBIE
     *  Receipt Line. Reject_ Reason. Text
     *  The reason for a rejection, expressed as text.
     *  0..n
     *  Receipt Line
     *  Reject
     *  Reason
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\RejectReason[] $rejectReason
     * @return self
     */
    public function setRejectReason(?array $rejectReason = null)
    {
        $this->rejectReason = $rejectReason;
        return $this;
    }

    /**
     * Gets as rejectActionCode
     *
     * BBIE
     *  Receipt Line. Reject Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a rejection.
     *  0..1
     *  Receipt Line
     *  Reject Action Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\RejectActionCode
     */
    public function getRejectActionCode()
    {
        return $this->rejectActionCode;
    }

    /**
     * Sets a new rejectActionCode
     *
     * BBIE
     *  Receipt Line. Reject Action Code. Code
     *  A code signifying the action that the delivery party wishes the despatch party to take as the result of a rejection.
     *  0..1
     *  Receipt Line
     *  Reject Action Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\RejectActionCode $rejectActionCode
     * @return self
     */
    public function setRejectActionCode(?\Ubl21\CommonBasicComponents\RejectActionCode $rejectActionCode = null)
    {
        $this->rejectActionCode = $rejectActionCode;
        return $this;
    }

    /**
     * Gets as quantityDiscrepancyCode
     *
     * BBIE
     *  Receipt Line. Quantity Discrepancy Code. Code
     *  A code signifying the type of a discrepancy in quantity.
     *  0..1
     *  Receipt Line
     *  Quantity Discrepancy Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\QuantityDiscrepancyCode
     */
    public function getQuantityDiscrepancyCode()
    {
        return $this->quantityDiscrepancyCode;
    }

    /**
     * Sets a new quantityDiscrepancyCode
     *
     * BBIE
     *  Receipt Line. Quantity Discrepancy Code. Code
     *  A code signifying the type of a discrepancy in quantity.
     *  0..1
     *  Receipt Line
     *  Quantity Discrepancy Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\QuantityDiscrepancyCode $quantityDiscrepancyCode
     * @return self
     */
    public function setQuantityDiscrepancyCode(?\Ubl21\CommonBasicComponents\QuantityDiscrepancyCode $quantityDiscrepancyCode = null)
    {
        $this->quantityDiscrepancyCode = $quantityDiscrepancyCode;
        return $this;
    }

    /**
     * Gets as oversupplyQuantity
     *
     * BBIE
     *  Receipt Line. Oversupply_ Quantity. Quantity
     *  The quantity over-supplied, i.e., the quantity over and above the quantity ordered.
     *  0..1
     *  Receipt Line
     *  Oversupply
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \Ubl21\CommonBasicComponents\OversupplyQuantity
     */
    public function getOversupplyQuantity()
    {
        return $this->oversupplyQuantity;
    }

    /**
     * Sets a new oversupplyQuantity
     *
     * BBIE
     *  Receipt Line. Oversupply_ Quantity. Quantity
     *  The quantity over-supplied, i.e., the quantity over and above the quantity ordered.
     *  0..1
     *  Receipt Line
     *  Oversupply
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \Ubl21\CommonBasicComponents\OversupplyQuantity $oversupplyQuantity
     * @return self
     */
    public function setOversupplyQuantity(?\Ubl21\CommonBasicComponents\OversupplyQuantity $oversupplyQuantity = null)
    {
        $this->oversupplyQuantity = $oversupplyQuantity;
        return $this;
    }

    /**
     * Gets as receivedDate
     *
     * BBIE
     *  Receipt Line. Received_ Date. Date
     *  The date on which the goods or services were received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * Sets a new receivedDate
     *
     * BBIE
     *  Receipt Line. Received_ Date. Date
     *  The date on which the goods or services were received.
     *  0..1
     *  Receipt Line
     *  Received
     *  Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $receivedDate
     * @return self
     */
    public function setReceivedDate(?\DateTime $receivedDate = null)
    {
        $this->receivedDate = $receivedDate;
        return $this;
    }

    /**
     * Gets as timingComplaintCode
     *
     * BBIE
     *  Receipt Line. Timing Complaint Code. Code
     *  A complaint about the timing of delivery, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Timing Complaint Code
     *  Code
     *  Code. Type
     *
     * @return \Ubl21\CommonBasicComponents\TimingComplaintCode
     */
    public function getTimingComplaintCode()
    {
        return $this->timingComplaintCode;
    }

    /**
     * Sets a new timingComplaintCode
     *
     * BBIE
     *  Receipt Line. Timing Complaint Code. Code
     *  A complaint about the timing of delivery, expressed as a code.
     *  0..1
     *  Receipt Line
     *  Timing Complaint Code
     *  Code
     *  Code. Type
     *
     * @param \Ubl21\CommonBasicComponents\TimingComplaintCode $timingComplaintCode
     * @return self
     */
    public function setTimingComplaintCode(?\Ubl21\CommonBasicComponents\TimingComplaintCode $timingComplaintCode = null)
    {
        $this->timingComplaintCode = $timingComplaintCode;
        return $this;
    }

    /**
     * Gets as timingComplaint
     *
     * BBIE
     *  Receipt Line. Timing Complaint. Text
     *  A complaint about the timing of delivery, expressed as text.
     *  0..1
     *  Receipt Line
     *  Timing Complaint
     *  Text
     *  Text. Type
     *
     * @return \Ubl21\CommonBasicComponents\TimingComplaint
     */
    public function getTimingComplaint()
    {
        return $this->timingComplaint;
    }

    /**
     * Sets a new timingComplaint
     *
     * BBIE
     *  Receipt Line. Timing Complaint. Text
     *  A complaint about the timing of delivery, expressed as text.
     *  0..1
     *  Receipt Line
     *  Timing Complaint
     *  Text
     *  Text. Type
     *
     * @param \Ubl21\CommonBasicComponents\TimingComplaint $timingComplaint
     * @return self
     */
    public function setTimingComplaint(?\Ubl21\CommonBasicComponents\TimingComplaint $timingComplaint = null)
    {
        $this->timingComplaint = $timingComplaint;
        return $this;
    }

    /**
     * Gets as orderLineReference
     *
     * ASBIE
     *  Receipt Line. Order Line Reference
     *  A reference to the order line associated with this receipt line.
     *  0..1
     *  Receipt Line
     *  Order Line Reference
     *  Order Line Reference
     *  Order Line Reference
     *
     * @return \Ubl21\CommonAggregateComponents\OrderLineReference
     */
    public function getOrderLineReference()
    {
        return $this->orderLineReference;
    }

    /**
     * Sets a new orderLineReference
     *
     * ASBIE
     *  Receipt Line. Order Line Reference
     *  A reference to the order line associated with this receipt line.
     *  0..1
     *  Receipt Line
     *  Order Line Reference
     *  Order Line Reference
     *  Order Line Reference
     *
     * @param \Ubl21\CommonAggregateComponents\OrderLineReference $orderLineReference
     * @return self
     */
    public function setOrderLineReference(?\Ubl21\CommonAggregateComponents\OrderLineReference $orderLineReference = null)
    {
        $this->orderLineReference = $orderLineReference;
        return $this;
    }

    /**
     * Adds as despatchLineReference
     *
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\DespatchLineReference $despatchLineReference
     */
    public function addToDespatchLineReference(\Ubl21\CommonAggregateComponents\DespatchLineReference $despatchLineReference)
    {
        $this->despatchLineReference[] = $despatchLineReference;
        return $this;
    }

    /**
     * isset despatchLineReference
     *
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDespatchLineReference($index)
    {
        return isset($this->despatchLineReference[$index]);
    }

    /**
     * unset despatchLineReference
     *
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDespatchLineReference($index)
    {
        unset($this->despatchLineReference[$index]);
    }

    /**
     * Gets as despatchLineReference
     *
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @return \Ubl21\CommonAggregateComponents\DespatchLineReference[]
     */
    public function getDespatchLineReference()
    {
        return $this->despatchLineReference;
    }

    /**
     * Sets a new despatchLineReference
     *
     * ASBIE
     *  Receipt Line. Despatch_ Line Reference. Line Reference
     *  A reference to a despatch line associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *  Line Reference
     *
     * @param \Ubl21\CommonAggregateComponents\DespatchLineReference[] $despatchLineReference
     * @return self
     */
    public function setDespatchLineReference(?array $despatchLineReference = null)
    {
        $this->despatchLineReference = $despatchLineReference;
        return $this;
    }

    /**
     * Adds as documentReference
     *
     * ASBIE
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     *  Receipt Line. Document Reference
     *  A reference to a document associated with this receipt line.
     *  0..n
     *  Receipt Line
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
     * Adds as item
     *
     * ASBIE
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\Item $item
     */
    public function addToItem(\Ubl21\CommonAggregateComponents\Item $item)
    {
        $this->item[] = $item;
        return $this;
    }

    /**
     * isset item
     *
     * ASBIE
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @param int|string $index
     * @return bool
     */
    public function issetItem($index)
    {
        return isset($this->item[$index]);
    }

    /**
     * unset item
     *
     * ASBIE
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @param int|string $index
     * @return void
     */
    public function unsetItem($index)
    {
        unset($this->item[$index]);
    }

    /**
     * Gets as item
     *
     * ASBIE
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @return \Ubl21\CommonAggregateComponents\Item[]
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Sets a new item
     *
     * ASBIE
     *  Receipt Line. Item
     *  An item associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Item
     *  Item
     *  Item
     *
     * @param \Ubl21\CommonAggregateComponents\Item[] $item
     * @return self
     */
    public function setItem(?array $item = null)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * Adds as shipment
     *
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @return self
     * @param \Ubl21\CommonAggregateComponents\Shipment $shipment
     */
    public function addToShipment(\Ubl21\CommonAggregateComponents\Shipment $shipment)
    {
        $this->shipment[] = $shipment;
        return $this;
    }

    /**
     * isset shipment
     *
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @param int|string $index
     * @return bool
     */
    public function issetShipment($index)
    {
        return isset($this->shipment[$index]);
    }

    /**
     * unset shipment
     *
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @param int|string $index
     * @return void
     */
    public function unsetShipment($index)
    {
        unset($this->shipment[$index]);
    }

    /**
     * Gets as shipment
     *
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @return \Ubl21\CommonAggregateComponents\Shipment[]
     */
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * Sets a new shipment
     *
     * ASBIE
     *  Receipt Line. Shipment
     *  A shipment associated with this receipt line.
     *  0..n
     *  Receipt Line
     *  Shipment
     *  Shipment
     *  Shipment
     *
     * @param \Ubl21\CommonAggregateComponents\Shipment[] $shipment
     * @return self
     */
    public function setShipment(?array $shipment = null)
    {
        $this->shipment = $shipment;
        return $this;
    }
}

