<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class InvoiceEndpoint extends Endpoint
{
    private const BASE_URI = '/invoices';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    public function show(string $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id);
    }

    public function update(string $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id, $attributes);
    }

    public function authorize(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/authorize');
    }

    public function cancel(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/cancel');
    }

    public function municipalServices(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI . '/municipalServices', $filters);
    }

    protected function rules(): array
    {
        return [
            'serviceDescription' => 'required',
            'observations' => 'required',
            'value' => 'required',
            'deductions' => 'required',
            'effectiveDate' => 'required',
            'payment' => 'nullable',
            'installment' => 'nullable',
            'customer' => 'nullable',
            'externalReference' => 'nullable',
            'municipalServiceId' => 'nullable',
            'municipalServiceCode' => 'nullable',
            'municipalServiceName' => 'nullable',
            'updatePayment' => 'nullable',
            'taxes' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'serviceDescription' => 'Descrição dos serviços da nota fiscal é obrigatória.',
            'observations' => 'Observações adicionais da nota fiscal é obrigatória.',
            'value' => 'Valor é obrigatória.',
            'deductions' => 'Deduções são obrigatórias.',
            'effectiveDate' => 'Data de emissão da nota fiscal é obrigatória.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'payment',
            'installment',
            'customer',
            'serviceDescription',
            'observations',
            'externalReference',
            'value',
            'deductions',
            'effectiveDate',
            'municipalServiceId',
            'municipalServiceCode',
            'municipalServiceName',
            'updatePayment',
            'taxes',
        ];
    }
}
