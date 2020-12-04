<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantStagesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
            Schema::create('plant_stages', function (Blueprint $table) {
                $table->increments('id');
    
                $table->integer('plant_id')->nullable()->unsigned();
    
                $table->integer('faseNumber')->unsigned();
    
                $table->integer('startDayCropFase')->unsigned();
                $table->integer('stopDayCropFase')->unsigned();
    
               // $table->integer('nutrientsUptake_id')->unsigned();
    
                $table->text('GrowthStageName');
    
                $table->timestamps();
    
                $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_stages');
    }
}
 