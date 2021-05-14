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
    

                $table->integer('company_id')->unsigned()->nullable();


                $table->integer('faseNumber')->unsigned();
    
                $table->integer('startDayCropFase')->unsigned();
                $table->integer('stopDayCropFase')->unsigned();
    
               // $table->integer('nutrientsUptake_id')->unsigned();
    
                $table->text('GrowthStageName');

                
                $table->decimal('nitrogen_per_phase')->nullable();       
                $table->decimal('phosphorus_per_phase')->nullable(); 
                $table->decimal('potassium_per_phase')->nullable(); 
                $table->decimal('Magnesium_per_phase')->nullable(); 
                $table->decimal('Calcium_per_phase')->nullable(); 
                $table->decimal('Sulfur_per_phase')->nullable(); 
                $table->decimal('Sodium_per_phase')->nullable(); 
                $table->decimal('Boron_per_phase')->nullable(); 
                $table->decimal('zinc_per_phase')->nullable();  
                $table->decimal('Manganese_per_phase')->nullable();  
                $table->decimal('Cooper_per_phase')->nullable();  
                $table->decimal('Iron_per_phase')->nullable();  
                $table->decimal('Aluminium_per_phase')->nullable();  



     
                $table->timestamps();
    
                $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');

                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
 