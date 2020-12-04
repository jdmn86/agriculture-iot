<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'num_plantas' ,
        'id_plant', 
        // 'id_device',
        'id_terrain',
        'densidade_distribuicao_terreno',
        'cropStage_id',
        'created_at',
        'expectedProduction',  
        'start_crop_date',
        'finish_crop_date',
        'isSeed',
        'crop_day', 
        'enabled'
   ]; 

   // protected $appends = ['startCropDate'];

  
   public function getStartCropDateAttribute($value)
   {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
       //return $dateStart->format('Y-m-d');
       //return date('Y-m-d H:i:s', strtotime($value->startCrop_date));
   }

public function terrain()
   {
       return $this->belongsTo(Terrain::class,'id_terrain')->with('farm'); 

   }


    public function farm()
   {
    // return $this->belongsToMany('App\Terrain')->withPivot('name', 'areaTotal','localizacao');
       return $this->hasOneThrough(Farm::class, Terrain::class,'farm_id','id','id','id_terrain');
   }
// return $this->hasOneThrough(
//             'App\Models\farm',
//             'App\Models\terrain',
//             'farm_id', // Foreign key on terrain table...
//             'terrain_id', // Foreign key on farm table...
//             'id', // Local key on cultivo table...
//             'id' // Local key on terrain table...
//         );


   public function plant()
   {
     
       return $this->hasOne('App\Plant','id','id_plant');
   }
    public function cropStage()
   {
       return $this->belongsTo(PlantStage::class,'cropStage_id','id'); 
   }

   public function plague()
   {
       return $this->belongsToMany('App\Plague','crop_plagues','crop_id','plague_id');
   }

}
