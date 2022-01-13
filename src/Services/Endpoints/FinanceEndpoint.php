<?php

namespace Accordous\AsaasClient\Services\Endpoints;


class FinanceEndpoint extends Endpoint
{
    private const BASE_URI = '/finance/getCurrentBalance';


    public function index()
    {
        return $this->client()->get(self::BASE_URI);
    }
}
