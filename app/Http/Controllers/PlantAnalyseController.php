<?php

namespace App\Http\Controllers;

use App\Models\PlantAnalyse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;


class PlantAnalyseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:plantAnalyse-list|plantAnalyse-create|plantAnalyse-edit|plantAnalyse-delete', ['only' => ['index','store']]);
        $this->middleware('permission:plantAnalyse-create', ['only' => ['create','store']]);
        $this->middleware('permission:plantAnalyse-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:plantAnalyse-delete', ['only' => ['destroy']]);
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
     * @param  \App\Models\PlantAnalyse  $plantAnalyse
     * @return \Illuminate\Http\Response
     */
    public function show(PlantAnalyse $plantAnalyse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantAnalyse  $plantAnalyse
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantAnalyse $plantAnalyse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantAnalyse  $plantAnalyse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantAnalyse $plantAnalyse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantAnalyse  $plantAnalyse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantAnalyse $plantAnalyse)
    {
        //
    }
}
