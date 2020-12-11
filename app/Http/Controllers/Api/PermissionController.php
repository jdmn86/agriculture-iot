<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB; 


class PermissionController extends Controller
{
    function __construct()
{
    $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
    $this->middleware('permission:permission-create', ['only' => ['store']]);
    $this->middleware('permission:permission-edit', ['only' => ['update']]);
    $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(): JsonResponse
{
    // if(auth()->user()->hasRole('admin')){

        return response()->json(Permission::all());
    // }
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(PermissionRequest $request): JsonResponse
{
    $this->validate($request, [
    'name' => 'required|unique:permissions,name',    
    ]);
    $permission = Permission::create(['name' => $request->input('name'),'guard_name'=>'web']);
    $permission->assignRole(1);

    
    return response()->json($permission);
    // return redirect()->route('roles.index')->with('success','Role created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id): JsonResponse
{
    
    return response()->json(Role::find($id));
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
