<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('harvests', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('crop_id')->unsigned();
            $table->bigInteger('user_id')->unsigned(); 

            $table->decimal('kg')->nullable();
            $table->decimal('hectars')->nullable(); 

            $table->timestamps();
            
            $table->foreign('crop_id')->references('id')->on('crops')->onDelete('cascade');
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
        Schema::dropIfExists('harvests');
    }
}
