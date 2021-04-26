<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class SubscriptionInvoiceSettingEndpoint extends Endpoint
{
    private const BASE_URI = '/subscriptions/%d/invoiceSettings';

    public function create(int $id,  array $attributes)
    {
        return $this->client()->post(sprintf(self::BASE_URI, $id), $attributes);
    }

    public function show(int $id)
    {
        return $this->client()->get(sprintf(self::BASE_URI, $id));
    }

    public function update(int $id,  array $attributes)
    {
        return $this->client()->post(sprintf(self::BASE_URI, $id), $attributes);
    }

    public function destroy(int $id)
    {
        return $this->client()->delete(sprintf(self::BASE_URI, $id));
    }
}
