<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('daily_weather', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('id_farm')->unsigned();  
            $table->dateTime('date')->nullable();    //daily.dt
            $table->string('weekDay',10)->nullable();              
            $table->text('icon')->nullable();

            $table->text('weather_type')->nullable(); //daily.weather.main

            $table->dateTime('sunrise')->nullable(); //sunrise
            $table->dateTime('sunset')->nullable(); //sunset

            $table->integer('temp_min')->nullable(); //daily.temp.min
            $table->integer('temp_max')->nullable(); //daily.temp.max 
 
            $table->integer('dew_point')->nullable(); //daily.dew_point
            $table->integer('humidity')->nullable(); //daily.humidity
            $table->decimal('pressure')->nullable(); //daily.pressure
            $table->integer('wind_speed')->nullable(); //daily.wind_speed
            $table->integer('wind_gust')->nullable(); //daily.wind_gust
            $table->decimal('wind_deg')->nullable(); //daily.wind_deg
            $table->decimal('uvi')->nullable(); //daily.uvi 

            $table->decimal('clouds')->nullable(); //daily.clouds Cloudiness, %
            $table->decimal('pop')->nullable(); //daily.pop Probability of precipitation
            
            $table->decimal('rain')->nullable(); //daily.rain 
            $table->decimal('snow')->nullable(); //daily.snow 
           
            // $table->decimal('moonPhase')->nullable();
            // $table->decimal('precipIntensity')->nullable();
            // $table->decimal('precipIntensityMax')->nullable();
            // $table->dateTime('precipIntensityMaxTime')->nullable();
            // $table->decimal('precipProbability')->nullable();
            // $table->text('precipType')->nullable();
            // $table->integer('temperatureHigh')->nullable();
            // $table->dateTime('temperatureHighTime')->nullable();
            // $table->integer('temperatureLow')->nullable();
            // $table->dateTime('temperatureLowTime')->nullable();
            // $table->decimal('apparentTemperatureHigh')->nullable();
            // $table->dateTime('apparentTemperatureHighTime')->nullable();
            // $table->decimal('apparentTemperatureLow')->nullable();
            // $table->dateTime('apparentTemperatureLowTime')->nullable();
            // $table->decimal('dewPoint')->nullable();
            // $table->decimal('humidity')->nullable();
            // $table->decimal('pressure')->nullable();
            // $table->decimal('windSpeed')->nullable();
            // $table->decimal('windGust')->nullable(); //rajada
            // $table->dateTime('windGustTime')->nullable();
            // $table->decimal('cloudCover')->nullable();
            // $table->decimal('uvIndex')->nullable();
            // $table->dateTime('uvIndexTime')->nullable();
            // $table->decimal('visibility')->nullable();
            // $table->decimal('ozone')->nullable();
            // $table->decimal('temperatureMin')->nullable();
            // $table->dateTime('temperatureMinTime')->nullable();
            // $table->decimal('temperatureMax')->nullable();
            // $table->dateTime('temperatureMaxTime')->nullable();
            // $table->decimal('apparentTemperatureMin')->nullable();
            // $table->dateTime('apparentTemperatureMinTime')->nullable();
            // $table->decimal('apparentTemperatureMax')->nullable();
            // $table->dateTime('apparentTemperatureMaxTime')->nullable();
        
            $table->timestamps();
             $table->foreign('id_farm')->references('id')->on('farms')->onDelete('cascade');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_weather');
    }
}
 