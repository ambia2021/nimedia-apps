<?php

namespace Webkul\Expenses\Providers;

use Webkul\Core\Providers\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
       \Webkul\Expenses\Models\ExpenseModel::class,
    ];
}