<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlaguePlantsPartsAnatomy;
use DB;

class PlaguePlantsPartsAnatomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('plague_plants_parts_anatomies')->delete();
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');   

       PlaguePlantsPartsAnatomy::create([ 'id'=>1 , 'plague_id' => 1, 'part_id' => 1]);
       PlaguePlantsPartsAnatomy::create([ 'id'=>2 , 'plague_id' => 1, 'part_id' => 2]);
       PlaguePlantsPartsAnatomy::create([ 'id'=>3 , 'plague_id' => 1, 'part_id' => 3]);
       PlaguePlantsPartsAnatomy::create([ 'id'=>4 , 'plague_id' => 1, 'part_id' => 4]);
    }
}
 