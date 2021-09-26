<?php

namespace Yldrykuru\Ublinvoice\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.1 invoice document
 */
class SimpleInvoiceTest extends TestCase
{
    private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';

    /** @test */
    public function testIfXMLIsValid()
    {
        $invoice = (new \Yldrykuru\Ublinvoice\Invoice())
            ->setUBLVersionID("2.1")
            ->setCustomizationID("TR1.2")
            ->setProfileID("TEMELFATURA")
            ->setId("GIB20090000000001")
            ->setCopyIndicator(false)
            ->setUUID("F47AC10B-58CC-4372-A567-0E02B2C3D479")
            ->setIssueDate("2009-01-05")
            ->setIssueTime("14:42:00")
            ->setInvoiceTypeCode(\Yldrykuru\Ublinvoice\InvoiceTypeCode::SATIS)
            ->setDocumentCurrencyCode("TRY")
            ->setLineCountNumeric("1")
            ->setInvoicePeriod(
                (new \Yldrykuru\Ublinvoice\InvoicePeriod())
                    ->setStartDate("2008-12-05")
                    ->setEndDate("2009-01-05")
            )
            ->setSignature(
                (new \Yldrykuru\Ublinvoice\Signature())
                    ->setVknTCKN("1288331521")
                    ->setSignatoryParty(
                        (new \Yldrykuru\Ublinvoice\SignatoryParty())
                            ->setVkn("1288331521")
                            ->setPostalAddress(
                                (new \Yldrykuru\Ublinvoice\Address())
                                    ->setStreetName("Papatya Caddesi Yasemin Sokak")
                                    ->setBuildingNumber("21")
                                    ->setCitySubdivisionName("Beşiktaş")
                                    ->setCityName("İSTANBUL")
                                    ->setPostalZone("34100")
                            )
                    )
                    ->setDigitalSignatureAttachmentURI("#Signature")
            )
            ->setAccountingSupplierParty(
                (new \Yldrykuru\Ublinvoice\Party())
                    ->setName("AAA Anonim Şirketi")
                    ->setWebsiteURI("http://www.aaa.com.tr/")
                    ->setPostalAddress(
                        (new \Yldrykuru\Ublinvoice\Address())
                            ->setStreetName("Papatya Caddesi Yasemin Sokak")
                            ->setBuildingNumber("21")
                            ->setCitySubdivisionName("Beşiktaş")
                            ->setCityName("İstanbul")
                            ->setPostalZone("34100")
                            ->setCountry(
                                (new \Yldrykuru\Ublinvoice\Country())
                                    ->setName("Türkiye")
                            )
                    )->setContact(
                        (new \Yldrykuru\Ublinvoice\Contact())
                            ->setTelephone("(212) 925 51515")
                            ->setTelefax("(212) 925505015")
                            ->setElectronicMail("aa@aaa.com.tr")
                    )->setPartyTaxScheme(
                        (new \Yldrykuru\Ublinvoice\PartyTaxScheme())
                            ->setTaxScheme(
                                (new \Yldrykuru\Ublinvoice\TaxScheme())
                                    ->setName("Büyük Mükellefler")
                            )
                    )->setPartyIdentifications(
                        [
                            (new \Yldrykuru\Ublinvoice\PartyIdentification())->setValue("VKN", "1288331521")
                        ]
                    )
            )
            ->setAccountingCustomerParty(
                (new \Yldrykuru\Ublinvoice\Party())
                    ->setName("Deneme")
                    ->setPostalAddress(
                        (new \Yldrykuru\Ublinvoice\Address())
                            ->setStreetName("6. Sokak")
                            ->setBuildingNumber("1")
                            ->setCitySubdivisionName("Beşiktaş")
                            ->setCityName("İstanbul")
                            ->setPostalZone("34100")
                            ->setCountry(
                                (new \Yldrykuru\Ublinvoice\Country())
                                    ->setName("Türkiye")
                            )
                    )->setContact(
                        (new \Yldrykuru\Ublinvoice\Contact())
                            ->setElectronicMail("1234567890@mydn.com.tr")
                    )->setPerson(
                        (new \Yldrykuru\Ublinvoice\Person())
                            ->setFirstName("Ali")
                            ->setFamilyName("YILMAZ")
                    )->setPartyIdentifications(
                        [
                            (new \Yldrykuru\Ublinvoice\PartyIdentification())->setValue("TCKN", "1234567890"),
                            (new \Yldrykuru\Ublinvoice\PartyIdentification())->setValue("TESISATNO", "1234567"),
                            (new \Yldrykuru\Ublinvoice\PartyIdentification())->setValue("SAYACNO", "12345678")
                        ]
                    )
            )
            ->setPaymentTerms(
                (new \Yldrykuru\Ublinvoice\PaymentTerms())->setNote("BBB Bank Otomatik Ödeme")->setPaymentDueDate("2009-01-20")
            )
            ->setTaxTotal(
                (new \Yldrykuru\Ublinvoice\TaxTotal())->setTaxAmount(2.73)->addTaxSubTotal(
                    (new \Yldrykuru\Ublinvoice\TaxSubTotal())->setTaxableAmount(15.15)->setTaxAmount(2.73)->setTaxCategory(
                        (new \Yldrykuru\Ublinvoice\TaxCategory())->setTaxScheme(
                            (new \Yldrykuru\Ublinvoice\TaxScheme())->setTaxTypeCode("0015")
                        )
                    )
                )
            )
            ->setLegalMonetaryTotal(
                (new \Yldrykuru\Ublinvoice\LegalMonetaryTotal())
                    ->setLineExtensionAmount(15.15)
                    ->setTaxExclusiveAmount(15.15)
                    ->setTaxInclusiveAmount(17.88)
                    ->setPayableAmount(17.88)
            )
            ->setInvoiceLines([
                (new \Yldrykuru\Ublinvoice\InvoiceLine())
                    ->setId("1")
                    ->setInvoicedQuantity(101)
                    ->setLineExtensionAmount(15.15)
                    ->setUnitCode("KWH") //BİZİM KULLANACAĞIMIZ C62
                    ->setTaxTotal(
                        (new \Yldrykuru\Ublinvoice\TaxTotal())->setTaxAmount(2.73)->addTaxSubTotal(
                            (new \Yldrykuru\Ublinvoice\TaxSubTotal())->setTaxableAmount(15.15)->setTaxAmount(2.73)->setPercent(18.0)->setTaxCategory(
                                (new \Yldrykuru\Ublinvoice\TaxCategory())->setTaxScheme(
                                    (new \Yldrykuru\Ublinvoice\TaxScheme())->setName("KDV")->setTaxTypeCode("0015")
                                )
                            )
                        )
                    )->setItem(
                        (new \Yldrykuru\Ublinvoice\Item())->setName("Elektrik Tüketim Bedeli")
                    )
                    ->setPrice(
                        (new \Yldrykuru\Ublinvoice\Price())->setPriceAmount(0.15)->setUnitCode("KWH")
                    )
            ]);


        $generator = new \Yldrykuru\Ublinvoice\Generator();
        $outputXMLString = $generator->invoice($invoice);


        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/SimpleInvoiceTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }
}
