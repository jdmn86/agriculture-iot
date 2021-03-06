<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyseSoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('analyse_soils', function (Blueprint $table) {
                $table->increments('id');
                
                $table->integer('terrain_id')->nullable()->unsigned(); //pode nao ter um cultivo
                $table->integer('tipoSolo_id')->nullable()->unsigned();
    
                $table->integer('analysisGuideline_id')->nullable()->unsigned();
    
                $table->decimal('soilDepth')->nullable(); //%
     
                $table->date('date')->nullable();            
    
                $table->decimal('matOrgPer')->nullable(); //%
    
                $table->decimal('nitrogen')->nullable();    //NO3 ppm 
    
                $table->decimal('phosphorus')->nullable();    // ppm
    
                $table->decimal('potassium')->nullable();    // (k) ppm
                
                $table->decimal('Magnesium')->nullable();    // Mg ppm
                
                $table->decimal('Calcium')->nullable();    // Ca ppm
                
                $table->decimal('Sodium')->nullable();    //  S ppm
    
                $table->decimal('phSoil')->nullable();  
    
                $table->decimal('phBufferIndex')->nullable(); 
    
                $table->decimal('hydrogen')->nullable();  //meq/100g
    
                $table->decimal('Sulfur')->nullable();    //  SO4 ppm
    
                $table->decimal('zinc')->nullable();    //  Zn ppm
                
                $table->decimal('Manganese')->nullable();    // Mn ppm
                
                $table->decimal('Cooper')->nullable();    // Cu ppm
                
                $table->decimal('Iron')->nullable();    // Fe ppm
                
                $table->decimal('Boron')->nullable();    // B ppm
    
                $table->decimal('Aluminium')->nullable();    // Al ppm
                
                $table->decimal('excessLime')->nullable();    //  VL/L/M/H/VH
    
                $table->decimal('CEC')->nullable();    //  meq/100g
                
                $table->decimal('perCationSatK')->nullable();    //  %
                
                $table->decimal('perCationSatMg')->nullable();    //  %
    
                $table->decimal('perCationSatCa')->nullable();    //  %
    
                $table->decimal('perCationSatH')->nullable();    //  %
    
                $table->decimal('perCationSatNa')->nullable();    //  %
                
                $table->decimal('Sulfate')->nullable();    //  SO4 ppm
    
                $table->decimal('Chloride')->nullable();    //  Cl ppm
    
                $table->decimal('Ece')->nullable();    //  electric conductivity mmhos/cm
    
                $table->text('Obs')->nullable();
    
                $table->timestamps();
    
                $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
                $table->foreign('tipoSolo_id')->references('id')->on('soil_types')->onDelete('cascade');
                $table->foreign('analysisGuideline_id')->references('id')->on('analyse_soil_guidelines')->onDelete('cascade');
                
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
        Schema::dropIfExists('analyse_soils');
    }
}
 