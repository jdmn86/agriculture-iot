<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller 
{
    function __construct()  
    { 
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['store']]);
        $this->middleware('permission:user-edit', ['only' => ['update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
   
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(): JsonResponse
{
    
//exemplo so para um     return new UserResource(User::findOrFail(1));

//     $currentUser =  Auth::user()->company_id;
// return response()->json($currentUser);

    if(auth()->user()->hasRole('admin')){
        
        $users = User::all();

    }else {
        $users = User::where('company_id',auth()->user()->company_id)->where('id','!=',auth()->user()->id)->get();

    }
    
    return response()->json($users);
    
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request): JsonResponse
{
    // $this->validate($request, [
    // 'name' => 'required',
    // 'email' => 'required|email|unique:users,email',
    // 'company_id' => 'required',
    // // 'password' => 'required|same:confirm-password',
    // // 'roles' => 'required'
    // ]);

// return Role::findByName('adminCompany');;

    if(auth()->user()->hasRole('admin')){

        $input = $request->all();
        $input['password'] = Hash::make($input['email']);
        $user = User::create($input);


        $role = Role::where('name','adminCompany')->first();

        $permissions = $role->permissions;
        
        $role->syncPermissions($permissions);

        $user->assignRole($role);     


    }else if(auth()->user()->hasRole('adminCompany') ){

        $input = $request->all();
        $input['password'] = Hash::make($input['email']);
        $user = User::create($input);

        // $role = Role::create(['name' => 'adminCompany']);

        // $role =Role::findByName('user');
        $role = Role::where('name','user')->first();
  
        $permissions = $role->permissions;
        
        $role->syncPermissions($permissions);

        $user->assignRole($role);

    }
    
    return response()->json($user);    
    
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id): JsonResponse
{
    $user = User::find($id);
    return response()->json($user);    
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
    'email' => 'required|email|unique:users,email,'.$id,
    // 'password' => 'same:confirm-password',
    'roles' => 'required',
    'blocked' => 'required'
    ]);

    $input = $request->all();
    if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
    }else{
        $input = array_except($input,array('password'));
    }

    $user = User::find($id);
    $user->update($input);

    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));

    return response()->json($user);
    // return redirect()->route('users.index')->with('success','User updated successfully');
}

public function blockUnblock(Request $request, $id): JsonResponse
{
    $this->validate($request, [    
    'email' => 'required|email|unique:users,email,'.$id,
    'blocked' => 'required',    
    ]);

    $user = User::find($id);
    $user->blocked = $request->blocked;
    $user->save();

    //if bolck have to logout from all tokens
    // $userTokens = $userInstance->tokens;
    // foreach($userTokens as $token) {
    //     $token->revoke();   
    // }
    
    return response()->json($user);
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id): JsonResponse
{
    User::find($id)->delete();
    return redirect()->route('users.index')->with('success','User deleted successfully');
}
}