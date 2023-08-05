<?php
namespace AzPays\Laravel\Providers;
class AzPaysServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'werify');
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