<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class ProfileController extends Controller {

    protected $__rulesforindex = ['user_id' => 'required', 'name' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $profile = \App\Profile::all();
            return Datatables::of($profile)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/profile/' . $item->id) . " title='View Profile'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/profile/' . $item->id . '/edit') . " title='Edit Profile '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/profile/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.profile.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {

        $userid = \App\User::get()->pluck('name', 'id');
        return view('admin.profile.create', compact('userid'));
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

        \App\Profile::create($requestData);

        return redirect('admin/profile')->with('flash_message', 'Profile added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        
        $profile = \App\Profile::findOrFail($id);
        return view('admin.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $profile = \App\Profile::findOrFail($id);
        $userid = \App\User::get()->pluck('name', 'id');

        $profile = \App\Profile::select('id', 'user_id', 'name')->findOrFail($id);

        return view('admin.profile.edit', compact('profile','userid'));
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
            'name' => 'required',
        ]);
        $requestData = $request->all();

        $profile = \App\Profile::findOrFail($id);

        $profile->update($requestData);

        return redirect('admin/profile')->with('flash_message', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\Profile::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
