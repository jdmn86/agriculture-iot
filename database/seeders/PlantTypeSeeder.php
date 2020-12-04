<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PlantType;
use DB;

class PlantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plant_types')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
         PlantType::create([
            'id' => '1',
            'typePlant' => 'Horticulas',
            'name' => 'Horticulas',           
        ]); 

         PlantType::create([
            'id' => '2',
            'typePlant' => 'Fruticolas',
            'name' => 'Fruticolas',           
        ]);

         PlantType::create([
            'id' => '3',
            'typePlant' => 'Viticultura', 
            'name' => 'Viticultura',           
        ]);

         PlantType::create([
            'id' => '4',
            'typePlant' => 'Olivicolas',
            'name' => 'Olivicolas',           
        ]);

        PlantType::create([
            'id' => '5',
            'typePlant' => 'Cereais',
            'name' => 'Cereais',           
        ]);
    }
}
