<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TaxScheme implements XmlSerializable
{
    private $name;
    private $taxTypeCode;


    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TaxScheme
     */
    public function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }

        /**
     * @return string
     */
    public function getTaxTypeCode(): ?string
    {
        return $this->taxTypeCode;
    }

    /**
     * @param string $taxTypeCode
     * @return TaxScheme
     */
    public function setTaxTypeCode(?string $taxTypeCode)
    {
        $this->taxTypeCode = $taxTypeCode;
        return $this;
    }

    public function xmlSerialize(Writer $writer)
    {
        if ($this->name !== null) {
            $writer->write([
                Schema::CBC . 'Name' => $this->name
            ]);
        }
        if ($this->taxTypeCode !== null) {
            $writer->write([
                Schema::CBC . 'TaxTypeCode' => $this->taxTypeCode
            ]);
        }
    }
}
