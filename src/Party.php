<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Party implements XmlSerializable
{
    private $name;
    private $websiteURI;
    private $partyIdentifications;
    private $postalAddress;
    private $contact;
    private $person;
    private $partyTaxScheme;


    #region Name

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Party
     */
    public function setName(?string $name): Party
    {
        $this->name = $name;
        return $this;
    }

    #endregion

    #region websiteURI
    /**
     * @return string
     */
    public function getWebsiteURI(): ?string
    {
        return $this->websiteURI;
    }

    /**
     * @param string $websiteURI
     * @return Party
     */
    public function setWebsiteURI(?string $websiteURI): Party
    {
        $this->websiteURI = $websiteURI;
        return $this;
    }
    #endregion

    #region partyIdentifications
    /**
     * @return string
     */
    public function getPartyIdentifications(): ?array
    {
        return $this->partyIdentificationId;
    }

    /**
     * @param array $partyIdentifications
     * @return PartyIdentification
     */
    public function setPartyIdentifications(?array $partyIdentifications): Party
    {
        $this->partyIdentifications = $partyIdentifications;
        return $this;
    }
    #endregion

    #region postalAddress
    /**
     * @return Address
     */
    public function getPostalAddress(): ?Address
    {
        return $this->postalAddress;
    }

    /**
     * @param Address $postalAddress
     * @return Party
     */
    public function setPostalAddress(?Address $postalAddress): Party
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }
    #endregion

    #region Contact
    /**
     * @return Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Party
     */
    public function setContact(?Contact $contact): Party
    {
        $this->contact = $contact;
        return $this;
    }
    #endregion

    #region Person
    /**
     * @return string
     */
    public function getPerson(): ?Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     * @return Party
     */
    public function setPerson(?Person $person): Party
    {
        $this->person = $person;
        return $this;
    }
    #endregion

    #region TaxScheme
    /**
     * @return PartyTaxScheme
     */
    public function getPartyTaxScheme(): ?PartyTaxScheme
    {
        return $this->partyTaxScheme;
    }

    /**
     * @param PartyTaxScheme $partyTaxScheme
     * @return Party
     */
    public function setPartyTaxScheme(PartyTaxScheme $partyTaxScheme)
    {
        $this->partyTaxScheme = $partyTaxScheme;
        return $this;
    }
    #endregion

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        /*if ($this->name !== null)
        {
            $writer->write([
                Schema::CBC . 'WebsiteURI' => $this->websiteURI
            ]);
        }*/

        if ($this->partyIdentifications !== null) {
            foreach ($this->partyIdentifications as $partyIdentification) {
                $writer->write([
                    Schema::CAC . 'PartyIdentification' => $partyIdentification
                ]);
            }
        }

        if ($this->name !== null) {
            $writer->write([
                Schema::CAC . 'PartyName' => [
                    Schema::CBC . 'Name' => $this->name
                ]
            ]);
        }

        $writer->write([
            Schema::CAC . 'PostalAddress' => $this->postalAddress
        ]);

        if ($this->partyTaxScheme !== null) {
            $writer->write([
                Schema::CAC . 'PartyTaxScheme' => $this->partyTaxScheme
            ]);
        }

        if ($this->contact !== null) {
            $writer->write([
                Schema::CAC . 'Contact' => $this->contact
            ]);
        }

        if ($this->person !== null) {
            $writer->write([
                Schema::CAC . 'Person' => $this->person
            ]);
        }
    }
}
