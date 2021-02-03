<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

 
class DeviceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:device-list|device-create|device-edit|device-delete', ['only' => ['index','store']]);
        $this->middleware('permission:device-create', ['only' => ['store']]);
        $this->middleware('permission:device-edit', ['only' => ['update']]);
        $this->middleware('permission:device-delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse
    {
        //so mostra o do user current se for adminCompany or user
        if(auth()->user()->hasRole('admin')){
            $devices=Device::all();
        }

        if(auth()->user()->hasRole('adminCompany') || auth()->user()->hasRole('user')){

           $devices = Device::where('company_id',auth()->user()->company_id)->get();
        }
        
        
        return response()->json($devices);

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
    public function update(Request $request,  $id): JsonResponse
    {

            $this->validate($request, [    
                'enabled' => 'required',
                'id' => 'required',    
                ]);

            $device = Device::find($id);
            $device->enabled = $request->enabled;
            $device->save();

            //if bolck have to logout from all tokens
            // $userTokens = $userInstance->tokens;
            // foreach($userTokens as $token) {
            //     $token->revoke();   
            // }
            
            return response()->json($device);
 
    }

      public function enabledBlock(Request $request,  $id): JsonResponse
    {

            $this->validate($request, [    
                'enabled' => 'required',
                'id' => 'required',    
                ]);

            $device = Device::find($id);
            $device->enabled = $request->enabled;
            $device->save();

            return response()->json($device);
 
    }

      public function addToCompany( $ref,$company): JsonResponse
    {

            // $this->validate($request, [    
            //     'enabled' => 'required',
            //     'id' => 'required',    
            //     ]);

            $device = Device::where('ref',$ref)->first();


            // return response()->json($device);
            if($device->company_id == null && $device->enabled == false){

                $device->enabled = true;
                $device->company_id = $company;
                // return response()->json($device);
                $device->save();
            }
         

            return response()->json($device);
 
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device): JsonResponse
    {
        // DB::table("roles")->where('id',$farm->id)->delete();
        
        // return response()->json($farm);

        // $user = auth('api')->user();

        $device = Device::Where('id',$device->id)->first();

        //if have terrenos
        //change enable to false

        //else
        $device->delete();

        return response()->json("removed with success");
    }
}