<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'deviceMac', 'device_user','type','enabled','lat','lng','uptime','battery_status','connected','masterId','created_at', 'num_reads','terrain_id'
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

//    public function user()
//    {
//        return $this->belongsTo(User::class,'device_user','id');
//    } 

    public function terrain()
   {
       return $this->belongsTo(Terrain::class,'terrain_id','id');
   }

    //  public function Weather(){
    
    //    return $this->hasMany(Weather::class);
   
    // }
}
 