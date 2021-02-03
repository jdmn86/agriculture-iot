<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('air_data', function (Blueprint $table) {
            $table->increments('id');
            
            $table->bigInteger('device_id')->unsigned();
            $table->integer('crop_id')->unsigned();
            $table->integer('terrain_id')->unsigned();

            $table->dateTime('date')->nullable();  //$dailyWeather->date = date('Y-m-d H:i:s',$d->dt);

            $table->decimal('height')->nullable(); //altitude
            $table->decimal('temp')->nullable(); 

            $table->decimal('precipitation')->nullable(); 
            
            $table->decimal('humidity')->nullable();
            $table->decimal('dew_point')->nullable();
            $table->decimal('heat_index')->nullable();
            $table->decimal('pressure')->nullable();

            $table->decimal('radiation')->nullable(); //w/m2

            // $table->decimal('luxFull')->nullable();
            // $table->decimal('luxVisible')->nullable();
            // $table->decimal('luxIr')->nullable();
            // $table->decimal('lux')->nullable();

            $table->boolean('wetleaf')->nullable();
            
            $table->decimal('evpt',8,6)->nullable();

            $table->decimal('lat', 10, 7)->nullable(); 
            $table->decimal('lng', 10, 7)->nullable();

            $table->timestamps();

             $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
             $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
             $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
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
        Schema::dropIfExists('air_data');
    }
}
