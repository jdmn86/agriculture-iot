<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('product_types', function (Blueprint $table) {
                $table->increments('id');
                
                $table->text('typeProduct')->nullable();
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
        Schema::dropIfExists('product_types');
    }
}
 