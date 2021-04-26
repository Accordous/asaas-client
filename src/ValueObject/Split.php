<?php

namespace Accordous\AsaasClient\ValueObject;

use Illuminate\Contracts\Support\Arrayable;

class Split extends ValueObject implements Arrayable
{
    private $walletId;
    private $fixedValue;
    private $percentualValue;

    public function __construct(string $walletId, float $fixedValue, float $percentualValue)
    {
        $this->walletId = $walletId;
        $this->fixedValue = $fixedValue;
        $this->percentualValue = $percentualValue;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
