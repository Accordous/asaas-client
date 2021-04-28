<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class CustomerEndpoint extends Endpoint
{
    private const BASE_URI = '/customers';

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
        return $this->client()->post(self::BASE_URI . '/' . $id, $this->validate($attributes));
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function restore(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/restore');
    }

    protected function rules(): array
    {
        return [
            'name' => 'required',
            'cpfCnpj' => 'required',
            'postalCode' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'mobilePhone' => 'nullable',
            'address' => 'nullable',
            'addressNumber' => 'nullable',
            'complement' => 'nullable',
            'province' => 'nullable',
            'externalReference' => 'nullable',
            'notificationDisabled' => 'nullable',
            'additionalEmails' => 'nullable',
            'municipalInscription' => 'nullable',
            'stateInscription' => 'nullable',
            'observations' => 'nullable',
            'groupName' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'name' => 'Nome é obrigatório.',
            'cpfCnpj' => 'Documento é obrigatório.',
            'postalCode' => 'CEP é obrigatório.'
        ];
    }

    protected function attributes(): array
    {
        return [
            'name',
            'cpfCnpj',
            'email',
            'phone',
            'mobilePhone',
            'address',
            'addressNumber',
            'complement',
            'province',
            'postalCode',
            'externalReference',
            'notificationDisabled',
            'additionalEmails',
            'municipalInscription',
            'stateInscription',
            'observations',
            'groupName',
        ];
    }
}
