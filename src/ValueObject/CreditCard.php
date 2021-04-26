<?php

namespace Accordous\AsaasClient\ValueObject;

class CreditCard extends ValueObject
{
    private $holderName;
    private $number;
    private $expiryMonth;
    private $expiryYear;
    private $ccv;

    public function __construct(string $holderName, string $number, string $expiryMonth, string $expiryYear, string $ccv)
    {
        $this->holderName = $holderName;
        $this->number = $number;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
        $this->ccv = $ccv;
    }
}
