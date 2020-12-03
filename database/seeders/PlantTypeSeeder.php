<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
 
         App\PlantType::create([
            'id' => '1',
            'typePlant' => 'Horticulas',
            'name' => 'Horticulas',           
        ]);

         App\PlantType::create([
            'id' => '2',
            'typePlant' => 'Fruticolas',
            'name' => 'Fruticolas',           
        ]);

         App\PlantType::create([
            'id' => '3',
            'typePlant' => 'Viticultura', 
            'name' => 'Viticultura',           
        ]);

         App\PlantType::create([
            'id' => '4',
            'typePlant' => 'Olivicolas',
            'name' => 'Olivicolas',           
        ]);

           App\PlantType::create([
            'id' => '5',
            'typePlant' => 'Cereais',
            'name' => 'Cereais',           
        ]);
    }
}
