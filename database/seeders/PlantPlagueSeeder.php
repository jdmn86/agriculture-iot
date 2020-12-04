<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantPlague;
use DB;

class PlantPlagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plant_plagues')->delete();
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
       //cebola 1 e 2
       //alho frances 3
       //couve 4
       //cenoura 5
       //tomate 6
       //milho 7  
       //oliveira 8 

PlantPlague::create([ 'id'=>1 , 'plant_id' => 11, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>2 , 'plant_id' => 11, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>3 , 'plant_id' => 11, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>4 , 'plant_id' => 11, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>5 , 'plant_id' => 1, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>6 , 'plant_id' => 1, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>7 , 'plant_id' => 1, 'plague_id' => 1]);
PlantPlague::create([ 'id'=>8 , 'plant_id' => 1, 'plague_id' => 1]);
    }
}
