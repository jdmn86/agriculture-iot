<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantUptake extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'plantStage_id',
        'plant_id',
        'expectedProductionByHa',

        'nitrogen_total',
        'phosphorus_total',
        'potassium_total',
        'Magnesium_total',
        'Calcium_total', 
        'Sulfur_total',
        'Sodium_total',
        'Boron_total',           
        'zinc_total',
        'Manganese_total', 
        'Cooper_total', 
        'Iron_total',
        'Aluminium_total',
        'created_at',

        'company_id',
   ];  
 
  //protected $table = 'soil_datas'; 

  public function plantStage()
   {
       return $this->belongsTo(PlantStage::class,'plantStage_id', 'id');
   }
     public function plant()
   {
       return $this->belongsTo(Plant::class,'plant_id', 'id');
   }

    public function company()
  {
    return $this->belongsTo(Company::class,'company_id');
  }

}
 