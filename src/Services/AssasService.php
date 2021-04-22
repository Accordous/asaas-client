<?php

namespace Accordous\AsaasClient\Services;

use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AssasService
{
    private $http;

    /**
     * @var CustomerEndpoint
     */
    private $customers;

    /**
     * AsaasClientService constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->http = Http::withOptions(['verify' => false]);
        $this->http->baseUrl(Config::get('asaas.host') .  '/' . Config::get('asaas.version'));
        $this->http->withHeaders(['access_token' => Config::get('asaas.token')]);

        $this->customers =  new CustomerEndpoint($this->http);
    }

    /**
     * @return mixed
     */
    public function customers()
    {
        return $this->customers;
    }
}
