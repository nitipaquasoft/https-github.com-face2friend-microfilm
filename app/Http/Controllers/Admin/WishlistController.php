<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use App\Wishlist;

class WishlistController extends Controller {

    protected $__rulesforindex = ['user_id' => 'required', 'content_id' => 'required'];

    public function index(Request $request) {
        if ($request->ajax()) {
            $wishlist = Wishlist::all();
            return Datatables::of($wishlist
                            )
                            ->addIndexColumn()
                            ->addColumn('action', function($item) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                                $return .= "  <a href=" . url('/admin/wishlist/' . $item->id) . " title='View Wishlist'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
                                    
                                        <a href=" . url('/admin/wishlist/' . $item->id . '/edit') . " title='Edit Wishlist '><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>"
                                        . "  <button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/wishlist/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";
                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('admin.wishlist.index', ['rules' => array_keys($this->__rulesforindex)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('title', 'id');
        return view('admin.wishlist.create', compact('userid', 'contentid'));
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

        Wishlist::create($requestData);

        return redirect('admin/wishlist')->with('flash_message', 'Wishlist added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $wishlist = Wishlist::findOrFail($id);

        return view('admin.wishlist.show', compact('wishlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $wishlist = Wishlist::select('id', 'user_id', 'content_id')->findOrFail($id);
        $userid = \App\User::get()->pluck('name', 'id');
        $contentid = \App\Content::get()->pluck('title', 'id');
        return view('admin.wishlist.edit', compact('wishlist','userid','contentid'));
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

        $wishlist = Wishlist::findOrFail($id);

        $wishlist->update($requestData);

        return redirect('admin/wishlist')->with('flash_message', 'Wishlist updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        if (Wishlist::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

}
