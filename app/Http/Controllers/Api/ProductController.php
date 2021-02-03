<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\ProductComposition;
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

        // if(isset($request['isComposition']) && $request['isComposition'] == true){
                            
            $composition = ProductComposition::create([
                'nitrogenTotal' => $request->input('composition.nitrogenTotal'),
                'nitrateNitrogen' => $request->input('composition.nitrateNitrogen'),
                'amoniacalNitrogen' => $request->input('composition.amoniacalNitrogen'),
                'otherNitrogen' => $request->input('composition.otherNitrogen'),
                'P2O5' => $request->input('composition.P2O5'),
                'K2O' => $request->input('composition.K2O'),
                'CaO' => $request->input('composition.CaO'),
                'MgO' => $request->input('composition.MgO'),
                'SO3' => $request->input('composition.SO3'),
                'Ca' => $request->input('composition.Ca'),
                'B' => $request->input('composition.B'),
                'Cu' => $request->input('composition.Cu'),
                'Fe' => $request->input('composition.Fe'),
                'Mn' => $request->input('composition.Mn'),
                'Mo' => $request->input('composition.Mo'),
                'Zn' => $request->input('composition.Zn'),
                'OrganicMatter' => $request->input('composition.OrganicMatter'),
            ]);

        // }


        $product = Product::create([
             'name' => $request->input('name'),
             'brand' => $request->input('brand'),
             'is_biologic' => $request->boolean('is_biologic'),
             'is_liquid' => $request->boolean('is_liquid'),
              
             'granulometry' => $request->input('granulometry'),
             'typeProduct_id' => $request->input('typeProduct_id'),
             'solubility' => $request->input('solubility'),
                            
             'activeIngredients' => $request->input('activeIngredients'),
             'ph' => $request->input('ph'),
             'description' => $request->input('description'),
             'aplicationRates' => $request->input('aplicationRates'),
             'directionsForUse' => $request->input('directionsForUse'),
             'storage' => $request->input('storage'),
             'compatibility' => $request->input('compatibility'),
             'warnings' => $request->input('warnings'),
        ]);

        if(isset($request['is_liquid']) && $request['is_liquid'] == true){
            $product['quantityL'] = $request->input('quantityL');    
        }else{
            $product['quantityKg'] = $request->input('quantityKg');    
        } 
    
        if(isset($request['isComposition']) && $request['isComposition'] == true){
            $product['composition_id'] = $composition['id'];
        }   

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
    public function update($id,Request $request): JsonResponse
    {
        // $this->validate($request, [
        // 'name' => 'required',
        // 'permission' => 'required',
        // ]);
    
        try{



        // if(isset($request['composition_id']) ||  isset($request['composition'])){
            
            $composition = ProductComposition::find($request['composition_id']);

            $composition->nitrogenTotal = $request->input('composition.nitrogenTotal');
            $composition->nitrateNitrogen = $request->input('composition.nitrateNitrogen');
            $composition->amoniacalNitrogen = $request->input('composition.amoniacalNitrogen');
            $composition->otherNitrogen = $request->input('composition.otherNitrogen');
            $composition->P2O5 = $request->input('composition.P2O5');
            $composition->K2O = $request->input('composition.K2O');
            $composition->CaO = $request->input('composition.CaO');
            $composition->MgO = $request->input('composition.MgO');
            $composition->SO3 = $request->input('composition.SO3');
            $composition->Ca = $request->input('composition.Ca');
            $composition->B = $request->input('composition.B');
            $composition->Cu = $request->input('composition.Cu');
            $composition->Fe = $request->input('composition.Fe');
            $composition->Mn = $request->input('composition.Mn');
            $composition->Mo = $request->input('composition.Mo');
            $composition->Zn = $request->input('composition.Zn');
            $composition->OrganicMatter = $request->input('composition.OrganicMatter');
            
            $composition->save();

        // }


            $product = Product::find($id);

            $product->name = $request->input('name');
            $product->brand = $request->input('brand');
            $product->is_biologic = $request->boolean('is_biologic');
            $product->is_liquid = $request->boolean('is_liquid');
            $product->granulometry = $request->input('granulometry');
            $product->typeProduct_id = $request->input('typeProduct_id');
            $product->solubility = $request->input('solubility');
            $product->activeIngredients = $request->input('activeIngredients');
            $product->ph = $request->input('ph');
            $product->description = $request->input('description');
            $product->aplicationRates = $request->input('aplicationRates');
            $product->directionsForUse = $request->input('directionsForUse');
            $product->storage = $request->input('storage');
            $product->compatibility = $request->input('compatibility');
            $product->warnings = $request->input('warnings');
            

        if(isset($request['is_liquid']) && $request['is_liquid'] == true){
            $product->quantityL= $request->input('quantityL');    
            $product->quantityKg = null;
        }else{
            $product->quantityKg = $request->input('quantityKg');    
            $product->quantityL = null;    
        } 

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