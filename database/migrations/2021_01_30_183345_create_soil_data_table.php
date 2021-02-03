<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoilDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('soil_data', function (Blueprint $table) {
            $table->increments('id');
            
            $table->bigInteger('device_id')->unsigned();
            $table->integer('crop_id')->unsigned();
            $table->integer('terrain_id')->unsigned();

            $table->dateTime('date')->nullable();  //$dailyWeather->date = date('Y-m-d H:i:s',$d->dt);

            $table->decimal('temp20')->nullable(); //altitude
            $table->decimal('temp40')->nullable(); 

            $table->decimal('humidade20')->nullable(); 
            $table->decimal('humidade40')->nullable();

            $table->decimal('lat', 10, 7)->nullable(); 
            $table->decimal('lng', 10, 7)->nullable();
            
            $table->timestamps();

             $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
             $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
             $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soil_data');
    }
}

