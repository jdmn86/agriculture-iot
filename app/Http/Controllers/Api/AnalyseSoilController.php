<?php

namespace App\Http\Controllers\Api;

use App\Models\AnalyseSoil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;
 
class AnalyseSoilController extends Controller 
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout'); 
    
        $this->middleware('permission:analyseSoil-list|analyseSoil-create|analyseSoil-edit|analyseSoil-delete', ['only' => ['index','store']]);
        $this->middleware('permission:analyseSoil-create', ['only' => ['store']]);
        $this->middleware('permission:analyseSoil-edit', ['only' => ['update']]);
        $this->middleware('permission:analyseSoil-delete', ['only' => ['destroy']]);
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        {
          if(auth()->user()->hasRole('admin')){
            $analyseSoil=AnalyseSoil::all();
            }



        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

              // $crops = Crop::all();
            $analyseSoil = AnalyseSoil::with('analysisGuideline')->whereHas('terrain.farm', function($query){
                
                    $query->where('farm_company','=', auth()->user()->company_id);
               })->get();
            }

        
        return response()->json($analyseSoil);
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
            //     'name' => 'required',//|unique:roles,name',
            //     'localizacao' => 'required',
            //     ]);
    
                //return $request;
        //preciso mandar id_user e device_id 
        $user = auth('api')->user();



        try{
           $soilAnalysis = new AnalyseSoil;
            
            $soilAnalysis->terrain_id = $request['terrain_id'];
            $soilAnalysis->tipoSolo_id = $request['tipoSolo_id'];
            
            if(isset($request['analysisGuideline_id'])){
                $soilAnalysis->analysisGuideline_id = $request['analysisGuideline_id'];    
            }
            
            $soilAnalysis->soilDepth = $request['soilDepth'];
            $soilAnalysis->matOrgPer = $request['matOrgPer'];
            $soilAnalysis->date = $request['date'];
            $soilAnalysis->matOrgPer = $request['matOrgPer'];
            $soilAnalysis->nitrogen = $request['nitrogen'];
            $soilAnalysis->phosphorus = $request['phosphorus'];
            $soilAnalysis->potassium = $request['potassium'];
            $soilAnalysis->Magnesium = $request['Magnesium'];
            $soilAnalysis->phSoil = $request['phSoil'];
            $soilAnalysis->phBufferIndex = $request['phBufferIndex'];
            $soilAnalysis->hydrogen = $request['hydrogen'];
            $soilAnalysis->Sulfur = $request['Sulfur'];
            $soilAnalysis->zinc = $request['zinc'];
            $soilAnalysis->Manganese = $request['Manganese'];
            $soilAnalysis->Cooper = $request['Cooper'];
            $soilAnalysis->Iron = $request['Iron'];
            $soilAnalysis->Boron = $request['Boron'];
            $soilAnalysis->Aluminium = $request['Aluminium'];
            $soilAnalysis->excessLime = $request['excessLime'];
            $soilAnalysis->CEC = $request['CEC'];

            //get per cation


            $soilAnalysis->perCationSatK = $request['perCationSatK'];
            $soilAnalysis->perCationSatMg = $request['perCationSatMg'];
            $soilAnalysis->perCationSatH = $request['perCationSatH'];
            $soilAnalysis->perCationSatCa = $request['perCationSatCa'];
            $soilAnalysis->perCationSatNa = $request['perCationSatNa'];

            
            $soilAnalysis->Sulfate = $request['Sulfate'];
            $soilAnalysis->Chloride = $request['Chloride'];
            $soilAnalysis->Ece = $request['Ece'];
            $soilAnalysis->Obs = $request['Obs'];
           
             
            $soilAnalysis->save();
        }
        catch(\Exception $e){
           // do task when error
            return  $e->getMessage();
        }
    
          //  return true;

    
                return response()->json($soilAnalysis);
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