<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Expenses\Contracts\Expenses;
use Webkul\Expenses\Providers\ExpenseServiceProvider;
use Webkul\Income\Providers\IncomeServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
