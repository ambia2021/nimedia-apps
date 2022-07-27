<?php

namespace Webkul\Admin\Datagrids\Expenses;

use Illuminate\Support\Facades\DB;
use Webkul\UI\DataGrid\DataGrid;

class ExpensesDataGrid extends DataGrid
{
    protected $index = 'id';

    protected $sortOrder = 'desc';

    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('expenses')->addSelect('*');
        $this->addFilter('id', 'id');
        $this->addFilter('price', 'price');
        $this->addFilter('date_transac', 'date_transac');
        $this->addFilter('grand_total', 'grand_total');

        $this->setQueryBuilder($queryBuilder);
    }

    public function addColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => 'Id',
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);
        $this->addColumn([
            'index'    => 'subject',
            'label'    => trans('admin::app.datagrid.subject'),
            'type'     => 'string',
            'sortable' => true,
        
        ]);
        $this->addColumn([
            'index'    => 'price',
            'label'    => trans('admin::app.datagrid.price'),
            'type'     => 'string',
            'sortable' => true,
            'closure'  => function ($row) {
                return core()->formatBasePrice($row->price, 2);
            },
        
        ]);
        $this->addColumn([
            'index'    => 'amount',
            'label'    => trans('admin::app.datagrid.amount'),
            'type'     => 'string',
            'sortable' => true,
        
        ]);
        $this->addColumn([
            'index'    => 'tax_amount',
            'label'    => trans('admin::app.datagrid.tax'),
            'type'     => 'string',
            'sortable' => true,
            'closure'  => function ($row) {
                return core()->formatBasePrice($row->tax_amount, 2);
            },
        ]);
        $this->addColumn([
            'index'    => 'grand_total',
            'label'    => trans('admin::app.datagrid.grand-total'),
            'type'     => 'string',
            'sortable' => true,
            'closure'  => function ($row) {
                return core()->formatBasePrice($row->grand_total, 2);
            },
        ]);
        // $this->addColumn([
        //     'index'    => 'date_transac',
        //     'label'    => trans('admin::app.datagrid.date_transac'),
        //     'type'     => 'string',
        //     'sortable' => true,
        //     'closure'  => function ($row) {
        //         return core()->formatDate($row->date_transac);
        //     },
        // ]);
    }

    public function prepareActions()
    {
        $this->addAction([
            'title'  => trans('ui::app.datagrid.edit'),
            'method' => 'GET',
            'route'  => 'admin.expenses.edit',
            'icon'   => 'pencil-icon',
        ]);

        $this->addAction([
            'title'        => trans('ui::app.datagrid.delete'),
            'method'       => 'DELETE',
            'route'        => 'admin.expenses.delete',
            'confirm_text' => trans('ui::app.datagrid.massaction.delete', ['resource' => 'user']),
            'icon'         => 'trash-icon',
        ]);
    }
}