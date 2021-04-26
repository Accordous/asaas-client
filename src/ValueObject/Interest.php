<?php

namespace Accordous\AsaasClient\ValueObject;

class Interest extends ValueObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}
