<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller {

    protected $__rulesforindex = ['user_id' => 'required', 'plan_id' => 'required', 'valid_till' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $subscription = Subscription::all();
            return Datatables::of($subscription)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/subscription/' . $item->id) . " title='View Subscription'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/subscription/' . $item->id . '/edit') . " title='Edit Subscription '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/subscription/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.subscription.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $userid = \App\User::get()->pluck('name', 'id');
        $planid = \App\Plan::get()->pluck('name', 'id');
        return view('admin.subscription.create', compact('userid', 'planid'));
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
            'user_id' => 'required',
        ]);

        $requestData = $request->all();

        Subscription::create($requestData);

        return redirect('admin/subscription')->with('flash_message', 'Subscription added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $subscription = Subscription::findOrFail($id);

        return view('admin.subscription.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $subscription = Subscription::select('id', 'user_id', 'plan_id', 'valid_till')->findOrFail($id);
        $userid = \App\User::get()->pluck('name', 'id');
        $planid = \App\Plan::get()->pluck('name', 'id');
        return view('admin.subscription.edit', compact('subscription','userid','planid'));
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
            'user_id' => 'required',
            'plan_id' => 'required',
        ]);
        $requestData = $request->all();

        $subscription = Subscription::findOrFail($id);

        $subscription->update($requestData);

        return redirect('admin/subscription')->with('flash_message', 'Subscription updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (Subscription::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
