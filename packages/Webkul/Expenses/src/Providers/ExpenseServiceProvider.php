<?php

namespace Webkul\Expenses\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Providers\EventServiceProvider;
use Webkul\Expenses\Models\ExpenseModel;
use Webkul\Expenses\Repositories\ExpensesRepository;

class ExpenseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');


        // $this->app->register(EventServiceProvider::class);

        // $model = ExpenseModel::class; //belongs to User module
        // $this->app->bind('\Webkul\Expenses\Repositories\ExpensesRepository', function () use ($model) {
        //     return new NewsRepositoryEloquent(new $model);
        // });


        // $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'expenses');
        // $this->publishes([
        //     __DIR__ . '/../../publishable/assets' => public_path('expenses/assets'),
        // ], 'public');

        // $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'expenses');

        // Event::listen('admin.layout.head', function($viewRenderEventManager) {
        //     $viewRenderEventManager->addTemplate('expenses::layouts.style');

        // });
    }

    /**
     * Register services.
     *
     * @return void
     */
    // public function register()
    // {
    // $this->registerConfig();
    // }

    public function register()
    {
        // $this->app->bind(\Webkul\Expenses\Contracts\Expenses::class, \Webkul\Admin\Http\Controllers\Expenses\ExpensesController::class);


        /**
         * Register package config.
         *
         * @return void
         */
        // protected function registerConfig()
        // {
        //     $this->mergeConfigFrom(
        //         dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        //     );

        //     $this->mergeConfigFrom(
        //         dirname(__DIR__) . '/Config/acl.php', 'acl'
        //     );
        // }
    }
}
