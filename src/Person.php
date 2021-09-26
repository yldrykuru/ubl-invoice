<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Person implements XmlSerializable
{
    private $firstName;
    private $familyName;

    /**
     * @return mixed
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Person
     */
    public function setFirstName(?string $firstName): Person
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * @param mixed $familyName
     * @return Country
     */
    public function setFamilyName(?string $familyName): Person
    {
        $this->familyName = $familyName;
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
            Schema::CBC . 'FirstName' => $this->firstName,
        ]);

        $writer->write([
            Schema::CBC . 'FamilyName' => $this->familyName,
        ]);
    }
}
