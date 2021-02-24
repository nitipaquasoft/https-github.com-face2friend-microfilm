<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class StreamController extends Controller {

    protected $__rulesforindex = ['user_id' => 'required', 'content_id' => 'required', 'stream_date' => 'required', 'stream_time' => 'required', 'stream_length' => 'required', 'stream_rate' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $stream = \App\Stream::all();
            return Datatables::of($stream)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/stream/' . $item->id) . " title='View Stream'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/stream/' . $item->id . '/edit') . " title='Edit Stream '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/stream/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.stream.index', ['rules' => array_keys($this->__rulesforindex)]);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
         $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('title', 'id');
        return view('admin.stream.create',compact('userid', 'contentid'));
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

        \App\Stream::create($requestData);

        return redirect('admin/stream')->with('flash_message', 'Stream added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $stream = \App\Stream::findOrFail($id);

        return view('admin.stream.show', compact('stream'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $stream = \App\Stream::select('id', 'user_id', 'content_id', 'stream_date', 'stream_time', 'stream_length', 'stream_rate')->findOrFail($id);
        $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('name', 'id');

        return view('admin.stream.edit', compact('stream','userid','contentid'));
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
            'content_id' => 'required',
        ]);
        $requestData = $request->all();

        $stream = \App\Stream::findOrFail($id);

        $stream->update($requestData);

        return redirect('admin/stream')->with('flash_message', 'Stream updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\Stream::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
