<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plague extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id', 
        'nome_comum' , 
        'nome_cientifico', 
        'plagueType_id',
        'cause',
        'comments', 
        'management',
        'symptoms', 
        'image',
        'language', 
        'user_id'
   ]; 

   public function user() 
   {
       return $this->belongsTo(User::class,'user_id');
   }

//    public function condicoeAtaque()
//    {
//        return $this->belongsTo('App\CondicoesAtaque','condicoes_ataque_id');
//    }

    public function plagueType()
   {
       return $this->belongsTo(PlagueType::class,'plagueType_id');
   } 

    //    public function fasesAtaque()  
    //    {
    //        return $this->hasMany(FasesAtaque::class,'id_praga');
    //    }


    public function plants()
   {
       return $this->belongsToMany('App\Plant','plant_plagues','plague_id','plants_id');
   }
   

    public function partsAnatomy()
   {
    //    return $this->belongsToMany('App\ZonaAtaque','praga_zona_ataques','plague_id','zona_id');
       return $this->belongsToMany('App\PlantsPartsAnatomy','plague_plants_parts_anatomies','plague_id','part_id');
   }

     public function cultivo()
   {
       return $this->belongsToMany('App\Crop','cultivo_pragas','cultivo_id','pragas_id');
   }
}
// return $this->belongsToMany('App\Plague','plague_plants_parts_anatomies','plague_id','part_id');