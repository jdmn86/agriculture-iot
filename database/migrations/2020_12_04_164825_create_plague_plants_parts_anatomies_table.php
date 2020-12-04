<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaguePlantsPartsAnatomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('plague_plants_parts_anatomies', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('plague_id')->unsigned();
                $table->integer('part_id')->unsigned();
                $table->timestamps();
    
                $table->foreign('plague_id')->references('id')->on('plagues')->onDelete('cascade');
                $table->foreign('part_id')->references('id')->on('plant_parts_anatomies')->onDelete('cascade');
    
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
        Schema::dropIfExists('plague_plants_parts_anatomies');
    }
}
