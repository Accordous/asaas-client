<?php

namespace Accordous\AsaasClient\ValueObject;

use Accordous\AsaasClient\Enums\BankAccountType;
use Exception;

class BankAccount extends ValueObject
{
    public $bank;
    public $accountName;
    public $ownerName;
    public $ownerBirthDate;
    public $cpfCnpj;
    public $agency;
    public $account;
    public $accountDigit;
    public $bankAccountType;

    public function __construct(Bank $bank, string $accountName, string $ownerName, string $ownerBirthDate, string $cpfCnpj, string $agency, string $account, string $accountDigit, string $bankAccountType)
    {
        $this->bank = $bank;
        $this->accountName = $accountName;
        $this->ownerName = $ownerName;
        $this->ownerBirthDate = $ownerBirthDate;
        $this->cpfCnpj = $cpfCnpj;
        $this->agency = $agency;
        $this->account = $account;
        $this->accountDigit = $accountDigit;

        if(! BankAccountType::isValid($bankAccountType)) {
            throw new Exception('Tipo de conta bancária inválido.');
        }
        $this->bankAccountType = $bankAccountType;
    }
}
