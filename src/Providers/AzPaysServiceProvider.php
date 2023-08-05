<?php
namespace AzPays\Laravel\Providers;

use Illuminate\Support\ServiceProvider;

class AzPaysServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'azpays');
    }

    public function boot()
    {
        if (config('azpays.routes.enabled')){
            $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/config.php' => config_path('azpays.php'),
            ], 'config');
        }
    }

}