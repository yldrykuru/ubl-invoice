<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Service;

class Generator
{
    public static $currencyID;

    public static function invoice(Invoice $invoice, $currencyId = 'TRY')
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2' => 'ext',
            'urn:un:unece:uncefact:documentation:2' => 'ccts',
            'urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2' => 'qdt',
            'urn:oasis:names:specification:ubl:schema:xsd:TurkishCustomizationExtensionComponents' => 'ubltr',
            'urn:un:unece:uncefact:data:specification:UnqualifiedDataTypesSchemaModule:2' => 'udt',
            //'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2 UBL-Invoice-2.1.xsd' => 'xsi'
        ];

        return $xmlService->write('Invoice', [
            $invoice
        ]);
    }
}
