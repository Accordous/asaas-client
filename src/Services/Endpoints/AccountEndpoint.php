<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class AccountEndpoint extends Endpoint
{
    private const BASE_URI = '/accounts';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'cpfCnpj' => 'required',
            'phone' => 'nullable',
            'mobilePhone' => 'nullable',
            'address' => 'required',
            'province' => 'required',
            'postalCode' => 'required',
            'loginEmail' => 'nullable',
            'companyType' => 'nullable',
            'addressNumber' => 'nullable',
            'complement' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'name' => 'Nome é obrigatório.',
            'email' => 'E-mail é obrigatório.',
            'cpfCnpj' => 'Documento é obrigatório.',
            'address' => 'Endereço é obrigatório.',
            'province' => 'Bairro é obrigatório.',
            'postalCode' => 'CEP é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'name',
            'email',
            'loginEmail',
            'cpfCnpj',
            'companyType',
            'phone',
            'mobilePhone',
            'address',
            'addressNumber',
            'complement',
            'province',
            'postalCode',
        ];
    }
}
