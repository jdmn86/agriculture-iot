<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('addresses', function (Blueprint $table) {
                $table->increments('id');
    
                $table->longText('name');
                $table->boolean('is_street');
                $table->boolean('is_avenue');
                $table->string('city');
                $table->text('postal_code');
                $table->text('country');
                $table->boolean('is_billing_address');
     
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
        Schema::dropIfExists('addresses');
    }
}
 