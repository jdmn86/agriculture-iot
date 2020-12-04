<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantStage;
use DB;

class PlantStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plant_stages')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
          PlantStage::create([
            'id' => '1',
            'plant_id' => '11',
            'faseNumber' => '1',
            'startDayCropFase' => '0',
            'stopDayCropFase' => '1',                     
            'GrowthStageName' => 'Planting',                     
            
        ]); 
           PlantStage::create([
            'id' => '2',
            'plant_id' => '11',
            'faseNumber' => '2',
            'startDayCropFase' => '2',
            'stopDayCropFase' => '15',                     
            'GrowthStageName' => 'Vegetative',                     
            
        ]);
            PlantStage::create([
            'id' => '3',
            'plant_id' => '11',
            'faseNumber' => '3',
            'startDayCropFase' => '16',
            'stopDayCropFase' => '30',                     
            'GrowthStageName' => 'Flowering',                     
            
        ]);
             PlantStage::create([
            'id' => '4',
            'plant_id' => '11',
            'faseNumber' => '4',
            'startDayCropFase' => '31',
            'stopDayCropFase' => '40',                     
            'GrowthStageName' => 'Fruit set',                     
            
        ]);
              PlantStage::create([
            'id' => '5',
            'plant_id' => '11',
            'faseNumber' => '5',
            'startDayCropFase' => '41',
            'stopDayCropFase' => '60',                     
            'GrowthStageName' => 'Fruit Grow',                     
            
        ]);
               PlantStage::create([
            'id' => '6', 
            'plant_id' => '11',
            'faseNumber' => '6',
            'startDayCropFase' => '61',
            'stopDayCropFase' => '65',                     
            'GrowthStageName' => '1st Harvest',                     
            
        ]);
                PlantStage::create([
            'id' => '7',
            'plant_id' => '11',
            'faseNumber' => '7',
            'startDayCropFase' => '66',
            'stopDayCropFase' => '120',                     
            'GrowthStageName' => 'Harvest',                     
            
        ]);
                 PlantStage::create([
            'id' => '8',
            'plant_id' => '11',
            'faseNumber' => '8',
            'startDayCropFase' => '121',
            'stopDayCropFase' => '170',                     
            'GrowthStageName' => 'Harvest',                     
            
        ]);

         PlantStage::create([
            'id' => '9',
            'plant_id' => '11',
            'faseNumber' => '9',
            'startDayCropFase' => '171',
            'stopDayCropFase' => '210',                     
            'GrowthStageName' => 'Last Harvest',                     
            
        ]);
    }
}
 