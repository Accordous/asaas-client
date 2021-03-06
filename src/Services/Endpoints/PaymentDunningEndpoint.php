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
            'description' => 'nullable',
            'customerSecondaryPhone' => 'nullable',
            'customerComplement' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'payment' => 'Identificador ??nico da cobran??a ?? obrigat??rio.',
            'type' => 'Tipo de recupera????o ?? obrigat??rio',
            'customerName' => 'Nome do cliente ?? obrigat??rio.',
            'customerCpfCnpj' => 'CPF ou CNPJ do cliente ?? obrigat??rio.',
            'customerPrimaryPhone' => 'Telefone principal do cliente ?? obrigat??rio.',
            'customerPostalCode' => 'CEP do endere??o do cliente ?? obrigat??rio.',
            'customerAddress' => 'Logradouro do cliente ?? obrigat??rio.',
            'customerAddressNumber' => 'N??mero do endere??o do cliente ?? obrigat??rio.',
            'customerProvince' => 'Bairro do cliente ?? obrigat??rio.',
            'documents' => 'Nota fiscal ou contrato ?? obrigat??rio.',
        ];
    }

    protected function attributes(): array
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
