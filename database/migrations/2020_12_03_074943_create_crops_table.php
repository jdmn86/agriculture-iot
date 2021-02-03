<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    { 
        
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('crops', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('num_plantas')->unsigned();
                // $table->integer('fase_cultivo_id')->nullable()->unsigned();//1-germinação 2-transplant 3-bulbificaçao 4-crescimento 5-colher
                $table->integer('densidade_distribuicao_terreno')->nullable();//1-fraca 2-normal 3 -alto
    
                $table->integer('expectedProduction')->nullable(); //ton 
    
                $table->dateTimeTz('start_crop_date')->nullable();
                $table->dateTimeTz('finish_crop_date')->nullable();
                $table->boolean('isSeed')->nullable();
                $table->boolean('enabled')->default(1);
                   
                $table->integer('id_plant')->unsigned();

                $table->integer('cropStage_id')->unsigned()->nullable();
                
                $table->integer('id_terrain')->unsigned();
    
                // $table->integer('espected_production')->unsigned();
    
                $table->integer('crop_day')->unsigned();
                
                $table->timestamps();
    
                $table->foreign('id_terrain')->references('id')->on('terrains')->onDelete('cascade');
              //  $table->foreign('id_device')->references('id')->on('devices')->onDelete('cascade');
                $table->foreign('id_plant')->references('id')->on('plants')->onDelete('cascade');
                
                $table->foreign('cropStage_id')->references('id')->on('plant_stages')->onDelete('cascade');
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
        Schema::dropIfExists('crops');
    }
}
