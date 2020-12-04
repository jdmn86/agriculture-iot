<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantPartsAnatomy;
use DB;

class PlantPartsAnatomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plant_parts_anatomies')->delete();  
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  
        PlantPartsAnatomy::create([
            'id' => '1',
            'part' => 'Raiz',
        ]);

          PlantPartsAnatomy::create([
            'id' => '2',
            'part' => 'Bolbo',
        ]);

         PlantPartsAnatomy::create([
            'id' => '3',
            'part' => 'Leaf',
        ]);

         PlantPartsAnatomy::create([ 
            'id' => '4',
            'part' => 'Caule',
        ]);

    }
}
 