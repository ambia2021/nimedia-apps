<?php

namespace Webkul\Income\Providers;

// use Barryvdh\DomPDF\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;



class IncomeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        // );

        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/acl.php', 'acl'
        // );
    }
}