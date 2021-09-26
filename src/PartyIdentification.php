<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class PartyIdentification implements XmlSerializable
{
    private $schemeID;
    private $value;

    /**
     * @return mixed
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param mixed $name
     * @return PartyIdentification
     */
    public function setValue(?string $schemeID, ?string $value): PartyIdentification
    {
        $this->schemeID = $schemeID;
        $this->value = $value;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->value !== null) {
            $writer->write([
                'name' => Schema::CBC . 'ID',
                'value' => $this->value,
                'attributes' => [
                    'schemeID' => $this->schemeID
                ]
            ]);
        }
    }
}
