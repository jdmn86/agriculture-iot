<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaguePlantsPartsAnatomy extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id', 'plague_id', 'part_id',
   ];

   public function plague()
   { 
       return $this->belongsTo(Plague::class,'id','plague_id');
   }
   public function part()
   {
       return $this->belongsTo(PlantPartsAnatomy::class,'id','part_id');
   }
}
