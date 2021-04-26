<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class MyAccountEndpoint extends Endpoint
{
    private const BASE_URI = '/myAccount';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }
}
