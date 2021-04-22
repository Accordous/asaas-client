<?php

namespace Accordous\AsaasClient\Services\Endpoints;

use Illuminate\Http\Client\PendingRequest;

abstract class Endpoint
{
    protected $http;

    public function __construct(PendingRequest $http)
    {
        $this->http = $http;
    }

    protected function client()
    {
        return $this->http;
    }
}
