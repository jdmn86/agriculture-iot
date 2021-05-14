<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('recommendation_fertilizers', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('soilAnalysis_id')->nullable()->unsigned();
            $table->decimal('Lime')->nullable();
            $table->decimal('nitrogen')->nullable();  
            $table->decimal('phosphorus')->nullable();
            $table->decimal('potash')->nullable();
            $table->decimal('Magnesium')->nullable(); 
            $table->decimal('zinc')->nullable();
            $table->decimal('Sulfur')->nullable(); 
            $table->decimal('Manganese')->nullable();
            $table->decimal('Cooper')->nullable();
            $table->decimal('Iron')->nullable();
            $table->decimal('Boron')->nullable();

            $table->text('Obs')->nullable();
            $table->timestamps();

             // $table->foreign('soilAnalysis_id')->references('id')->on('soil_analyses')->onDelete('cascade');
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
        Schema::dropIfExists('recommendation_fertilizers');
    }
}
 