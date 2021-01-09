<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantPartsAnatomy extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'id', 
        'part',
        
    ]; 


    public function plague()
    { 
        return $this->belongsToMany('App\Plague','plague_plants_parts_anatomies','plague_id','part_id');
    }
}
  