<?php

namespace Onurrr\Viacoin\Providers;

use Onurrr\Viacoin\Client as ViacoinClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('viacoind.php')], 'config');
        $this->mergeConfigFrom($path, 'viacoind');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerClient();
    }

    /**
     * Register aliases.
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'viacoind' => 'Onurrr\Viacoin\Client',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Register client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('viacoind', function ($app) {
            return new ViacoinClient([
                'scheme' => $app['config']->get('viacoind.scheme', 'http'),
                'host'   => $app['config']->get('viacoind.host', 'localhost'),
                'port'   => $app['config']->get('viacoind.port', 8332),
                'user'   => $app['config']->get('viacoind.user'),
                'pass'   => $app['config']->get('viacoind.password'),
                'ca'     => $app['config']->get('viacoind.ca'),
            ]);
        });
    }
}
