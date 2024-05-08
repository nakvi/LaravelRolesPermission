<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('permission:view user',['only' => 'index']);
        $this->middleware('permission:create user',['only' => ['create','store']]);
        $this->middleware('permission:update user',['only' => ['update','edit']]);
        $this->middleware('permission:delete user',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::get();
        return view('role-permission.user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         $roles =Role::pluck('name','name')->all();
        return view('role-permission.user.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role'));

        return redirect('/user')->with('success','User has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $roles =Role::pluck('name','name')->all();
         $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit',[
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'nullable', // Allow nullable
            'role' => 'nullable',
        ]);

        // Check if the password is not empty before hashing
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Remove the password from the data if it's empty
            unset($data['password']);
        }

        $user->update($data);

        $user->syncRoles([$request->input('role')]);

        return redirect('/user')->with('success', 'User has been Updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success', 'User  deleted successfully');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login'); // Change this to the desired login route
    }
}
