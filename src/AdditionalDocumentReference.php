<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class AdditionalDocumentReference implements XmlSerializable
{
    private $ID;
    private $IssueDate;
    private $DocumentType;
    private $EmbeddedDocumentBinaryObject;

    /**
     * @return mixed
     */
    public function getID(): ?string
    {
        return $this->ID;
    }

    /**
     * @param mixed $name
     * @return Country
     */
    public function setID(?string $ID): AdditionalDocumentReference
    {
        $this->ID = $ID;
        return $this;
    }

    public function getIssueDate(): ?string
    {
        return $this->IssueDate;
    }

    /**
     * @param mixed $name
     * @return Country
     */
    public function setIssueDate(?string $IssueDate): AdditionalDocumentReference
    {
        $this->IssueDate = $IssueDate;
        return $this;
    }

    public function getDocumentType(): ?string
    {
        return $this->DocumentType;
    }

    /**
     * @param mixed $name
     * @return Country
     */
    public function setDocumentType(?string $DocumentType): AdditionalDocumentReference
    {
        $this->DocumentType = $DocumentType;
        return $this;
    }

    public function getEmbeddedDocumentBinaryObject(): ?string
    {
        return $this->EmbeddedDocumentBinaryObject;
    }

    /**
     * @param mixed $name
     * @return Country
     */
    public function setEmbeddedDocumentBinaryObject(?string $EmbeddedDocumentBinaryObject): AdditionalDocumentReference
    {
        $this->EmbeddedDocumentBinaryObject = $EmbeddedDocumentBinaryObject;
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
            Schema::CBC . "ID" => $this->ID,
            Schema::CBC . "IssueDate" => $this->IssueDate
        ]);

        if($this->DocumentType != null) {
            $writer->write([
                Schema::CBC . "DocumentType" => $this->DocumentType
            ]);
        }

        if($this->EmbeddedDocumentBinaryObject != null){
            $writer->write([
                Schema::CAC . "Attachment" =>
                    [
                        [
                            'name' => Schema::CBC . 'EmbeddedDocumentBinaryObject',
                            'value' => '',
                            'attributes' => [
                                'characterSetCode' => 'UTF-8',
                                'encodingCode' => 'Base64',
                                'filename' => $this->EmbeddedDocumentBinaryObject,
                                'mimeCode' => 'application/xml'
                            ]
                        ]
                    ]
            ]);
        }
    }
}
