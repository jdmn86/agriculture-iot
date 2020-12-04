<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyseWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('analyse_waters', function (Blueprint $table) {
                $table->increments('id');
    
                $table->integer('terrain_id')->nullable()->unsigned();
    
                $table->decimal('ph')->nullable(); 
                $table->decimal('nitrateAsNitrogen')->nullable(); //ppm
                $table->decimal('nitrateAsNo3')->nullable(); //ppm
                $table->decimal('totalColiform')->nullable(); //per100ml
                $table->decimal('eColi')->nullable(); //per100ml
                $table->decimal('hardnessCaCo3')->nullable(); //ppm
                $table->decimal('totalDissolvedSolids')->nullable(); //ppm (TDS)
                $table->decimal('chloride')->nullable(); //ppm
                $table->decimal('sulfates')->nullable(); //ppm            
                $table->decimal('calcium')->nullable(); //ppm   Ca   
                $table->decimal('phosphorus')->nullable(); //ppm P
                $table->decimal('magnesium')->nullable(); //ppm  Mg
                $table->decimal('potassium')->nullable(); //ppm  k
                $table->decimal('sodium')->nullable(); //ppm  Na
                $table->decimal('iron')->nullable(); //ppm  Fe
                $table->decimal('manganese')->nullable(); //ppm  Mn
                $table->decimal('zinc')->nullable(); //ppm  Zn
                $table->decimal('copper')->nullable(); //ppm  Cu
                $table->decimal('sulfateSulfur')->nullable(); //ppm  
                $table->decimal('alkalinity')->nullable(); //ppm  
                $table->decimal('molybdenum')->nullable(); //ppm  Mo
                $table->decimal('selenium')->nullable(); //ppm  Se
                $table->decimal('boron')->nullable(); //ppm  Bo
    
     
                $table->date('date')->nullable();            
    
    
                $table->timestamps();
    
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
        Schema::dropIfExists('analyse_waters');
    }
}
 