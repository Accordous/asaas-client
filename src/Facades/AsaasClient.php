<?php

namespace Accordous\AsaasClient\Facades;

use Accordous\AsaasClient\Services\AssasService;
use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InstallmentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentEndpoint;
use Illuminate\Support\Facades\Facade;

/**
 * Class AssasClient
 * @package Accordous\AsaasClient\Facades
 *
 * @method CustomerEndpoint customers()
 * @method PaymentEndpoint payments()
 * @method InstallmentEndpoint installments()
 */
class AsaasClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AssasService::class;
    }
}
