<?php

namespace Accordous\AsaasClient\ValueObject;

class Bank extends ValueObject
{
    public $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }
}
