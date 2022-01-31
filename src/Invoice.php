<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class Invoice implements XmlSerializable
{

    //private $UBLExtensions;
    private $UBLVersionID = '2.1';
    private $customizationID = 'TR1.2';
    private $profileID;
    private $id;
    private $copyIndicator;
    private $uuid;
    private $issueDate;
    private $issueTime;
    private $invoiceTypeCode = InvoiceTypeCode::SATIS;
    private $note;
    private $documentCurrencyCode = 'TRY';
    private $lineCountNumeric;
    private $additionalDocumentReferences;
    private $invoicePeriod;
    private $signature;
    private $accountingSupplierParty;
    private $accountingCustomerParty;
    private $paymentTerms;
    private $taxTotal;
    private $legalMonetaryTotal;
    private $invoiceLines;

    //#region UBLVersionID
    ///**
    // * @return string
    // */
    //public function getUBLExtensions(): ?string
    //{
    //    return $this->UBLExtensions;
    //}
    //
    ///**
    // * @param string $UBLVersionID
    // * eg. '2.0', '2.1', '2.2', ...
    // * @return Invoice
    // */
    //public function setUBLExtensions(?string $UBLExtensions): Invoice
    //{
    //    $this->UBLExtensions = $UBLExtensions;
    //    return $this;
    //}
    //#endregion
    public function __construct()
    {
        $this->additionalDocumentReferences = [];
    }
    #region UBLVersionID
    /**
     * @return string
     */
    public function getUBLVersionID(): ?string
    {
        return $this->UBLVersionID;
    }

    /**
     * @param string $UBLVersionID
     * eg. '2.0', '2.1', '2.2', ...
     * @return Invoice
     */
    public function setUBLVersionID(?string $UBLVersionID): Invoice
    {
        $this->UBLVersionID = $UBLVersionID;
        return $this;
    }
    #endregion

    #region CustomizationID
    /**
     * @param mixed $customizationID
     * @return Invoice
     */
    public function setCustomizationID(?string $id): Invoice
    {
        $this->customizationID = $id;
        return $this;
    }
    #endregion

    #region ProfileID
    /**
     * @param mixed $profileID
     * @return Invoice
     */
    public function setProfileID(?string $profileID): Invoice
    {
        $this->profileID = $profileID;
        return $this;
    }
    #endregion

    #region ID
    /**
     * @return mixed
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Invoice
     */
    public function setId(?string $id): Invoice
    {
        $this->id = $id;
        return $this;
    }
    #endregion

    #region Note
    /**
     * @return mixed
     */
    public function netNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param mixed $id
     * @return Invoice
     */
    public function setNote(?string $note): Invoice
    {
        $this->note = $note;
        return $this;
    }
    #endregion

    #region CopyIndicator
    /**
     * @return bool
     */
    public function isCopyIndicator(): bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param bool $copyIndicator
     * @return Invoice
     */
    public function setCopyIndicator(bool $copyIndicator): Invoice
    {
        $this->copyIndicator = $copyIndicator;
        return $this;
    }
    #endregion

    #region UUID
    /**
     * @param mixed $customizationID
     * @return Invoice
     */
    public function setUUID(?string $UUID): Invoice
    {
        $this->uuid = $UUID;
        return $this;
    }
    #endregion

    #region issueDate
    /**
     * @return String
     */
    public function getIssueDate(): ?String
    {
        return $this->issueDate;
    }

    /**
     * @param String $issueDate
     * @return Invoice
     */
    public function setIssueDate(String $issueDate): Invoice
    {
        $this->issueDate = $issueDate;
        return $this;
    }
    #endregion

    #region issueTime
    /**
     * @return String
     */
    public function getIssueTime(): ?String
    {
        return $this->issueTime;
    }

    /**
     * @param String $dueDate
     * @return Invoice
     */
    public function setIssueTime(String $issueTime): Invoice
    {
        $this->issueTime = $issueTime;
        return $this;
    }
    #endregion

    #region invoiceTypeCode
    /**
     * @return string
     */
    public function getInvoiceTypeCode(): ?string
    {
        return $this->invoiceTypeCode;
    }

    /**
     * @param string $invoiceTypeCode
     * See also: src/InvoiceTypeCode.php
     * @return Invoice
     */
    public function setInvoiceTypeCode(string $invoiceTypeCode): Invoice
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
        return $this;
    }
    #endregion

    #region DocumentCurrencyCode
    /**
     * @param mixed $currencyCode
     * @return Invoice
     */
    public function setDocumentCurrencyCode(string $currencyCode = 'TRY'): Invoice
    {
        $this->documentCurrencyCode = $currencyCode;
        return $this;
    }
    #endregion

    #region LineCountNumeric
    /**
     * @return string
     */
    public function getLineCountNumeric()
    {
        return $this->lineCountNumeric;
    }

    /**
     * @param int $lineCountNumeric
     * @return Invoice
     */
    public function setLineCountNumeric(int $lineCountNumeric)
    {
        $this->lineCountNumeric = $lineCountNumeric;
        return $this;
    }
    #endregion

    #region InvoicePeriod
    /**
     * @return InvoicePeriod
     */
    public function getInvoicePeriod(): ?InvoicePeriod
    {
        return $this->invoicePeriod;
    }

    /**
     * @param InvoicePeriod $invoicePeriod
     * @return Invoice
     */
    public function setInvoicePeriod(InvoicePeriod $invoicePeriod): Invoice
    {
        $this->invoicePeriod = $invoicePeriod;
        return $this;
    }

    #endregion

    #region Signature
    /**
     * @return Signature
     */
    public function getSignature(): ?Signature
    {
        return $this->signature;
    }

    /**
     * @param Signature $invoicePeriod
     * @return Invoice
     */
    public function setSignature(Signature $signature): Invoice
    {
        $this->signature = $signature;
        return $this;
    }
    #endregion

    #region accountingSupplierParty
    /**
     * @return Party
     */
    public function getAccountingSupplierParty(): ?Party
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @param Party $accountingSupplierParty
     * @return Invoice
     */
    public function setAccountingSupplierParty(Party $accountingSupplierParty): Invoice
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
        return $this;
    }
    #endregion

    #region accountingCustomerParty
    /**
     * @return Party
     */
    public function getAccountingCustomerParty(): ?Party
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @param Party $accountingCustomerParty
     * @return Invoice
     */
    public function setAccountingCustomerParty(Party $accountingCustomerParty): Invoice
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }
    #endregion

    #region paymentTerms
    /**
     * @return PaymentTerms
     */
    public function getPaymentTerms(): ?PaymentTerms
    {
        return $this->paymentTerms;
    }

    /**
     * @param PaymentTerms $paymentTerms
     * @return Invoice
     */
    public function setPaymentTerms(PaymentTerms $paymentTerms): Invoice
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }
    #endregion

    #region TaxTotal
    /**
     * @return TaxTotal
     */
    public function getTaxTotal(): ?TaxTotal
    {
        return $this->taxTotal;
    }

    /**
     * @param TaxTotal $taxTotal
     * @return Invoice
     */
    public function setTaxTotal(TaxTotal $taxTotal): Invoice
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }
    #endregion

    #region LegalMonetaryTotal
    /**
     * @return LegalMonetaryTotal
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @param LegalMonetaryTotal $legalMonetaryTotal
     * @return Invoice
     */
    public function setLegalMonetaryTotal(LegalMonetaryTotal $legalMonetaryTotal): Invoice
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
        return $this;
    }
    #endregion LegalMonetaryTotal

    #region InvoiceLine
    /**
     * @return InvoiceLine[]
     */
    public function getInvoiceLines(): ?array
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLine[] $invoiceLines
     * @return Invoice
     */
    public function setInvoiceLines(array $invoiceLines): Invoice
    {
        $this->invoiceLines = $invoiceLines;
        return $this;
    }
    #endregion

    #region AdditionalDocumentReference
    /**
     * @return $additionalDocumentReference
     */
    public function getAdditionalDocumentReferences(): ?array
    {
        return $this->additionalDocumentReferences;
    }

    /**
     * @param $additionalDocumentReference
     * @return Invoice
     */
    public function setAdditionalDocumentReferences(array $additionalDocumentReferences): Invoice
    {
        array_push($this->additionalDocumentReferences,$additionalDocumentReferences);
        return $this;
    }
    #endregion
    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @return void
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if ($this->id === null) {
            throw new InvalidArgumentException('Missing invoice id');
        }

        if (!$this->issueDate === null) {
            throw new InvalidArgumentException('Invalid invoice issueDate');
        }

        if ($this->invoiceTypeCode === null) {
            throw new InvalidArgumentException('Missing invoice invoiceTypeCode');
        }

        if ($this->accountingSupplierParty === null) {
            throw new InvalidArgumentException('Missing invoice accountingSupplierParty');
        }

        if ($this->accountingCustomerParty === null) {
            throw new InvalidArgumentException('Missing invoice accountingCustomerParty');
        }

        if ($this->invoiceLines === null) {
            throw new InvalidArgumentException('Missing invoice lines');
        }

        if ($this->legalMonetaryTotal === null) {
            throw new InvalidArgumentException('Missing invoice LegalMonetaryTotal');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $this->validate();

        /*$writer->write([
            Schema::EXT . 'UBLExtensions' => [
                Schema::EXT . 'UBLExtension' => [
                    Schema::EXT . 'ExtensionContent' => [

                    ]
                ]
            ]
        ]);*/

        $writer->write([
            Schema::CBC . 'UBLVersionID' => $this->UBLVersionID,
            Schema::CBC . 'CustomizationID' => $this->customizationID,
            Schema::CBC . 'ProfileID' => $this->profileID,
            Schema::CBC . 'ID' => $this->id,
        ]);

        if ($this->copyIndicator !== null) {
            $writer->write([
                Schema::CBC . 'CopyIndicator' => $this->copyIndicator ? 'true' : 'false'
            ]);
        }

        $writer->write([
            Schema::CBC . 'UUID' => $this->uuid
        ]);

        if ($this->issueDate !== null) {
            $writer->write([
                Schema::CBC . 'IssueDate' => $this->issueDate,
            ]);
        }

        if ($this->issueTime !== null) {
            $writer->write([
                Schema::CBC . 'IssueTime' => $this->issueTime,
            ]);
        }

        if ($this->invoiceTypeCode !== null) {
            $writer->write([
                Schema::CBC . 'InvoiceTypeCode' => $this->invoiceTypeCode
            ]);
        }

        $writer->write([
            Schema::CBC . 'Note' => $this->note,
        ]);
        $writer->write([
            'name' => Schema::CBC . 'DocumentCurrencyCode',
            'value' => $this->documentCurrencyCode,
            'attributes' => [
                'listAgencyName' => 'United Nations Economic Commission for Europe',
                'listID' => 'ISO 4217 Alpha',
                'listName' => 'Currency',
                'listVersionID' => '2001',
            ]
        ]);

        $writer->write([
            Schema::CBC . 'LineCountNumeric' => $this->lineCountNumeric,
        ]);

        foreach($this->additionalDocumentReferences as $additionalDocumentReference)
        {
            $writer->write([
                Schema::CAC . 'AdditionalDocumentReference' => $additionalDocumentReference,
            ]);
        }

        if ($this->invoicePeriod != null) {
            $writer->write([
                Schema::CAC . 'InvoicePeriod' => $this->invoicePeriod
            ]);
        }

        if ($this->signature != null) {
            $writer->write([
                Schema::CAC . 'Signature' => $this->signature
            ]);
        }

        $writer->write([
            Schema::CAC . 'AccountingSupplierParty' => [Schema::CAC . "Party" => $this->accountingSupplierParty],
            Schema::CAC . 'AccountingCustomerParty' => [Schema::CAC . "Party" => $this->accountingCustomerParty],
        ]);

        if ($this->paymentTerms !== null) {
            $writer->write([
                Schema::CAC . 'PaymentTerms' => $this->paymentTerms
            ]);
        }

        if ($this->taxTotal !== null) {
            $writer->write([
                Schema::CAC . 'TaxTotal' => $this->taxTotal
            ]);
        }

        $writer->write([
            Schema::CAC . 'LegalMonetaryTotal' => $this->legalMonetaryTotal
        ]);

        foreach ($this->invoiceLines as $invoiceLine) {
            $writer->write([
                Schema::CAC . 'InvoiceLine' => $invoiceLine
            ]);
        }
    }
}
