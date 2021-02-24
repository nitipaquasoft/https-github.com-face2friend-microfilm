<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Auth;
use HasRoles;
use DataTables;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    protected $__rulesforadmin = ['username' => 'required', 'email' => 'required'];
    protected $__rulesforusers = ['name' => 'required', 'email' => 'required'];
    protected $__rulesforvideo = ['email' => 'required', 'email' => 'required'];

    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $users = User::where('id', '!=', Auth::id())->where('first_name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                            ->latest()->paginate($perPage);
        } else {
            $users = User::where('id', '!=', Auth::id())->latest()->paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    public function indexByRoleId(Request $request, $role_id) {
//        $keyword = $request->get('search');
//        $perPage = 5;
//
//        $roleusers = \DB::table('role_user')->where('role_id', $role_id)->pluck('user_id');
//        if (!empty($keyword)) {
//            $users = User::wherein('id', $roleusers)->where('firstname', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
//        } else {
//            $users = User::wherein('id', $roleusers)->latest()->paginate($perPage);
//        }
////        dd($role_id);
//        return view('admin.users.index', compact('users', 'role_id'));


        if ($request->ajax()) {
            $roleusers = \DB::table('role_user')->where('role_id', $role_id)->pluck('user_id');
            $users = User::wherein('id', $roleusers)->latest();
            return Datatables::of($users)
                            ->addIndexColumn()
                            ->addColumn('action', function($item)use($role_id) {
//                                $return = 'return confirm("Confirm delete?")';
                                $return = '';

                              


                                $return .= " <a href=" . url('/admin/users/' . $item->id) . " title='View User'><button class='btn btn-info btn-sm'><i class='fas fa-folder' aria-hidden='true'></i> View </button></a>
<a href=" . url('/admin/users/' . $item->id . '/edit/'. $role_id) . " title='Edit User'><button class='btn btn-primary btn-sm'><i class='fas fa-pencil-alt' aria-hidden='true'></i> Edit </button></a>
<button class='btn btn-danger btn-sm btnDelete' type='submit' data-remove='" . url('/admin/users/' . $item->id) . "'><i class='fas fa-trash' aria-hidden='true'></i> Delete </button>";

                                return $return;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        if ($role_id == '1') {
            return view('admin.users.index', ['rules' => array_keys($this->__rulesforadmin), 'role_id' => $role_id]);
        }
        if ($role_id == '2') {
            return view('admin.users.index', ['rules' => array_keys($this->__rulesforusers), 'role_id' => $role_id]);
        }
        if ($role_id == '3') {
            return view('admin.users.index', ['rules' => array_keys($this->__rulesforvideo), 'role_id' => $role_id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($role_id) {
        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        return view('admin.users.create', compact('roles', 'role_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request) {
        $this->validate(
                $request, [
            'username' => '',
            'age' => 'required|min:1|max:99|numeric',
            'phone' => 'required|numeric|digits:10',
            'alt_phone' => '',
                    
                ]
        );
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->assignRole($request->roles);
        if ($request->roles == 'Admin')
            return redirect('admin/users/role/1')->with('flash_message', 'Admin Added!');
        if ($request->roles == 'User')
            return redirect('admin/users/role/2')->with('flash_message', 'User Added!');
        if ($request->roles == 'VideoUploader')
            return redirect('admin/users/role/3')->with('flash_message', 'VideoUploader Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id) {
        $user = User::findOrFail($id);
        if ($user->hasRole('Admin')):
            return view('admin.users.show.admin', compact('user'));
        elseif ($user->hasRole('User')):
            return view('admin.users.show.user', compact('user'));
        else:
            return view('admin.users.show.videouploader', compact('user'));
        endif;
    }

    /**
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id, $role_id) {

        $roles = Role::select('id', 'name', 'label')->get();
        $roles = $roles->pluck('label', 'name');

        $user = User::with('roles')->select('id','username', 'password', 'status', 'name', 'age','phone', 'alt_phone', 'email', 'address', 'address_line2','city','state','country','pin_code','distributer','dob')->findOrFail($id);
//        $user->assignRole($request->roles);

        return view('admin.users.edit', compact('user', 'roles', 'role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id) {

        $this->validate(
                $request, [
            'username' => '',
                ]
        );
        
        $data = $request->except('password');
//       dd($data);
        if ($request->has('password')) {
            if (!empty($request->password))
                $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);
//       dd($user);
        $user->update($data);

        if ($request->roles == 'Admin')
            return redirect('admin/users/role/1')->with('flash_message', 'Admin updated!');
        if ($request->roles == 'User')
            return redirect('admin/users/role/2')->with('flash_message', 'User updated!');
        if ($request->roles == 'VideoUploader')
            return redirect('admin/users/role/3')->with('flash_message', 'VideoUploader updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id) {
        if (User::destroy($id)) {
            $data = 'Success';
        } else {
            $data = 'Failed';
        }
        return response()->json($data);
    }

   
    
    

}
