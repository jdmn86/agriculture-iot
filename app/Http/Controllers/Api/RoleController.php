<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;
 

class RoleController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
function __construct()
{
    $this->middleware('auth');//->except('logout');

    $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    $this->middleware('permission:role-create', ['only' => ['store']]);
    $this->middleware('permission:role-edit', ['only' => ['update']]);
    $this->middleware('permission:role-delete', ['only' => ['destroy']]);
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(): JsonResponse
{
    
    return response()->json(Role::with('permissions')->get());
    
    
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request): JsonResponse
{
    $this->validate($request, [
    'name' => 'required|unique:roles,name',
    'permission' => 'required',
    ]);
    $role = Role::create(['name' => $request->input('name')]);
    $role->syncPermissions($request->input('permission'));
    return response()->json($role);
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id): JsonResponse
{
    $role = Role::find($id);
    $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
    ->where("role_has_permissions.role_id",$id)->get();
    return view('roles.show',compact('role','rolePermissions'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id): JsonResponse
{
    $this->validate($request, [
    'name' => 'required',
    'permission' => 'required',
    ]);

    $role = Role::find($id);
    $role->name = $request->input('name');
    $role->save();
    $role->syncPermissions($request->input('permission'));
    return redirect()->route('roles.index')->with('success','Role updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id): JsonResponse
{
    DB::table("roles")->where('id',$id)->delete();
    return redirect()->route('roles.index')->with('success','Role deleted successfully');
}
}