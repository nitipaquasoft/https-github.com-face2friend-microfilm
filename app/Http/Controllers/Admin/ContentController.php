<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;

use Illuminate\Http\Request;

class ContentController extends Controller {

    protected $__rulesforindex = ['title' => 'required', 'episode' => 'required', 'timelength' => 'required', 'cost_per_stream' => 'required','release_date'=>'required','distributer'=>'required','censor_rating'=>'required'];

    public function index(Request $request) {
       
        if ($request->ajax()) {
            $content = \App\Content::all();
            return Datatables::of($content)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/content/' . $item->id) . " title='View Content'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/content/' . $item->id . '/edit') . " title='Edit Content '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/content/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.content.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.content.create');
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
            'title' => 'required',
        ]);

        $requestData = $request->all();

        \App\Content::create($requestData);

        return redirect('admin/content')->with('flash_message', 'Content added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $content = \App\Content::findOrFail($id);

        return view('admin.content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $content = \App\Content::findOrFail($id);
        $content = \App\Content::select('id', 'title', 'episode', 'timelength', 'cost_per_stream', 'release_date', 'distributer','censor_rating')->findOrFail($id);

        return view('admin.content.edit', compact('content'));
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
            'title' => 'required',
            'episode' => 'required',
        ]);
        $requestData = $request->all();

        $content = \App\Content::findOrFail($id);

        $content->update($requestData);

        return redirect('admin/content')->with('flash_message', 'Content updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\Content::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
