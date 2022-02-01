<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class MyAccountStatusEndpoint extends Endpoint
{
    private const BASE_URI = '/myAccount/status';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }
}
