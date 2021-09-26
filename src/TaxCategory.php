<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class TaxCategory implements XmlSerializable
{

    private $taxScheme;

    /**
     * @return string
     */
    public function getTaxScheme(): ?TaxScheme
    {
        return $this->taxScheme;
    }

    /**
     * @param TaxScheme $taxScheme
     * @return TaxCategory
     */
    public function setTaxScheme(?TaxScheme $taxScheme): TaxCategory
    {
        $this->taxScheme = $taxScheme;
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

        if ($this->taxScheme !== null) {
            $writer->write([Schema::CAC . 'TaxScheme' => $this->taxScheme]);
        } else {
            $writer->write([
                Schema::CAC . 'TaxScheme' => null,
            ]);
        }
    }
}
