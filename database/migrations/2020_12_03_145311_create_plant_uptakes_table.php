<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantUptakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('plant_uptakes', function (Blueprint $table) {
                $table->increments('id');
    
                $table->integer('plantStage_id')->unsigned();
    
                $table->integer('plant_id')->unsigned();
                
                $table->decimal('expectedProductionByHa')->nullable(); 
    
                $table->decimal('nitrogen')->nullable();    //N ppm
    
                $table->decimal('phosphorus')->nullable();    // P ppm
    
                $table->decimal('potassium')->nullable();    // (k) ppm
                
                $table->decimal('Magnesium')->nullable();    // Mg ppm 
                
                $table->decimal('Calcium')->nullable();    // Ca ppm
                
                $table->decimal('Sulfur')->nullable();    //  S ppm
    
                $table->decimal('Sodium')->nullable();  // Na ppm
    
                $table->decimal('Boron')->nullable();    //  B ppm
    
                $table->decimal('zinc')->nullable();    //  Zn ppm
                
                $table->decimal('Manganese')->nullable();    // Mn ppm
                
                $table->decimal('Cooper')->nullable();    // Cu ppm
                
                $table->decimal('Iron')->nullable();    // Fe ppm
                
                $table->decimal('Aluminium')->nullable();    // Al ppm            
    
                $table->timestamps();
            
                $table->foreign('plantStage_id')->references('id')->on('plant_stages')->onDelete('cascade');
                $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
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
        Schema::dropIfExists('plant_uptakes');
    }
}
 