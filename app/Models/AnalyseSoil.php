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
        'matOrgPerLevel',
        'nitrogen',
        'nitrogenLevel',
        'phosphorus',         
        'phosphorusLevel',
        'potassium', 
        'potassiumLevel',
        'Magnesium',
        'MagnesiumLevel',
        'phSoil',
        'phSoilLevel', 
        'phBufferIndex',
        'hydrogen',
        'hydrogenLevel',
        'Sulfur',
        'SulfurLevel',
        'zinc',
        'zincLevel',
        'Manganese',         
        'ManganeseLevel',
        'Cooper',
        'CooperLevel',
        'Iron',
        'IronLevel',
        'Boron',
        'BoronLevel',
        'Aluminium',
        'AluminiumLevel',
        'excessLime',
        'CEC',
        'perCationSatK',
        'perCationSatKLevel',
        'perCationSatMg',
        'perCationSatMgLevel',
        'perCationSatH',
        'perCationSatHLevel',
        'perCationSatCa',
        'perCationSatCaLevel',
        'perCationSatNa',
        'perCationSatNaLevel',
        'Sulfate',
        'SulfateLevel',
        'Chloride',
        'ChlorideLevel',
        'Ece',
        'EceLevel',
        'created_at',
        'Obs'
   ];  

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
   public function guide(){

       return $this->belongsTo(SoilAnalysisGuidelines::class,'analysisGuideline_id', 'id');

   }
}
 