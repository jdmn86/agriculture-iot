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

        'company_id',

        'nitrogen_per_phase',
        'phosphorus_per_phase',
        'potassium_per_phase',
        'Magnesium_per_phase',
        'Calcium_per_phase', 
        'Sulfur_per_phase',
        'Sodium_per_phase',
        'Boron_per_phase',         
        'zinc_per_phase',
        'Manganese_per_phase', 
        'Cooper_per_phase', 
        'Iron_per_phase',
        'Aluminium_per_phase' ,

        'created_at',
 
];   

  //protected $table = 'soil_datas';
  protected $appends = ['daysOfFase'];


public function getDaysOfFaseAttribute()
{
  return $this->stopDayCropFase - $this->startDayCropFase;
}

public function company()
{
    return $this->belongsTo(Company::class,'company_id');
}

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