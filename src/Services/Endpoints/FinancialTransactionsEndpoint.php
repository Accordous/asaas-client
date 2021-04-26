<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class FinancialTransactionsEndpoint extends Endpoint
{
    private const BASE_URI = '/financialTransactions';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }
}
