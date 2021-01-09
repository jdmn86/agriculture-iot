<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class PlantPlague extends Model
{
    use HasFactory;

    protected $fillable = [
         'plant_id', 'plague_id',
   ];

   public function plant()
   {
       return $this->belongsTo(Plant::class,'plant_id');
       // return $this->belongsTo(Plant::class,'id','plants_id');
   }
   public function plague()
   {
       return $this->belongsTo(Plague::class,'plague_id');
       // return $this->belongsTo(Praga::class,'id','pragas_id');
   }
}
   