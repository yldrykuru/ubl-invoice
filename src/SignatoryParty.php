<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class SignatoryParty implements XmlSerializable
{
    private $vkn;
    private $postalAddress;

    public function getVkn(): ?string
    {
        return $this->vkn;
    }

    public function setVkn(?string $vkn): SignatoryParty
    {
        $this->vkn = $vkn;
        return $this;
    }

    public function getPostalAddress(): ?Address
    {
        return $this->postalAddress;
    }


    public function setPostalAddress(?Address $postalAddress): SignatoryParty
    {
        $this->postalAddress = $postalAddress;
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
            Schema::CAC . 'PartyIdentification' => [
                'name' => Schema::CBC . 'ID',
                'value' => $this->vkn,
                'attributes' => [
                    'schemeID' => "VKN"
                ]
            ]
        ]);

        $writer->write([
            Schema::CAC . 'PostalAddress' => $this->postalAddress,
        ]);
    }
}
