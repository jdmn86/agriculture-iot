<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysePlant extends Model
{
     use HasFactory;

    protected $fillable = [
        'id' , 
        'crop_id',
        'nitrogen',
        'nitrateNitrogen',
        'sulfur',         
        'phosphorus',
        'potassium',
        'magnesium',
        'calcium',
        'sodium',
        'boron',
        'zinc',
        'manganese',
        'iron', 
        'copper',
        'aluminium',
        'chloride',         
        'date'
   ]; 

  public function crop()
   {
       return $this->belongsTo(Crop::class,'crop_id', 'id');
   }
}
 