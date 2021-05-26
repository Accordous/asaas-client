<?php

namespace Accordous\AsaasClient\ValueObject;

abstract class ValueObject
{
    public function toJson()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

    public function toArray()
    {
        return (array) $this;
    }
}
