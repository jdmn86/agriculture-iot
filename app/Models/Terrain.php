<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name' ,'farm_id', 'coords','enabled','area'
   ];  


//     public function user()
//    {
       
//        return $this->belongsTo(User::class,'terrain_user','id'); 

//    }
   
    public function farm()
   {

       return $this->belongsTo(Farm::class,'farm_id','id'); 

   }

//    public function cultivo(){
    
//        return $this->hasOne(Cultivo::class,'id_terrain');
   
//    }

//    public function device(){
     
//        return $this->hasMany(Device::class);
   
//    }

//    public function tipoSolo(){

//        return $this->hasOne(TipoSolo::class)->latest(); //->first()

//    }

//    public function water(){ 
    
//        return $this->hasOne(Water::class)->latest(); 
   
//    }

//    public function soilData(){
    
//        return $this->hasOne(SoilData::class)->latest();

//    }

}
