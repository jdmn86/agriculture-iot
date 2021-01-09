<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
  protected $appends = ['daysOfFase'];

  public function plant()
   {
       return $this->belongsTo(Plant::class,'plant_id', 'id');
   }
   public function crop()
   { 
       // return $this->hasMany(Cultivo::class,'cultivo_id', 'id');
       return $this->hasMany(Crop::class,'cropStage_id', 'id');
   }

 public function getDaysOfFaseAttribute()
 {
      return $this->stopDayCropFase - $this->startDayCropFase;
   }

}