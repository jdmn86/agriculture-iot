<?php

namespace App\Http\Controllers;

use App\Models\PlantPlague;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class PlantPlagueController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:plantPlague-list|plantPlague-create|plantPlague-edit|plantPlague-delete', ['only' => ['index','store']]);
        $this->middleware('permission:plantPlague-create', ['only' => ['create','store']]);
        $this->middleware('permission:plantPlague-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:plantPlague-delete', ['only' => ['destroy']]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantPlague  $plantPlague
     * @return \Illuminate\Http\Response
     */
    public function show(PlantPlague $plantPlague)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantPlague  $plantPlague
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantPlague $plantPlague)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantPlague  $plantPlague
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantPlague $plantPlague)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantPlague  $plantPlague
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantPlague $plantPlague)
    {
        //
    }
}
