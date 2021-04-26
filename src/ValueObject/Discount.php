<?php

namespace Accordous\AsaasClient\ValueObject;

use Accordous\AsaasClient\Enums\DiscountType;
use Exception;

class Discount extends ValueObject
{
    private $value;
    private $dueDateLimitDays;
    private $type;

    public function __construct(int $value, int $dueDateLimitDays, string $type)
    {
        $this->value = $value;

        $this->dueDateLimitDays = $dueDateLimitDays;

        if(! DiscountType::isValid($type)) {
            throw new Exception('Tipo de desconto inválido.');
        }

        $this->type = $type;
    }
}
