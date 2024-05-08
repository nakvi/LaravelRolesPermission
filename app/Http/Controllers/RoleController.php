<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
     public function __construct() {
        $this->middleware('permission:view role',['only' => 'index']);
        $this->middleware('permission:create role',['only' => ['create','store','addPermissionRole','givePermissionRole']]);
        $this->middleware('permission:update role',['only' => ['update','edit']]);
        $this->middleware('permission:delete role',['only' => 'destroy']);
    }
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::paginate(1);
        return view('role-permission.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ]
        ]);
        $role = Role::create(['name' =>  $request->name]);
        return redirect('role')->with('success', 'Role added successfully');
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
    public function edit(Role $role)
    {
        //
        return view('role-permission.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id,
            ]
        ]);
        $role = $role->update(['name' =>  $request->name]);
        return redirect('role')->with('success', 'Role  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role = Role::find($id);
        $role->delete();
        return redirect('role')->with('success', 'Role  deleted successfully');
    }
    public function addPermissionRole($id)
    {
        $permissions = Permission::get();
        $role = Role::find($id);
        $rolePermissions =DB::table('role_has_permissions')
                             ->where('role_has_permissions.role_id',$role->id)
                             ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        return view('role-permission.role.add_permission', compact('role', 'permissions','rolePermissions'));
    }

    public function givePermissionRole(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->givePermissionTo($request->permission);
        return redirect()->back()->with('success','Permission granted');


    }
}
