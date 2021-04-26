<?php

namespace Accordous\AsaasClient\Providers;

use Accordous\AsaasClient\Services\AsaasService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AsaasClientServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Relative path to the root
     */
    const ROOT_PATH = __DIR__ . '/../..';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            self::ROOT_PATH . '/config/asaas.php' => config_path('asaas.php'),
        ], 'asaas');
    }

    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            self::ROOT_PATH . '/config/asaas.php', 'asaas'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            AsaasService::class
        ];
    }
}
