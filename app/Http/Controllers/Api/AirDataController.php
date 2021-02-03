<?php

namespace App\Http\Controllers\Api;

use App\Models\AirData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

use App\Models\Terrain;
use App\Models\Plant;

use Carbon\Carbon;

class AirDataController extends Controller
{
     function __construct() 
    {
        $this->middleware('auth');//->except('logout'); 
    
        $this->middleware('permission:crop-list|crop-create|crop-edit|crop-delete', ['only' => ['index','store']]);
        $this->middleware('permission:crop-create', ['only' => ['store']]);
        $this->middleware('permission:crop-edit', ['only' => ['update']]);
        $this->middleware('permission:crop-delete', ['only' => ['destroy']]);
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
                $airData=AirData::all();
            }

            if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

              // $crops = Crop::all();
               $airData = AirData::whereHas('terrain.farm', function($query){
                
                    $query->where('farm_company','=', auth()->user()->company_id);
               })->get();
            }
            
            
            return response()->json($airData);
        }

           public function getByCrop($cropId): JsonResponse
        {
            //so mostra o do user current se for adminCompany or user
            if(auth()->user()->hasRole('admin')){
                $airData=AirData::all();
            }

            if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

              // $crops = Crop::all();
               $airData = AirData::where('crop_id',$cropId)->get();
               // whereHas('terrain.farm', function($query){
                
               //      $query->where('farm_company','=', auth()->user()->company_id);
               // })->get();
            }
            
            
            return response()->json($airData);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request): JsonResponse
        {


            //recebe coordenada vai ao device e altera as coordenada do evice

            // vai buscar as farms do user->company

            //para cada terreno da farm ve se a coordenada do device esta dentro do terreno

            //guarda os dados com o id da crop e do terreno

           



            $this->validate($request, [
                'num_plantas' => 'required',//|unique:roles,name',
                'id_plant' => 'required',
                'id_terrain' => 'required',
                'expectedProduction' => 'required',
                'isSeed' => 'required',
                ]);
    
        // try{
            $cultivo = new Crop;
    
           $terrain = Terrain::where('id',$request['id_terrain'])->first();


           // if($request['variedade']){
           //      $plant = Plant::where('id',$request['variedade'])->with('fases')->first(); 
           // }else{
           //      $plant = Plant::where('id',$request['plant'])->with('fases')->first(); 
           // }


            $plant = Plant::where('id',$request['id_plant'])->with('plantStage')->first(); 
           


           $areaPrevista=($plant->compasso_plantas*$plant->compasso_linhas)*$request['num_plantas'];


           if($terrain->area > ($areaPrevista*1.15)){
                $cultivo->densidade_distribuicao_terreno = 1; 
           }else if($terrain->area < ($areaPrevista*1.15)){
                $cultivo->densidade_distribuicao_terreno = 3; 
           }else{
                $cultivo->densidade_distribuicao_terreno = 2; 
           }
           




            $cultivo->num_plantas = $request['num_plantas'];
            // $cultivo->id_plant = $plant->id;
            $cultivo->id_plant = $request['id_plant'];

            // return $cultivo;

            $cultivo->id_terrain = $request['id_terrain']; 
            // if(isset($request['device'])){
            //     $cultivo->id_device = $request['device'];        
            // }
// return response()->json($plant);            
            // return $request['isTransplant'];

            if($request['isSeed']){
          
                $cultivo->isSeed = $request['isSeed']; 

    //tem de ir buscar a o id da fase cultivo
                $cultivo->cropStage_id = 3; 

                $cultivo->crop_day = $plant->plantStage[3]->startDayCropFase;
                
                //ir a plant as fases de cultivo 
                //na fase 3 ir buscar o startDayCropFase

            }else{

                $cultivo->isSeed = false; 
    //tem de ir buscar a o id da fase cultivo            
                $cultivo->cropStage_id = 1; 

                
                $cultivo->crop_day = $plant->plantStage[1]->startDayCropFase;
                //ir a plant as fases de cultivo 
                //na fase 3 ir buscar o startDayCropFase

            }
            


            $cultivo->expectedProduction = $request['expectedProduction'];

 // return response()->json($cultivo);            

            // $now = new \DateTime();
            $now = Carbon::now();
            $cultivo->start_crop_date = $now->toDateTimeString();

            // if($request['semear']==true){
            //     $cultivo->fase_cultivo = 1;    
            // }else{
            //     $cultivo->fase_cultivo = 2;    
            // }
            

$cultivo->enabled = true;  
 // return response()->json($cultivo);
            $cultivo->save(); //erro aqui
    
    //     }
    // catch(\Exception $e){
    //     return  $e->getMessage();
    // }
    
            return response()->json($cultivo);
               
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
    