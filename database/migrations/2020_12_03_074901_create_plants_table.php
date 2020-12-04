<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('plants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_cientifico')->nullable(); 
            $table->integer('master_plant_id')->unsigned()->nullable();    
            $table->string('nome_variedade')->nullable();        
            //$table->string('tipo_dias')->nullable();//DL ou DC
            //$table->boolean('bio')->nullable(); 
            $table->integer('tipo_planta_id')->nullable()->unsigned();
            $table->decimal('ph_min');
            $table->decimal('ph_max')->nullable();
            $table->decimal('fracao_esgotamento_agua_solo_conforto_hidrico')->nullable();
            //$table->decimal('solo_drenagem')->nullable(); 
            //$table->decimal('solo_arejado')->nullable();
            //$table->decimal('densidade_folhas')->nullable(); 
            // $table->decimal('temp_min');
            // $table->decimal('temp_max');
           // $table->string('month_inicio');
            $table->decimal('compasso_plantas')->nullable();
            $table->decimal('compasso_linhas')->nullable();
            $table->decimal('fotoperiodo');
//            $table->decimal('rotacoes')->nullable();
            //$table->decimal('producao')->nullable(); 
            // $table->decimal('dias_germinacao')->nullable();
            // $table->decimal('dias_transplantacao')->nullable();
            // $table->decimal('dias_crescimento')->nullable();
            // $table->decimal('temperatura_germinacao_min')->nullable();
            // $table->decimal('temperatura_germinacao_max')->nullable();
            $table->decimal('water_consumption')->nullable();
            $table->string('image')->nullable();
            // $table->boolean('cropDaysTotal')->nullable(); 

            $table->unsignedBigInteger('user_id')->nullable()->unsigned();

            $table->timestamps();

            $table->foreign('tipo_planta_id')->references('id')->on('plant_types')->onDelete('cascade');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('plants');
    }
}
