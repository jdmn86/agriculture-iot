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

                $table->integer('company_id')->unsigned()->nullable();

                 
                $table->decimal('expectedProductionByHa')->nullable(); 
    

                $table->decimal('nitrogen_total')->nullable();    //N ppm
    
                $table->decimal('phosphorus_total')->nullable();    // P ppm
    
                $table->decimal('potassium_total')->nullable();    // (k) ppm
                
                $table->decimal('Magnesium_total')->nullable();    // Mg ppm 
                
                $table->decimal('Calcium_total')->nullable();    // Ca ppm
                
                $table->decimal('Sulfur_total')->nullable();    //  S ppm
    
                $table->decimal('Sodium_total')->nullable();  // Na ppm
    
                $table->decimal('Boron_total')->nullable();    //  B ppm
    
                $table->decimal('zinc_total')->nullable();    //  Zn ppm
                
                $table->decimal('Manganese_total')->nullable();    // Mn ppm
                
                $table->decimal('Cooper_total')->nullable();    // Cu ppm
                
                $table->decimal('Iron_total')->nullable();    // Fe ppm
                
                $table->decimal('Aluminium_total')->nullable();    // Al ppm            
    
                $table->timestamps();
            
                $table->foreign('plantStage_id')->references('id')->on('plant_stages')->onDelete('cascade');
                
                $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');

               $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
 