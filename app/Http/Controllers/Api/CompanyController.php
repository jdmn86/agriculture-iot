<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class CompanyController extends Controller
{ 

    function __construct()
{
    $this->middleware('auth');//->except('logout');

    $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
    $this->middleware('permission:company-create', ['only' => ['store']]);
    $this->middleware('permission:company-edit', ['only' => ['update']]);
    $this->middleware('permission:company-delete', ['only' => ['destroy']]);
}

    // public function getMine( $idUser)
    // {
    //     $company = Company::find($id);
    //     $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
    //     ->where("role_has_permissions.role_id",$id)->get();
    //     return view('roles.show',compact('role','rolePermissions'));
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        //so mostra o do user current se for adminCompany or user
        if(auth()->user()->hasRole('admin')){
            $company=Company::all();
        }

        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

            // $user = Auth::user();//->company_id();    

           $company = Company::where('id',auth()->user()->company_id)->get();
        }
        
        
        return response()->json($company);

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
            // 'is_company' => 'required',
            'name' => 'required',
            'company_name' => 'required',
            'nif' => 'required',
            'email' => 'required',
            'email_notifications' => 'required',
            ]);

            $company = Company::create([
                 'is_company' => true, //$request->input('is_company'),
                'name' => $request->input('name'),
                'company_name' => $request->input('company_name'),
                'nif' => $request->input('nif'),
                'email' => $request->input('email'),
                'email_notifications' => $request->input('email_notifications'),
                ]);

            //$role->syncPermissions($request->input('permission'));
            return response()->json($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show( $id): JsonResponse
    {
        $company = Company::find($id);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id",$id)->get();

        return response()->json($company);
        // return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}
