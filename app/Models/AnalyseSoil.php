<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyseSoil extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'terrain_id',
        'tipoSolo_id',
        
        'analysisGuideline_id',
 
        'soilDepth',
        'date',
        
        'matOrgPer',
        'nitrogen',
        'phosphorus',         
        'potassium', 
        'Magnesium',
        'Calcium',
        'Sodium',
        'phSoil',
        'phBufferIndex',
        'hydrogen',
        'Sulfur',
        'zinc',
        'Manganese',         
        'Cooper',
        'Iron',
        'Boron',
        'Aluminium',
        'excessLime',
        'CEC',
        'perCationSatK',
        'perCationSatMg',
        'perCationSatH',
        'perCationSatCa',
        'perCationSatNa',
        'Sulfate',
        'Chloride',
        'Ece',
        'created_at',
        'Obs',
   ];  

// protected $with = ['guide'];
  //protected $table = 'soil_datas';

   public function soilType(){
     return $this->belongsTo(SoilType::class,'tipoSolo_id', 'id');
   }

  public function terrain()
   {
       return $this->belongsTo(Terrain::class,'terrain_id', 'id');
   }
   public function cultivo()
   {
       return $this->belongsTo(Cultivo::class,'cultivo_id');//, 'id');
   }
   public function analysisGuideline(){

       return $this->belongsTo(AnalyseSoilGuideline::class,'analysisGuideline_id', 'id');

   }
}
 