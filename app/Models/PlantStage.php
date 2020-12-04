<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'plant_id',
        'faseNumber', 
        'startDayCropFase', 
        'stopDayCropFase', 
        'GrowthStageName',
 
];  

  //protected $table = 'soil_datas';

  public function plant()
   {
       return $this->belongsTo(Plant::class,'plant_id', 'id');
   }
   public function crop()
   { 
       // return $this->hasMany(Cultivo::class,'cultivo_id', 'id');
       return $this->hasMany(Crop::class,'cropStage_id', 'id');
   }
}