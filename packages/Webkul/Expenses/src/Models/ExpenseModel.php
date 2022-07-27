<?php

namespace Webkul\Expenses\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Expenses\Contracts\ExpenseModel as ExpensesContract;

class ExpenseModel extends Model implements ExpensesContract
{
    protected $table = 'expenses'; 
    protected $primary_key = 'id'; 
    protected $fillable = ['subject', 'description', 'type', 'name_of_payer', 'tax_amount', 'grand_total', 'date_transac'];
}