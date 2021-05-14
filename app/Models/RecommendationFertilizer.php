<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 class RecommendationFertilizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        // 'soilAnalysis_id',
        'Lime', //  kg/ha
        'nitrogen',
        'phosphorus',        
        'potash', 
        'Magnesium', 
        'zinc',
        'Sulfur',
        'Manganese',         
        'Cooper', 
        'Iron',
        'Boron',
        'created_at',
        'Obs'
   ];  

  //protected $table = 'soil_datas';

  public function analyseSoil()
   {
       return $this->hasOne(AnalyseSoil::class,'id','analysisGuideline_id');
   }
}