<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('plant_analyses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('crop_id')->nullable()->unsigned();

            $table->decimal('nitrogen')->nullable(); //%
            $table->decimal('nitrateNitrogen')->nullable(); //%
            $table->decimal('sulfur')->nullable(); //%
            $table->decimal('phosphorus')->nullable(); //%
            $table->decimal('potassium')->nullable(); //%
            $table->decimal('magnesium')->nullable(); //%
            $table->decimal('calcium')->nullable(); //%
            $table->decimal('sodium')->nullable(); //%
            $table->decimal('boron')->nullable(); //%  
            $table->decimal('zinc')->nullable(); //%  
            $table->decimal('manganese')->nullable(); //%   
            $table->decimal('iron')->nullable(); //%   
            $table->decimal('copper')->nullable(); //%  
            $table->decimal('aluminium')->nullable(); //%  
            $table->decimal('chloride')->nullable(); //%  

            $table->date('date')->nullable();

            $table->timestamps();

            $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
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
        Schema::dropIfExists('plant_analyses');
    }
}
