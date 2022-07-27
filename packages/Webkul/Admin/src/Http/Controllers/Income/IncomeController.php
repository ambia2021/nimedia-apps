<?php

namespace Webkul\Admin\Http\Controllers\Income;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Webkul\Attribute\Http\Requests\AttributeForm;
use Webkul\Income\Repositories\IncomeRepository;
use Illuminate\Support\Facades\Event;


class IncomeController extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $incomeRepository;
    // protected $request;

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
        request()->request->add(['entity_type' => 'income']);
    }
    
    public function index()
    {
        if (request()->ajax()) {
            return app(\Webkul\Admin\DataGrids\Income\IncomeDataGrid::class)->toJson();
        }

        return view('admin::income.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::income.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeForm $request)
    {
 
        Event::dispatch('income.create.before');

        $income = $this->incomeRepository->create(request()->all());

        Event::dispatch('income.create.after', $income);

        session()->flash('success', trans('admin::app.income.create-success'));

        return redirect()->route('admin.income.index');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->incomeRepository->findOrFail($id);

        try {
            Event::dispatch('settings.income.delete.before', $id);

            $this->incomeRepository->delete($id);

            Event::dispatch('settings.income.delete.after', $id);

            return response()->json([
                'message' => trans('admin::app.response.destroy-success', ['name' => trans('admin::app.income.product')]),
            ], 200);
        } catch(\Exception $exception) {
            return response()->json([
                'message' => trans('admin::app.response.destroy-failed', ['name' => trans('admin::app.income.product')]),
            ], 400);
        }
    }
}
