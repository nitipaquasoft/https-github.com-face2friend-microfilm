<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use App\View;

class ViewController extends Controller
{
    protected $__rulesforindex = ['user_id' => 'required', 'video_id' => 'required', 'watched_till' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $view = \App\View::all();
            return Datatables::of($view)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/view/' . $item->id) . " title='View View'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/view/' . $item->id . '/edit') . " title='Edit View '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/view/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.view.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $userid = \App\User::get()->pluck('name', 'id');
        return view('admin.view.create',compact('userid'));
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

        \App\View::create($requestData);

        return redirect('admin/view')->with('flash_message', 'View added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $view = \App\View::findOrFail($id);

        return view('admin.view.show', compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
          $userid = \App\User::get()->pluck('name', 'id');
        $view = \App\View::select('id', 'user_id', 'video_id', 'watched_till')->findOrFail($id);

        return view('admin.view.edit', compact('view','userid'));
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
            'video_id' => 'required',
        ]);
        $requestData = $request->all();

        $view = \App\View::findOrFail($id);

        $view->update($requestData);

        return redirect('admin/view')->with('flash_message', 'View updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\View::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }
}
