<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComposition extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        //'product_id',
        'nitrogenTotal',
        'nitrateNitrogen',
        'amoniacalNitrogen',  //fertilizer
        'otherNitrogen',
        'P2O5',
        'K2O',
        'CaO',
        'MgO',
        'SO3',
        'Ca',
        'B',
        'Cu',
        'Fe',
        'Mn',
        'Mo',
        'Zn',
        'OrganicMatter',
        'created_at'
    ]; 
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    // protected $hidden = [ 
    //     'password', 'remember_token',
    // ];
     public function product()
    {
        return $this->hasOne(Product::class);
    }
}
 