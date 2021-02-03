<?php

namespace App\Http\Controllers\Api;

use App\Models\DeviceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DeviceTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');//->except('logout');
    
        $this->middleware('permission:deviceType-list|deviceType-create|deviceType-edit|deviceType-delete', ['only' => ['index','store']]);
        $this->middleware('permission:deviceType-create', ['only' => ['store']]);
        $this->middleware('permission:deviceType-edit', ['only' => ['update']]);
        $this->middleware('permission:deviceType-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $deviceTypes=DeviceType::all();

          return response()->json($deviceTypes);
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
     * @param  \App\Models\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceType $deviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceType $deviceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceType $deviceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceType $deviceType)
    {
        //
    }
}
