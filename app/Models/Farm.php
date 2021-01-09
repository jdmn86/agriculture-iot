<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id', 
        'name' ,
        'farm_company', 
        'areaTotal', 
        'localizacao',
        'enabled' 
   ];  

//    protected $appends = ['all_users'];
 
    public function company()
   {
       return $this->belongsTo(Company::class,'farm_company','id'); 
   } 



//     public function device(){
//        return $this->hasOne(Device::class,'device_terrain','id');
//    }

 public function terrains(){
    
       return $this->hasMany(Terrain::class,'farm_id');

   
    }
//       public function weather(){
    
//        return $this->hasMany(Weather::class)->get();

   
//     }
  
}
