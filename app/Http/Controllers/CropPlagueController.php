<?php

namespace App\Http\Controllers\Api;

use App\Models\CropPlague;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class CropPlagueController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:cropPlague-list|cropPlague-create|cropPlague-edit|cropPlague-delete', ['only' => ['index','store']]);
        $this->middleware('permission:cropPlague-create', ['only' => ['create','store']]);
        $this->middleware('permission:cropPlague-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:cropPlague-delete', ['only' => ['destroy']]);
    }
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cultivoP= new CultivoPragas();

        $cultivoP->cultivo_id = $request->cultivo_id;
        $cultivoP->pragas_id = $request->pragas_id;

        $cultivoP->save();

        return $cultivoP;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CropPlague  $cropPlague
     * @return \Illuminate\Http\Response
     */
    public function show(CropPlague $cropPlague)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CropPlague  $cropPlague
     * @return \Illuminate\Http\Response
     */
    public function edit(CropPlague $cropPlague)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CropPlague  $cropPlague
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CropPlague $cropPlague)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CropPlague  $cropPlague
     * @return \Illuminate\Http\Response
     */
    public function destroy(CropPlague $cropPlague)
    {
        //
    }
}
