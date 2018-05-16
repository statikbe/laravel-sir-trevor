<?php

namespace Statikbe\LaravelSirTrevor;

use Illuminate\Support\ServiceProvider;

class SirTrevorServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'sirtrevor');

        $this->app['router']->group(['namespace' => 'Statikbe\LaravelSirTrevor\Controllers'], function () {
            require __DIR__.'/../routes.php';
        });

        $this->publishes([
            __DIR__.'/../config/sir-trevor.php' => config_path('sir-trevor.php'),
            __DIR__.'/../resources/css/' => 'public/css/',
            __DIR__.'/../resources/js/' => 'public/js/',
            __DIR__.'/../resources/icons/' => 'public/assets/icons/',
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton(SirTrevor::class, function () {
            return new SirTrevor();
        });

        $this->app->alias(SirTrevor::class, 'sir-trevor');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
