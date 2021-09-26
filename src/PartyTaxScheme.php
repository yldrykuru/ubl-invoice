<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class PartyTaxScheme implements XmlSerializable
{
    private $taxScheme;

    /**
     * @param TaxScheme $taxScheme.
     * @return mixed
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @param TaxScheme $taxScheme
     * @return PartyTaxScheme
     */
    public function setTaxScheme(TaxScheme $taxScheme): PartyTaxScheme
    {
        $this->taxScheme = $taxScheme;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @return void
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if ($this->taxScheme === null) {
            throw new InvalidArgumentException('Missing TaxScheme');
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
        $writer->write([
            Schema::CAC . 'TaxScheme' => $this->taxScheme
        ]);
    }
}
