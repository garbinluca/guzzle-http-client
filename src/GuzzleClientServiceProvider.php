<?php

namespace GarbinLuca\GuzzleClient;

use Illuminate\Support\ServiceProvider;

class GuzzleClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {

        $this->app->singleton('guzzle-client', function () {
            return new Client();
        });

    }
}
