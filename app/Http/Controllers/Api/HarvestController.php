<?php

namespace App\Http\Controllers\Api;

use App\Models\Harvest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;
use Illuminate\Database\Eloquent\Builder;

class HarvestController extends Controller
{
    function __construct()
{
    $this->middleware('auth');//->except('logout');

    $this->middleware('permission:harvest-list|harvest-create|harvest-edit|harvest-delete', ['only' => ['index','store']]);
    $this->middleware('permission:harvest-create', ['only' => ['store']]);
    $this->middleware('permission:harvest-edit', ['only' => ['update']]);
    $this->middleware('permission:harvest-delete', ['only' => ['destroy']]);

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
            $harvest=Harvest::all();
        }

        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

           $harvest = Harvest::whereHas('crop.terrain.farm', function (Builder $query) {
                
                    $query->where('farm_company','=', auth()->user()->company_id);
                })->get();

          
        }
        return response()->json($harvest);
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
            'crop_id' => 'required',//|unique:roles,name',
            'kg' => 'required',
            'hectars' => 'required',
            ]);

            $company_id = Auth()->user()->company_id;
            $user_id = Auth()->user()->id;

            $harvest = Harvest::create(['crop_id' => $request->input('crop_id'),
                                    'kg' => $request->input('kg'),
                                    'hectars' => $request->input('hectars'),
                                    'user_id' => $user_id]);
            // $role->syncPermissions($request->input('permission'));

            return response()->json($harvest);
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


      public function storeVariety($id,Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',//|unique:roles,name',
            'master_plant_id' => 'required',
            'nome_variedade' => 'required',
            'name_cientifico' => 'required',
            'tipo_planta_id' => 'required',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => 'required',
            'ph_min' => 'required',
            'ph_max' => 'required',
            'compasso_plantas' => 'required',
            'compasso_linhas' => 'required',
            'fotoperiodo' => 'required',
            'image' => 'required',
            'water_consumption' => 'required',            
            ]);

            $company_id = Auth()->user()->company_id;

            $request['company_id']=$company_id;

            $plant = Plant::create([
                'name' => $request->input('name'),
                'master_plant_id' => $request->input('master_plant_id'),
                'nome_variedade' => $request->input('nome_variedade'),
                'name_cientifico' => $request->input('name_cientifico'),
                'tipo_planta_id' => $request->input('tipo_planta_id'),
                'fracao_esgotamento_agua_solo_conforto_hidrico' => $request->input('fracao_esgotamento_agua_solo_conforto_hidrico'),
                'ph_min' => $request->input('ph_min'),
                'ph_max' => $request->input('ph_max'),
                'compasso_plantas' => $request->input('compasso_plantas'),
                'compasso_linhas' => $request->input('compasso_linhas'),
                'fotoperiodo' => $request->input('fotoperiodo'),
                'image' => $request->input('image'),
                'water_consumption' => $request->input('water_consumption'),
                'company_id' => $request->input('company_id'),
            ]);


            //ir buscar stages and copy
$stagesOfPlant = PlantStage::where('plant_id',$plant->master_plant_id)->get();


foreach ($stagesOfPlant as $stage) {
    PlantStage::create(['plant_id' => $plant->id,
                        'faseNumber' => $stage->faseNumber,
                        'startDayCropFase' => $stage->startDayCropFase,
                        'stopDayCropFase' => $stage->stopDayCropFase,
                        'GrowthStageName' => $stage->GrowthStageName
                    ]);
}
            //ir buscar plagues and copy
$plaguesOfPlant = PlantPlague::where('plant_id',$plant->master_plant_id)->get();

foreach ($plaguesOfPlant as $plague) {
    PlantPlague::create(['plant_id' => $plant->id,
                        'plague_id' => $plague->plague_id
                    ]);
}

            // return view('companys.index',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
            

 // $plant = Plant::create($request);

            // $role->syncPermissions($request->input('permission'));

            return response()->json($plant);
            // return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    public function updateVariety($id,Request $request): JsonResponse
    {
         $this->validate($request, [
            'id' => 'required',
            'name' => 'required',//|unique:roles,name',
            'master_plant_id' => 'required',
            'nome_variedade' => 'required',
            'name_cientifico' => 'required',
            'tipo_planta_id' => 'required',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => 'required',
            'ph_min' => 'required',
            'ph_max' => 'required',
            'compasso_plantas' => 'required',
            'compasso_linhas' => 'required',
            'fotoperiodo' => 'required',
            'image' => 'required',
            'water_consumption' => 'required', 
            'company_id' => 'required',            
            ]);

            $plant = Plant::find($id);


            $plant->name = $request->input('name');
            $plant->master_plant_id = $request->input('master_plant_id');
            $plant->nome_variedade = $request->input('nome_variedade');
            $plant->name_cientifico = $request->input('name_cientifico');
            $plant->tipo_planta_id = $request->input('tipo_planta_id');
            $plant->fracao_esgotamento_agua_solo_conforto_hidrico = $request->input('fracao_esgotamento_agua_solo_conforto_hidrico');
            $plant->ph_min = $request->input('ph_min');
            $plant->ph_max = $request->input('ph_max');
            $plant->compasso_plantas = $request->input('compasso_plantas');
            $plant->compasso_linhas = $request->input('compasso_linhas');
            $plant->fotoperiodo = $request->input('fotoperiodo');
            $plant->image = $request->input('image');
            $plant->water_consumption = $request->input('water_consumption');
            $plant->company_id = $request->input('company_id');


            $plant->save();

    return response()->json($plant);

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
