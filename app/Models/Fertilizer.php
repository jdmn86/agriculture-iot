<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',
        'id_terrain',
        'id_crop',
        'id_farm',
        'id_product',
        'quantityL', //litros
        'quantityKg', //kg 
  		'is_soluble',
        'waterL',  //fertilizer	        
        
        'created_at'
    ]; 

    protected $casts = [
      'is_soluble' => 'boolean',
      
    ];

      public function terrain()
    {
        return $this->belongsTo(Terrain::class,'id_terrain');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class,'id_crop');
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class,'id_farm');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'id_product');
    }

}

 