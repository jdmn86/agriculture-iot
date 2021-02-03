<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'brand',
        'is_biologic',
        'is_liquid',
        'quantityL', //litros
        'quantityKg', //kg 
  		'granulometry',
        'typeProduct_id',  //fertilizer	        
        'solubility',
        'composition_id',
        'activeIngredients',
        'ph',
        'description',
        'aplicationRates',
        'directionsForUse',
        'storage',
        'compatibility',
        'warnings',
        'image',
        'created_at'
    ]; 

    protected $casts = [
      'is_biologic' => 'boolean',
      'is_liquid' => 'boolean',
    ];

    /** 
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    // protected $hidden = [ 
    //     'password', 'remember_token',
    // ];
     public function typeProduct()
    {
        return $this->belongsTo(ProductType::class,'typeProduct_id');
    }

     public function composition()
    {
        return $this->belongsTo(ProductComposition::class,'composition_id');
    }

    // public function getIsBiologicAttribute($value)
    // {
    //   if($value =="0") return false;
    //   return true;
    // }
}
 