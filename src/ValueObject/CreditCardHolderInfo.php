<?php

namespace Accordous\AsaasClient\ValueObject;

class CreditCardHolderInfo extends ValueObject
{
    private $name;
    private $email;
    private $cpfCnpj;
    private $postalCode;
    private $addressNumber;
    private $addressComplement;
    private $phone;
    private $mobilePhone;

    public function __construct(string $name, string $email, string $cpfCnpj, string $postalCode, string $addressNumber, string $addressComplement, string $phone, string $mobilePhone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpfCnpj = $cpfCnpj;
        $this->postalCode = $postalCode;
        $this->addressNumber = $addressNumber;
        $this->addressComplement = $addressComplement;
        $this->phone = $phone;
        $this->mobilePhone = $mobilePhone;
    }
}
