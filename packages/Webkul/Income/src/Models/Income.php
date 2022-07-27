<?php

namespace Webkul\Income\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Attribute\Traits\CustomAttribute;
use Webkul\Income\Contracts\Income as Incomes;
use Webkul\Expenses\Contracts\ExpenseModel as ExpensesContract;


class Income extends Model implements Incomes
{
    // use CustomAttribute;
    
    protected $table = 'income'; 
    protected $primary_key = 'id'; 
    protected $fillable = ['subject', 'description', 'type', 'name_of_payer', 'tax_amount', 'grand_total', 'date_transac'];
        
}