<?php

namespace App\Http\Controllers\Api;

use App\Models\AnalysePlant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class AnalysePlantController extends Controller
{
     function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:analysePlant-list|analysePlant-create|analysePlant-edit|analysePlant-delete', ['only' => ['index','store']]);
        $this->middleware('permission:analysePlant-create', ['only' => ['store']]);
        $this->middleware('permission:analysePlant-edit', ['only' => ['update']]);
        $this->middleware('permission:analysePlant-delete', ['only' => ['destroy']]);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        //so mostra o do user current se for adminCompany or user
        if(auth()->user()->hasRole('admin')){
            $farms=Farm::all();
        }

        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

           $farms = Farm::where('farm_company',auth()->user()->company_id)->get();
        }
        
        
        return response()->json($farms);

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
            'name' => 'required',//|unique:roles,name', 
            'localizacao' => 'required',
            ]);

            $id = Auth()->user()->company_id;

            $farm = Farm::create(['name' => $request->input('name'),
                                    'farm_company' => $id,
                                    'localizacao' => $request->input('localizacao')]);
            // $role->syncPermissions($request->input('permission'));

            return response()->json($farm);
            // return redirect()->route('roles.index')->with('success','Role created successfully');
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
    public function update(Request $request, Farm $farm): JsonResponse
    {

        $this->validate($request, [
            'name' => 'required',//|unique:roles,name',
            'localizacao' => 'required',
            ]);

            // $id = Auth()->user()->company_id;
            // $farm = Farm::find($farm);

            $farm->name=$request->input('name');
            $farm->localizacao=$request->input('localizacao');
            
            $farm->save();

            return response()->json($farm);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm): JsonResponse
    {
        // DB::table("roles")->where('id',$farm->id)->delete();
        
        // return response()->json($farm);

        // $user = auth('api')->user();

        $farm = Farm::Where('id',$farm->id)->first();

        //if have terrenos
        //change enable to false

        //else
        $farm->delete();

        return response()->json("removed with success");
    }
}