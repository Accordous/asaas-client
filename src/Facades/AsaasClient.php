<?php

namespace Accordous\AsaasClient\Facades;

use Accordous\AsaasClient\Services\AssasService;
use Illuminate\Support\Facades\Facade;

/**
 * Class AssasClient
 * @package Accordous\AsaasClient\Facades
 *
 * @method customers()
 */
class AsaasClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AssasService::class;
    }
}
