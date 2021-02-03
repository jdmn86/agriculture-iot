<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AirData extends Model
{
    use HasFactory;

     protected $fillable = [
        'id',

        'device_id',
        'crop_id',
        'terrain_id',
        
        'date',

        'height', 
        'temp',
 
        'precipitation', 
        
        'humidity',
        'dew_point',
        'heat_index',
        'pressure' ,

        'radiation',

        // 'luxFull',
        // 'luxVisible',
        // 'luxIr',
        // 'lux',
        'wetleaf',
        'evpt',

        
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
