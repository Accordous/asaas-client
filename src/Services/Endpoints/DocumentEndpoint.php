<?php

namespace Accordous\AsaasClient\Services\Endpoints;

use Illuminate\Http\UploadedFile;

class DocumentEndpoint extends Endpoint
{
    private const BASE_URI = '/myAccount/documents';


    public function show()
    {
        return $this->client()->get(self::BASE_URI);
    }

    public function store(string $id, array $attributes, UploadedFile $file)
    {
        return $this->client()->attach('documentFile', $file, 'identidade.pdf')->post(self::BASE_URI . "/" . $id, $attributes);
    }

    protected function rules(): array
    {
        return [
            'documentFile' => 'required',
            'type' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'documentFile' => 'O documento é obrigatório.',
            'type' => 'O tipo do documento é obrigatório.',

        ];
    }

    protected function attributes(): array
    {
        return [
            'documentFile',
            'type',
        ];
    }
}
