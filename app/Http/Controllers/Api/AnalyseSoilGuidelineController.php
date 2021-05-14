<?php

namespace App\Http\Controllers\Api;

use App\Models\AnalyseSoilGuideline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class AnalyseSoilGuidelineController extends Controller
{ 
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:analyseSoilGuideline-list|analyseSoilGuideline-create|analyseSoilGuideline-edit|analyseSoilGuideline-delete', ['only' => ['index','store']]);
        $this->middleware('permission:analyseSoilGuideline-create', ['only' => ['store']]);
        $this->middleware('permission:analyseSoilGuideline-edit', ['only' => ['update']]);
        $this->middleware('permission:analyseSoilGuideline-delete', ['only' => ['destroy']]);
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        {
            if(auth()->user()->hasRole('admin')){
            $analyseSoilGuide=AnalyseSoilGuideline::all();
            }



        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

              // $crops = Crop::all();
            $analyseSoilGuide = AnalyseSoilGuideline::whereHas('terrain.farm', function($query){
                
                    $query->where('farm_company','=', auth()->user()->company_id);
               })->get();
            }

        
        return response()->json($analyseSoilGuide);
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
    

     $user = auth('api')->user();

        try{
           $SoilAnalysisGuidelines = new AnalyseSoilGuideline;
            
            $SoilAnalysisGuidelines->Lime = $request['Lime'];
            $SoilAnalysisGuidelines->nitrogen = $request['nitrogen'];
            $SoilAnalysisGuidelines->phosphorus = $request['phosphorus'];
            $SoilAnalysisGuidelines->potash = $request['potash'];
            $SoilAnalysisGuidelines->Magnesium = $request['Magnesium'];
            $SoilAnalysisGuidelines->zinc = $request['zinc'];
            $SoilAnalysisGuidelines->Sulfur = $request['Sulfur'];
            $SoilAnalysisGuidelines->Manganese = $request['Manganese'];
            $SoilAnalysisGuidelines->Cooper = $request['Cooper'];
            $SoilAnalysisGuidelines->Iron = $request['Iron'];
            $SoilAnalysisGuidelines->Boron = $request['Boron'];
            $SoilAnalysisGuidelines->Obs = $request['Obs'];

             
            $SoilAnalysisGuidelines->save();
        }
        catch(\Exception $e){
           // do task when error
            return  $e->getMessage();
        }


    
                return response()->json($SoilAnalysisGuidelines);
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