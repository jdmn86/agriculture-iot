<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('typeProduct_id')->unsigned();
            
            $table->text('name')->nullable(); //rajada
            $table->text('brand')->nullable(); //rajada

            $table->decimal('quantityL')->nullable(); //rajada
            $table->decimal('quantityKg')->nullable(); //rajada

            $table->decimal('granulometry')->nullable(); //rajada

            $table->integer('composition_id')->unsigned()->nullable();

            $table->boolean('is_biologic')->nullable(); //rajada
            $table->boolean('is_liquid')->nullable(); //rajada

            $table->decimal('solubility')->nullable(); //rajada

            $table->longText('activeIngredients')->nullable(); //rajada

            $table->decimal('ph')->nullable(); //rajada

            $table->longText('description')->nullable(); //rajada

            $table->longText('aplicationRates')->nullable(); //rajada

            $table->longText('directionsForUse')->nullable(); //rajada

            $table->longText('storage')->nullable(); //rajada

            $table->longText('compatibility')->nullable(); //rajada

            $table->longText('warnings')->nullable(); //rajada

          //  $table->date('date')->nullable();   

            $table->timestamps();

            $table->foreign('typeProduct_id')->references('id')->on('product_types')->onDelete('cascade');

            $table->foreign('composition_id')->references('id')->on('product_compositions')->onDelete('cascade');
            

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
        Schema::dropIfExists('products');
    }
}
 