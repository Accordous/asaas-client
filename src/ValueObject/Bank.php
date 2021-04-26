<?php

namespace Accordous\AsaasClient\ValueObject;

class Bank extends ValueObject
{
    private $code;

    public function __construct(int $code)
    {
        $this->code = $code;
    }
}
