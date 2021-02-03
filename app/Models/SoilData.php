<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoilData extends Model
{
    use HasFactory;

      protected $fillable = [
        'id',

        'device_id',
        'crop_id',
        'terrain_id',
        
        'date',

        'temp20', 
        'temp40',
 
        'humidade20', 
        'humidade40',

        'lat', 
        'lng',
        
        'created_at',
        
    ]; 


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array 
     */
    
    // protected $hidden = [ 
    //     'password', 'remember_token',
    // ];
     public function device()
    {
        return $this->belongsTo(Device::class,'device_id');
    }
     public function crop()
    {
        return $this->belongsTo(Crop::class,'crop_id');
    }
     public function terrain()
    {
        return $this->belongsTo(Terrain::class,'terrain_id');
    }
}

