<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id'); 
            $table->text('name');
            $table->integer('farm_company')->unsigned(); 
            $table->text('localizacao');
            $table->decimal('areaTotal',60,2)->unsigned()->default(0); 
            $table->boolean('enabled')->default(true);
            $table->timestamps();
            //$table->softDeletes();
            $table->foreign('farm_company')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('farms');
    }
}
