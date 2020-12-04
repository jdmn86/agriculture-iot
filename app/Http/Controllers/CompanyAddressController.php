<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class CompanyAddressController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:companyAddress-list|companyAddress-create|companyAddress-edit|companyAddress-delete', ['only' => ['index','store']]);
        $this->middleware('permission:companyAddress-create', ['only' => ['create','store']]);
        $this->middleware('permission:companyAddress-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:companyAddress-delete', ['only' => ['destroy']]);
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
     * @param  \App\Models\CompanyAddress  $companyAddress
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyAddress $companyAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyAddress  $companyAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyAddress $companyAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyAddress  $companyAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyAddress $companyAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyAddress  $companyAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyAddress $companyAddress)
    {
        //
    }
}
