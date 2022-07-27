<?php

namespace Webkul\Expenses\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Expenses\Contracts\Expenses;


class ExpenseRepo extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Expenses\Contracts\Expenses';
    }
}