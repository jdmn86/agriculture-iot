<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoilTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('soil_types', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('terrain_id')->unsigned()->nullable();
            $table->string('nome_solo')->nullable();
            $table->decimal('argila_percentagem')->nullable(); 
            $table->decimal('silte_percentagem')->nullable();
            $table->decimal('areia_percentagem')->nullable(); 
            $table->decimal('capacidade_campo')->nullable();
            $table->decimal('capacidade_emurchecimento')->nullable();
            // $table->decimal('distancia_medicao')->nullable();
            $table->decimal('massa_volumica_aparente')->nullable();
            $table->decimal('agua_disponivel_total')->nullable();
            $table->timestamps();
            // $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
            
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
        Schema::dropIfExists('soil_types');
    }
}
 