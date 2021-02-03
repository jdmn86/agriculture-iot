<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentWeather extends Model
{
    use HasFactory;

     protected $fillable = [
         'id' ,
         'id_farm',
         
         'date',
         'weekDay',
         'icon',  //current.weather.icon
         // 'precipIntensity', 
         'clouds', //current.clouds   %
         'weather_type',  //current.weather.main Group of weather parameters (Rain, Snow, Extreme etc.)
         'temp', //current.temp
         'feels_like', //current.feels_like
         'dew_point',
         'humidity', //current.humidity
         'pressure', //current.pressure
         'wind_speed', //current.wind_speed
         'wind_gust', //current.wind_gust
         'wind_deg', //current.wind_deg
         // 'cloudCover',
         'uvi', //current.uvi
         'visibility', //current.visibility
         // 'ozone',
         'wetleaf',
         'rain',   //current.rain   mm
         'rain_hour',  //current.rain.1h (where available) Rain volume for last hour, mm
         'snow',  //current.snow
         'snow_hour',   //current.snow.1h (where available) Snow volume for last hour, mm
         'created_at'

    ]; 

   public function farm()
    {
        return $this->belongsTo(Farm::class,'id_farm','id');
    }
}

