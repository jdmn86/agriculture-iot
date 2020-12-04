<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCompositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('product_compositions', function (Blueprint $table) {
                $table->increments('id');
                
    //            $table->integer('product_id')->unsigned();
    
                $table->decimal('nitrogenTotal')->nullable(); // p/p Nitric acid %
    
                $table->decimal('nitrateNitrogen')->nullable(); // p/p NH3 and NH4 %
    
                $table->decimal('amoniacalNitrogen')->nullable(); // p/p NH3 and NH4 %
    
                $table->decimal('otherNitrogen')->nullable(); // p/p COCNH %
    
                $table->decimal('P2O5')->nullable(); // p/p Phosphorus pentoxide P4O10  %
    
                $table->decimal('K2O')->nullable(); // p/p Potassium oxide %
    
                $table->decimal('CaO')->nullable(); // p/p Potassium oxide. %
    
                $table->decimal('MgO')->nullable(); // p/p  Sulfur trioxide %
    
                $table->decimal('SO3')->nullable(); // p/p  Sulfur trioxide. %
    
                $table->decimal('Ca')->nullable(); // p/p  %
             
                $table->decimal('B')->nullable(); // p/p   %
    
                $table->decimal('Cu')->nullable(); // p/p   %
    
                $table->decimal('Fe')->nullable(); // p/p   %
               
                $table->decimal('Mn')->nullable(); // p/p  %
    
                $table->decimal('Mo')->nullable(); // p/p   % 
    
                $table->decimal('Zn')->nullable(); // p/p    %
    
                $table->decimal('OrganicMatter')->nullable(); // p/p     %
    
                $table->timestamps();
    
               // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');            
                
    
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
        Schema::dropIfExists('product_compositions');
    }
}
 