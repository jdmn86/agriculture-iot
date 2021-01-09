<?php

namespace App\Http\Controllers\Api;

use App\Models\Terrain;
use App\Models\Farm;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

use Illuminate\Database\Eloquent\Builder;
 
class TerrainController extends Controller 
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:terrain-list|terrain-create|terrain-edit|terrain-delete', ['only' => ['index','store']]);
        $this->middleware('permission:terrain-create', ['only' => ['store']]);
        $this->middleware('permission:terrain-edit', ['only' => ['update']]);
        $this->middleware('permission:terrain-delete', ['only' => ['destroy']]);
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        { 

             if(auth()->user()->hasRole('admin')){
                $terrain = Terrain::all();
            }

            if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

                // $terrain = Terrain::with('farm')->has('farm')->where('farm_company',"=",auth()->user()->company_id)->get();

                $terrain = Terrain::whereHas('farm', function (Builder $query) {
                    $query->where('farm_company',auth()->user()->company_id);
                })->get();
            }

            
            // return view('companys.index',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
            return response()->json($terrain);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        // public function create()
        // {
        //     $company = Company::get();
        //     return view('companys.create',compact('company'));
        // }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request): JsonResponse
        {
            

              $validatedData = $request->validate([
                'name' => 'required|max:255',
                'coords' => 'required',
                'farm_id' => 'required',
                'area' => 'required', 
            ]);
    
                // $id = auth()->user()->company_id;
    
            $terrain = new Terrain;
            try{
                
                $terrain->name = $request['name'];
                // $terrain->terrain_user = $user->id;
                $terrain->coords = $request['coords'];
                $terrain->farm_id = $request['farm_id'];
                $terrain->area = $request['area'];

                $terrain->save();
            }
            catch(\Exception $e){ 
               // do task when error
                return  $e->getMessage();
            }
    

            $farm = Farm::Where('id',$request['farm_id'])->first();

            $farm->areaTotal = $farm->areaTotal + $request['area'];
            $farm->save();

            return response()->json($terrain);
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
        public function update(int $id, Request $terrain): JsonResponse
        {

            $this->validate($terrain, [
                'name' => 'required|max:255',
                'coords' => 'required',
                'farm_id' => 'required',
                'area' => 'required', 
            ]);
             $terrainToUpdate = Terrain::find($id);

              try{
                
                $terrainToUpdate->name = $terrain['name'];
                // $terrain->terrain_user = $user->id;
                $terrainToUpdate->coords = $terrain['coords'];
                $terrainToUpdate->farm_id = $terrain['farm_id'];
                $terrainToUpdate->area = $terrain['area'];

                $terrainToUpdate->save();
            }
            catch(\Exception $e){ 
               // do task when error
                return  $e->getMessage();
            }

            return response()->json($terrainToUpdate);
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Company  $company
         * @return \Illuminate\Http\Response
         */
        public function destroy(Terrain $company): JsonResponse
        {
            DB::table("roles")->where('id',$id)->delete();
            return redirect()->route('roles.index')->with('success','Role deleted successfully');
        }
    }