<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlagueTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('plague_types', function (Blueprint $table) {
                 $table->increments('id');
    
                $table->text('typePlague')->nullable();
                $table->text('name')->nullable();            
    
                $table->timestamps();
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
        Schema::dropIfExists('plague_types');
    }
}
