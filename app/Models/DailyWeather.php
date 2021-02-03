<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWeather extends Model
{
    use HasFactory;

      protected $fillable = [
         'id' ,
         'id_farm',

         'date', 
         'weekDay',
         'icon', 

         'weather_type',

         'sunrise',
         'sunset',

         'temp_min',
         'temp_max',
         'dew_point',
         'humidity',
         'pressure',
         'wind_speed',
         'wind_gust',
         'wind_deg',
         'uvi', 
         'clouds', 
         'pop', 
         'rain', 
         'snow', 

    ]; 

   public function farm()
    {
        return $this->belongsTo(Farm::class,'id_farm','id');
    }
}
 
