<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
// use App\Http\Requests\StoreUserRequest;
// use App\Http\Requests\UpdateUserRequest;

// class UsersController extends Controller
// {
//     /**
//      * Display all users
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $users = User::latest()->paginate(10);

//         return view('users.index', compact('users'));
//     }

//     /**
//      * Show form for creating user
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('users.create');
//     }

//     /**
//      * Store a newly created user
//      * 
//      * @param User $user
//      * @param StoreUserRequest $request
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function store(User $user, StoreUserRequest $request)
//     {
//         //For demo purposes only. When creating user or inviting a user
//         // you should create a generated random password and email it to the user
//         $user->create(array_merge($request->validated(), [
//             'password' => 'test'
//         ]));

//         return redirect()->route('users.index')
//             ->withSuccess(__('User created successfully.'));
//     }

//     /**
//      * Show user data
//      * 
//      * @param User $user
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function show(User $user)
//     {
//         return view('users.show', [
//             'user' => $user
//         ]);
//     }

//     /**
//      * Edit user data
//      * 
//      * @param User $user
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(User $user)
//     {
//         return view('users.edit', [
//             'user' => $user,
//             'userRole' => $user->roles->pluck('name')->toArray(),
//             'roles' => Role::latest()->get()
//         ]);
//     }

//     /**
//      * Update user data
//      * 
//      * @param User $user
//      * @param UpdateUserRequest $request
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function update(User $user, UpdateUserRequest $request)
//     {
//         $user->update($request->validated());

//         $user->syncRoles($request->get('role'));

//         return redirect()->route('users.index')
//             ->withSuccess(__('User updated successfully.'));
//     }

//     /**
//      * Delete user data
//      * 
//      * @param User $user
//      * 
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(User $user)
//     {
//         $user->delete();

//         return redirect()->route('users.index')
//             ->withSuccess(__('User deleted successfully.'));
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:currency-list|currency-create|currency-edit|currency-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:User Management', ['only' => ['edit']]);
        // $this->middleware('permission:currency-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:currency-delete', ['only' => ['destroy']]);

        // $this->middleware('permission:Currency Management', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            // 'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
