<?php

namespace Accordous\AsaasClient\ValueObject;

class Fine extends ValueObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}
