<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    protected $__rulesforindex = ['name' => 'required', 'charges' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $plan = Plan::all();
            return Datatables::of($plan)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/plan/' . $item->id) . " title='View Plan'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/plan/' . $item->id . '/edit') . " title='Edit plan '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/plan/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.plan.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        
        
        return view('admin.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $requestData = $request->all();

        \App\Plan::create($requestData);

        return redirect('admin/plan')->with('flash_message', 'Plan added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        
        $plan = \App\Plan::findOrFail($id);

        return view('admin.plan.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $plan = \App\Plan::findOrFail($id);
        $plan = \App\Plan::select('id', 'name', 'charges')->findOrFail($id);

        return view('admin.plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'charges' => 'required',
        ]);
        $requestData = $request->all();

        $plan = \App\Plan::findOrFail($id);

        $plan->update($requestData);

        return redirect('admin/plan')->with('flash_message', 'Plan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\Plan::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
