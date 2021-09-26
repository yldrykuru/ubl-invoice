<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class InvoicePeriod implements XmlSerializable
{
    private $startDate;
    private $endDate;

    /**
     * @return ?String
     */
    public function getStartDate(): ?String
    {
        return $this->startDate;
    }

    /**
     * @param ?String $startDate
     * @return InvoicePeriod
     */
    public function setStartDate(?String $startDate): InvoicePeriod
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return ?String
     */
    public function getEndDate(): ?String
    {
        return $this->endDate;
    }

    /**
     * @param ?String $endDate
     * @return InvoicePeriod
     */
    public function setEndDate(?String $endDate): InvoicePeriod
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if ($this->startDate === null && $this->endDate === null) {
            throw new InvalidArgumentException('Missing startDate or endDate');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $this->validate();

        if ($this->startDate != null) {
            $writer->write([
                Schema::CBC . 'StartDate' => $this->startDate,
            ]);
        }
        if ($this->endDate != null) {
            $writer->write([
                Schema::CBC . 'EndDate' => $this->endDate,
            ]);
        }
    }
}
