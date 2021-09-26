<?php

namespace Yldrykuru\Ublinvoice;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class AllowanceCharge implements XmlSerializable
{
    private $chargeIndicator;
    private $multiplierFactorNumeric;
    private $baseAmount;
    private $amount;

    /**
     * @return bool
     */
    public function isChargeIndicator(): bool
    {
        return $this->chargeIndicator;
    }

    /**
     * @param bool $chargeIndicator
     * @return AllowanceCharge
     */
    public function setChargeIndicator(bool $chargeIndicator): AllowanceCharge
    {
        $this->chargeIndicator = $chargeIndicator;
        return $this;
    }


    /**
     * @return int
     */
    public function getMultiplierFactorNumeric(): ?int
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * @param int $multiplierFactorNumeric
     * @return AllowanceCharge
     */
    public function setMultiplierFactorNumeric(?int $multiplierFactorNumeric): AllowanceCharge
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseAmount(): ?float
    {
        return $this->baseAmount;
    }

    /**
     * @param float $baseAmount
     * @return AllowanceCharge
     */
    public function setBaseAmount(?float $baseAmount): AllowanceCharge
    {
        $this->baseAmount = $baseAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return AllowanceCharge
     */
    public function setAmount(?float $amount): AllowanceCharge
    {
        $this->amount = $amount;
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
            Schema::CBC . 'ChargeIndicator' => $this->chargeIndicator ? 'true' : 'false',
        ]);

        if ($this->multiplierFactorNumeric !== null) {
            $writer->write([
                Schema::CBC . 'MultiplierFactorNumeric' => $this->multiplierFactorNumeric
            ]);
        }

        $writer->write([
            [
                'name' => Schema::CBC . 'Amount',
                'value' => $this->amount,
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ],
        ]);


        if ($this->baseAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'BaseAmount',
                    'value' => $this->baseAmount,
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }
    }
}
