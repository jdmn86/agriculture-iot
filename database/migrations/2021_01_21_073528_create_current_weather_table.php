<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('current_weather', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_farm')->unsigned(); 
            $table->dateTime('date')->nullable();   
            $table->string('weekDay',12)->nullable();                
            $table->text('icon')->nullable();

            $table->decimal('clouds')->nullable();
            $table->text('weather_type')->nullable();
            $table->integer('temp')->nullable();
            $table->integer('feels_like')->nullable();
            $table->integer('dew_point')->nullable();
            $table->integer('humidity')->nullable();
            $table->decimal('pressure')->nullable();
            $table->integer('wind_speed')->nullable();
            $table->integer('wind_gust')->nullable();
            $table->decimal('wind_deg')->nullable(); //rajada
            $table->decimal('uvi')->nullable(); //orientação vento
            $table->decimal('visibility')->nullable();
            $table->decimal('rain')->nullable();
            $table->decimal('rain_hour')->nullable();
            $table->decimal('snow')->nullable();
            $table->decimal('snow_hour')->nullable();
            
            $table->boolean('wetleaf')->nullable();
        
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
        Schema::dropIfExists('current_weather');
    }
}
