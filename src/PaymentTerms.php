<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class PaymentTerms implements XmlSerializable
{
    private $note;
    private $paymentDueDate;

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return PaymentTerms
     */
    public function setNote(?string $note): PaymentTerms
    {
        $this->note = $note;
        return $this;
    }

    #region issueDate
    /**
     * @return String
     */
    public function getPaymentDueDate(): ?String
    {
        return $this->paymentDueDate;
    }

    /**
     * @param String $issueDate
     * @return Invoice
     */
    public function setPaymentDueDate(String $paymentDueDate): PaymentTerms
    {
        $this->paymentDueDate = $paymentDueDate;
        return $this;
    }
    #endregion


    public function xmlSerialize(Writer $writer)
    {
        if ($this->note !== null) {
            $writer->write([Schema::CBC . 'Note' => $this->note]);
        }

        if ($this->paymentDueDate !== null) {
            $writer->write([Schema::CBC . 'PaymentDueDate' => $this->paymentDueDate]);
        }
    }
}
