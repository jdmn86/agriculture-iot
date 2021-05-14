<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();

            $table->integer('id_terrain')->unsigned();
            $table->integer('id_crop')->unsigned();
            $table->integer('id_farm')->unsigned();
            $table->integer('id_product')->unsigned();            

            $table->decimal('quantityL')->nullable(); //rajada
            $table->decimal('quantityKg')->nullable(); //rajada

            $table->boolean('is_soluble')->nullable(); //rajada

            $table->decimal('waterL')->nullable(); //rajada

            $table->timestamps();

            $table->foreign('id_terrain')->references('id')->on('terrains')->onDelete('cascade');
          
            $table->foreign('id_crop')->references('id')->on('crops')->onDelete('cascade');

            $table->foreign('id_farm')->references('id')->on('farms')->onDelete('cascade');

            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('fertilizers');
    }
}
