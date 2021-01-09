<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB; 

class ProductController extends Controller
{
    function __construct() 
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['store']]);
        $this->middleware('permission:product-edit', ['only' => ['update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(): JsonResponse
        {
            $product = Product::all();
            // return view('companys.index',compact('companys'))->with('i', ($request->input('page', 1) - 1) * 5);
            return response()->json($product);
        }  
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request): JsonResponse
        {
           
        try{

            if(isset($request['haveComposition']) && $request['haveComposition'] == true){
                                

                $composition = new ProductComposition;
            
                $composition->nitrogenTotal = $request['composition']['nitrogenTotal'];
                $composition->nitrateNitrogen = $request['composition']['nitrateNitrogen'];
                $composition->amoniacalNitrogen = $request['composition']['amoniacalNitrogen'];
                $composition->otherNitrogen = $request['composition']['otherNitrogen'];
                $composition->P2O5 = $request['composition']['P2O5'];
                $composition->K2O = $request['composition']['K2O'];
                $composition->CaO = $request['composition']['CaO'];
                $composition->MgO = $request['composition']['MgO'];
                $composition->SO3 = $request['composition']['SO3'];
                $composition->Ca = $request['composition']['Ca'];
                $composition->B = $request['composition']['B'];
                $composition->Cu = $request['composition']['Cu'];
                $composition->Fe = $request['composition']['Fe'];
                $composition->Mn = $request['composition']['Mn'];
                $composition->Mo = $request['composition']['Mo'];
                $composition->Zn = $request['composition']['Zn'];
                $composition->OrganicMatter = $request['composition']['OrganicMatter'];

                $composition->save();

            }

           $product = new Product;
            
            $product->name = $request['name'];
            $product->brand = $request['brand'];
            
            $product->isBiologic = $request['isBiologic'];
            $product->isLiquid = $request['isLiquid'];
            $product->quantityL = $request['quantityL'];
            $product->quantityKg = $request['quantityKg'];
            $product->granulometry = $request['granulometry'];
            $product->typeProduct_id = $request['typeProduct_id'];
            $product->solubility = $request['solubility'];

            if(isset($request['haveComposition']) && $request['haveComposition'] == true){
                $product->composition_id = $composition->id;
            }

            $product->activeIngredients = $request['activeIngredients'];
            $product->ph = $request['ph'];
            $product->description = $request['description'];
            $product->aplicationRates = $request['aplicationRates'];
            $product->directionsForUse = $request['directionsForUse'];
            $product->storage = $request['storage'];
            $product->compatibility = $request['compatibility'];
            $product->warnings = $request['warnings'];
             
         

            $product->save();
        }
        catch(\Exception $e){
           // do task when error
            return  $e->getMessage();
        }
    
          //  return true;

            return response()->json($product);
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