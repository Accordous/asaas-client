<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class SubscriptionInvoiceSettingEndpoint extends Endpoint
{
    private const BASE_URI = '/subscriptions/%d/invoiceSettings';

    public function create(int $id,  array $attributes)
    {
        return $this->client()->post(sprintf(self::BASE_URI, $id), $this->validate($attributes));
    }

    public function show(string $id)
    {
        return $this->client()->get(sprintf(self::BASE_URI, $id));
    }

    public function update(string $id,  array $attributes)
    {
        return $this->client()->post(sprintf(self::BASE_URI, $id), $this->validate($attributes));
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(sprintf(self::BASE_URI, $id));
    }

    protected function rules(): array
    {
        return [
            'deductions' => 'nullable',
            'effectiveDatePeriod' => 'nullable',
            'receivedOnly' => 'nullable',
            'daysBeforeDueDate' => 'nullable',
            'observations' => 'nullable',
            'taxes' => 'nullable',
        ];
    }

    protected function attributes(): array
    {
        return [
            'deductions',
            'effectiveDatePeriod',
            'receivedOnly',
            'daysBeforeDueDate',
            'observations',
            'taxes',
        ];
    }
}
