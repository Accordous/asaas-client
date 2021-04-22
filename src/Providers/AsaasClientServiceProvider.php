<?php

namespace Accordous\AsaasClient\Providers;

use Accordous\AsaasClient\Services\AssasService;
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

        $this->app->singleton(AssasService::class, function () {
            return new AssasService();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            AssasService::class
        ];
    }
}
