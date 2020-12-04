<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('plagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo')->nullable();
            $table->string('nome_comum')->nullable();
            $table->text('nome_cientifico')->nullable();
            //$table->string('patogenico')->nullable();
            //$table->string('partes_afetadas')->nullable();
            //$table->string('ciclos_vegetativos')->nullable();
            //$table->string('temperatura_optima_desenvolvimento')->nullable();
            $table->integer('plagueType_id')->nullable()->unsigned();
            $table->longText('symptoms')->nullable();
            $table->string('cause')->nullable();
            $table->longText('comments')->nullable(); 
            $table->longText('management')->nullable();
            //$table->string('tecido')->nullable(); 
            //$table->string('odor')->nullable();
            //$table->string('localizacao')->nullable();
            //$table->string('dano')->nullable();
            //$table->string('fica_solo')->nullable();
            //$table->string('condicoes_ataque')->nullable();
            //$table->text('condicoes_ataque_query')->nullable();
            
         //   $table->intege('controlo_id')->unsigned();
            $table->string('image')->nullable();

            $table->string('language')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();

            $table->timestamps();

             $table->foreign('plagueType_id')->references('id')->on('plague_types')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          //  $table->foreign('controlo_id')->references('id')->on('pragas')->onDelete('cascade');
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
        Schema::dropIfExists('plagues');
    }
}
 