<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantPlaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('plant_plagues', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('plant_id')->unsigned();
                $table->integer('plague_id')->unsigned();
                $table->timestamps();
    
                  $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
                $table->foreign('plague_id')->references('id')->on('plagues')->onDelete('cascade');
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
        Schema::dropIfExists('plant_plagues');
    }
}
