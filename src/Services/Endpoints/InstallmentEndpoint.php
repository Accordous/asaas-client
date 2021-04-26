<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class InstallmentEndpoint extends Endpoint
{
    private const BASE_URI = '/installments';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function show(string $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id);
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function refund(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id . '/refund');
    }
}
