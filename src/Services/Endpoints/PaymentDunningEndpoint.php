<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class PaymentDunningEndpoint extends Endpoint
{
    private const BASE_URI = '/paymentDunnings';

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

    public function simulate(array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/simulate', $this->validate($attributes));
    }

    public function history(string $id, array $filters = [])
    {
        return $this->client()->get(self::BASE_URI . '/' . $id . '/history', $filters);
    }

    public function partialPayments(string $id, array $filters = [])
    {
        return $this->client()->get(self::BASE_URI . '/' . $id . '/partialPayments', $filters);
    }

    public function paymentsAvailableForDunning(string $id, array $filters = [])
    {
        return $this->client()->get(self::BASE_URI . '/' . $id . '/paymentsAvailableForDunning', $filters);
    }

    public function documents(string $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/documents', $attributes);
    }

    public function cancel(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/cancel');
    }

    protected function rules(): array
    {
        return [
            'payment' => 'required',
            'type' => 'required',
            'customerName' => 'required',
            'customerCpfCnpj' => 'required',
            'customerPrimaryPhone' => 'required',
            'customerPostalCode' => 'required',
            'customerAddress' => 'required',
            'customerAddressNumber' => 'required',
            'customerProvince' => 'required',
            'documents' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'payment' => 'Identificador único da cobrança é obrigatório.',
            'type' => 'Tipo de recuperação é obrigatório',
            'customerName' => 'Nome do cliente é obrigatório.',
            'customerCpfCnpj' => 'CPF ou CNPJ do cliente é obrigatório.',
            'customerPrimaryPhone' => 'Telefone principal do cliente é obrigatório.',
            'customerPostalCode' => 'CEP do endereço do cliente é obrigatório.',
            'customerAddress' => 'Logradouro do cliente é obrigatório.',
            'customerAddressNumber' => 'Número do endereço do cliente é obrigatório.',
            'customerProvince' => 'Bairro do cliente é obrigatório.',
            'documents' => 'Nota fiscal ou contrato é obrigatório.',
        ];
    }

    public function attributes(): array
    {
        return [
            'payment',
            'type',
            'description',
            'customerName',
            'customerCpfCnpj',
            'customerPrimaryPhone',
            'customerSecondaryPhone',
            'customerPostalCode',
            'customerAddress',
            'customerAddressNumber',
            'customerProvince',
            'customerComplement',
            'documents',
        ];
    }
}
