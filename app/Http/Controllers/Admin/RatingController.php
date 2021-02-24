<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class RatingController extends Controller {

    protected $__rulesforindex = ['user_id' => 'required', 'content_id' => 'required', 'rating' => 'required', 'comment' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $rating = \App\Rating::all();
            return Datatables::of($rating)
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/rating/' . $item->id) . " title='View Rating'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/rating/' . $item->id . '/edit') . " title='Edit Rating '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/rating/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.rating.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('title', 'id');

        return view('admin.rating.create', compact('userid', 'contentid'));
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

        \App\Rating::create($requestData);

        return redirect('admin/rating')->with('flash_message', 'Rating added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $rating = \App\Rating::findOrFail($id);

        return view('admin.rating.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $rating = \App\Rating::select('id', 'user_id', 'content_id','rating','comment')->findOrFail($id);
        $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('title', 'id');

        return view('admin.rating.edit', compact('rating','userid','contentid'));
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

        $rating = \App\Rating::findOrFail($id);

        $rating->update($requestData);

        return redirect('admin/rating')->with('flash_message', 'Rating updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (\App\Rating::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
