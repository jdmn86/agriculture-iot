<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyseWater extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'terrain_id',
        'ph',
       'nitrateAsNitrogen',
       'nitrateAsNo3',
       'totalColiform',
       'eColi',
       'hardnessCaCo3',
       'totalDissolvedSolids',
       'chloride',
       'sulfates',
       'calcium',
       'phosphorus',
       'magnesium',
       'potassium',
       'sodium',
       'iron',
       'manganese',
       'zinc',
       'copper',
       'sulfateSulfur',
       'alkalinity',
       'molybdenum',
       'selenium',
       'boron',
       'date',
   ]; 

  public function terrain()
   {
       return $this->belongsTo(Terrain::class,'terrain_id', 'id');
   }
}
 