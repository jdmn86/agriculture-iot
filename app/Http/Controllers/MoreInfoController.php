<?php

namespace App\Http\Controllers;

use App\Models\MoreInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use DB;

class MoreInfoController extends Controller
{
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
        //erro aqui
		if (config('services.recaptcha.enabled') && !$this->checkRecaptcha($request['token'])) {

            return response()->json('Recaptcha inválido.', 500);

        }
        
	  	$moreinfo = new Moreinfo; 

	    $moreinfo->name = $request['name'];
	    $moreinfo->email = $request['email'];
	    if(isset($request->phone)){
	    	$moreinfo->phone = $request['phone'];	
	    }else{
	    	$moreinfo->phone=null;
	    }
	    
	    $moreinfo->message = $request['message'];

	    //$moreinfo->save();

	    return response()->json([
	        'success' => $moreinfo->save()
	    ]);
    }

    protected function checkRecaptcha($token)
    {


        $response = (new Client)->post('https://www.google.com/recaptcha/api/siteverify', [
           'form_params' => [
               'secret' => '6Lc_KocUAAAAAB90o-ivLttHH3Hiv5XASD3GQPcv',//config('services.recaptcha.secret'),
               'response' => $token,
           ],
       ]);



       $response = json_decode((string) $response->getBody(), true);

       return $response['success'];
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoreInfo  $moreInfo
     * @return \Illuminate\Http\Response
     */
    public function show(MoreInfo $moreInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoreInfo  $moreInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(MoreInfo $moreInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MoreInfo  $moreInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoreInfo $moreInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoreInfo  $moreInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoreInfo $moreInfo)
    {
        //
    }
}
