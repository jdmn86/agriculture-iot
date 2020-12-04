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
        'nitrogen',
        'phosphorus',
        'potassium',
        'Magnesium',
        'Calcium',
        'Sulfur',
        'Sodium',
        'Boron',           
        'zinc',
        'Manganese', 
        'Cooper', 
        'Iron',
        'Aluminium'    
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
}
 