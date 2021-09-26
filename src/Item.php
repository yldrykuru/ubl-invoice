<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Item implements XmlSerializable
{
    private $name;

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Item
     */
    public function setName(?string $name): Item
    {
        $this->name = $name;
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
        $writer->write([
            Schema::CBC . 'Name' => $this->name
        ]);
    }
}
