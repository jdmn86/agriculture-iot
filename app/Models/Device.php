<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 
        'device_type_id', 
        'ref',
        'lat', 
        'lng',
        'uptime',        
        'battery_status',
        'num_reads',
        'enabled', 
        'company_id', 
        'created_at', 
   
   ];

   protected $casts = [ 
   'enabled' => 'boolean',
   ];
 
//    public function dataAir()
//    {
//        return $this->hasMany('App\DataAir','device_id','id');
//    }

//    public function dataSoil() 
//    {
//        return $this->hasMany('App\DataSoil','device_id','id');
//    }

   public function deviceType()
   {
       return $this->belongsTo(DeviceType::class,'device_type_id','id');
   } 

    public function company()
   {
       return $this->belongsTo(Company::class,'company_id','id');
   }

    //  public function Weather(){
    
    //    return $this->hasMany(Weather::class);
   
    // }
}
 