<?php

namespace App\Http\Controllers\Api;

use App\Models\DailyWeather;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;
use Illuminate\Database\Eloquent\Builder;

class DailyWeatherController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout'); 
    
        $this->middleware('permission:dailyWeather-list|dailyWeather-create|dailyWeather-edit|dailyWeather-delete', ['only' => ['index','store']]);
        $this->middleware('permission:dailyWeather-create', ['only' => ['store']]);
        $this->middleware('permission:dailyWeather-edit', ['only' => ['update']]);
        $this->middleware('permission:dailyWeather-delete', ['only' => ['destroy']]);
    }

     public function index(): JsonResponse
    {
        //so mostra o do user current se for adminCompany or user
        if(auth()->user()->hasRole('admin')){
            $dailyWeather=DailyWeather::all();
        }

        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

           $dailyWeather = DailyWeather::whereHas('farm', function (Builder $query) {
                
                    $query->where('farm_company','=', auth()->user()->company_id);
                })->get();
// orderBy('id', 'desc')->take(5)->get();
          
        }
        
        
        return response()->json($dailyWeather);

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
        //     'temp' => 'required',//|unique:roles,name', 
        //     'feels_like' => 'required',
        //     'pressure' => 'required',
        //     'humidity' => 'required',
        //     'dew_point' => 'required',
        //     'uvi' => 'required',
        //     'clouds' => 'required',
        //     'visibility' => 'required',
        //     'wind_speed' => 'required',
        //     'wind_deg' => 'required',
        //     ]);

            // $user_id = Auth()->user()->id;

            $currentWeather = new CurrentWeather;

           // $cropPlague = CropPlague::create(['crop_id' => $request->input('crop_id'),
           //                          'plague_id' => $request->input('plague_id'),
           //                          'user_id' => $request->input('user_id')]);
            // $role->syncPermissions($request->input('permission'));



            return response()->json($cropPlague);
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