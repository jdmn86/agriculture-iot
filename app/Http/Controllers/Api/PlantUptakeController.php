<?php

namespace App\Http\Controllers\Api;

use App\Models\PlantUptake;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;
use Illuminate\Database\Eloquent\Builder;

class PlantUptakeController extends Controller
{ 
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:plantUptake-list|plantUptake-create|plantUptake-edit|plantUptake-delete', ['only' => ['index','store']]); 
        $this->middleware('permission:plantUptake-create', ['only' => ['store']]);
        $this->middleware('permission:plantUptake-edit', ['only' => ['update']]);
        $this->middleware('permission:plantUptake-delete', ['only' => ['destroy']]);
    }
        /** 
         * Display a listing of the resource. 
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        {
             $plantUptake = PlantUptake::whereHas('plant', function (Builder $query) {
                
                    $query->whereNull('company_id')->orWhere('company_id',Auth()->user()->company_id);
                })->get();

// )->whereNull('company_id')->orWhere('company_id',Auth()->user()->company_id)->get();

        // tem de ir buscar as master e as que a company criou
        return response()->json($plantUptake);
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
            $terrain = Terrain::find($id);
            // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            // ->where("role_has_permissions.role_id",$id)->get();
    
            return response()->json($terrain);
            // return view('roles.show',compact('role','rolePermissions'));
        }
    
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Company  $company
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Company $company): JsonResponse
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
        public function destroy(Company $company): JsonResponse
        {
            DB::table("roles")->where('id',$id)->delete();
            return redirect()->route('roles.index')->with('success','Role deleted successfully');
        }
    }