<?php

namespace App\Http\Controllers\Api;

use App\Models\PlantStage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;  
use DB;

class PlantStageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:plantStage-list|plantStage-create|plantStage-edit|plantStage-delete', ['only' => ['index','store']]);
        $this->middleware('permission:plantStage-create', ['only' => ['store']]);
        $this->middleware('permission:plantStage-edit', ['only' => ['update']]);
        $this->middleware('permission:plantStage-delete', ['only' => ['destroy']]);
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        {
            $plantStage = PlantStage::orderBy('id','DESC')->paginate(5);
            // return view('companys.index',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
            return response()->json($plantStage);
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
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Company  $company
         * @return \Illuminate\Http\Response
         */
        public function edit(Company $company): JsonResponse
        {
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
            return view('roles.edit',compact('role','permission','rolePermissions'));
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