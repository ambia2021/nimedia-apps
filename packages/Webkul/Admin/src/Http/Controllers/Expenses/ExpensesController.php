<?php

namespace Webkul\Admin\Http\Controllers\Expenses;

use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Attribute\Http\Requests\AttributeForm;
use Webkul\Expenses\Repositories\ExpensesRepository;



class ExpensesController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $expensesRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    
    public function __construct(ExpensesRepository $expensesRepository)
    {
        $this->expensesRepository = $expensesRepository;
        request()->request->add(['entity_type' => 'expenses']);

    }

    public function index()
    {
        if (request()->ajax()) {
            return app(\Webkul\Admin\DataGrids\Expenses\ExpensesDataGrid::class)->toJson();
        }

        return view('admin::expense.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        return view('admin::expense.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeForm $request)
    {
 
        Event::dispatch('expenses.create.before');

        $expenses = $this->expensesRepository->create(request()->all());

        Event::dispatch('expenses.create.after', $expenses);

        session()->flash('success', trans('admin::app.expenses.create-success'));

        return redirect()->route('admin.expenses.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $expenses = $this->expensesRepository->findOrFail($id);

        return view('admin::expense.edit', compact('expenses'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeForm $request, $id)
    {
        Event::dispatch('expenses.update.before', $id);

        $expenses = $this->expensesRepository->update(request()->all(), $id);

        Event::dispatch('expenses.update.after', $expenses);

        session()->flash('success', trans('admin::app.expenses.update-success'));

        return redirect()->route('admin.expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->expensesRepository->findOrFail($id);

        try {
            Event::dispatch('expenses.delete.before', $id);

            $this->expensesRepository->delete($id);

            Event::dispatch('expenses.delete.after', $id);

            return response()->json([
                'message' => trans('admin::app.response.destroy-success', ['name' => trans('admin::app.quotes.quote')]),
            ], 200);
        } catch(\Exception $exception) {
            return response()->json([
                'message' => trans('admin::app.response.destroy-failed', ['name' => trans('admin::app.quotes.quote')]),
            ], 400);
        }
        
    }
    public function search()
    {
        $results = $this->expensesRepository->findWhere([
            ['subject', 'like', '%' . urldecode(request()->input('query')) . '%']
        ]);

        return response()->json($results);
    }
}
