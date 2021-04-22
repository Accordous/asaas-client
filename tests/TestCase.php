<?php

namespace Accordous\AsaasClient\Tests;

use Accordous\AsaasClient\Providers\AsaasClientServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * add the package provider
     *
     * @param  Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            AsaasClientServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('asaas.host', 'https://sandbox.asaas.com/api');
        $app['config']->set('asaas.version', 'v3');
        $app['config']->set('asaas.token', '!@@@#$%*@#$@$');
    }
}
