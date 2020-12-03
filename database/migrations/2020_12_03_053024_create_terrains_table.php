<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('terrains', function (Blueprint $table) {
            $table->increments('id'); 
            $table->text('name');
            $table->integer('farm_id')->unsigned()->nullable();
            $table->decimal('area',60,2)->unsigned(); 
            $table->text('coords');
            $table->boolean('enabled')->default(true); 
            $table->timestamps();
        //      $table->softDeletes();
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
            
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
        Schema::dropIfExists('terrains');
    }
}
