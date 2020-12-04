<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::create('devices', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type');
                $table->macAddress('deviceMac');
                $table->macAddress('masterId')->nullable(); 
                // $table->integer('device_user')->unsigned()->nullable();
                $table->integer('terrain_id')->unsigned()->nullable();
                // $table->integer('device_terrain')->unsigned()->nullable();
                $table->boolean('enabled')->default(0);
                $table->decimal('lat', 10, 7)->nullable(); 
                $table->decimal('lng', 10, 7)->nullable();
                $table->decimal('uptime')->default(0);
                $table->decimal('battery_status')->nullable();
                $table->integer('num_reads')->unsigned()->default(0);
                $table->timestamps();
                // $table->foreign('device_user')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
                // $table->foreign('device_terrain')->references('id')->on('terrains')->onDelete('cascade');
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
        Schema::dropIfExists('devices');
    }
}
