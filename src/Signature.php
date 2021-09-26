<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Signature implements XmlSerializable
{
    private $vknTCKN;
    private $signatoryParty;
    private $digitalSignatureAttachmentURI;

    public function getVknTCKN(): ?string
    {
        return $this->vknTCKN;
    }

    public function setVknTCKN(?string $vknTCKN): Signature
    {
        $this->vknTCKN = $vknTCKN;
        return $this;
    }


    public function getSignatoryParty(): ?SignatoryParty
    {
        return $this->signatoryParty;
    }

  
    public function setSignatoryParty(?SignatoryParty $signatoryParty): Signature
    {
        $this->signatoryParty = $signatoryParty;
        return $this;
    }

 
    public function getDigitalSignatureAttachmentURI(): ?string
    {
        return $this->digitalSignatureAttachmentURI;
    }


    public function setDigitalSignatureAttachmentURI(?string $digitalSignatureAttachmentURI): Signature
    {
        $this->digitalSignatureAttachmentURI = $digitalSignatureAttachmentURI;
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
            [
                'name' => Schema::CBC . 'ID',
                'value' => $this->vknTCKN,
                'attributes' => [
                    'schemeID' => "VKN_TCKN"
                ]
            ]
        ]);

        $writer->write([
            Schema::CAC . 'SignatoryParty' => $this->signatoryParty
        ]);

        $writer->write([
            Schema::CAC . 'DigitalSignatureAttachment' => [
                Schema::CAC . 'ExternalReference' => [
                    Schema::CBC . 'URI' => $this->digitalSignatureAttachmentURI
                ]
            ]
        ]);
    }
}
