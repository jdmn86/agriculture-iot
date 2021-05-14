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
            'company_id' => null,
            'faseNumber' => '1',
            'startDayCropFase' => '0',
            'stopDayCropFase' => '1',                     
            'GrowthStageName' => 'Planting',      

            'nitrogen_per_phase' => '27.2',
            'phosphorus_per_phase' => '17.5',
            'potassium_per_phase' => '11',
            'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',

            
        ]); 
           PlantStage::create([
            'id' => '2',
            'plant_id' => '11',
            'company_id' => null,
            'faseNumber' => '2',
            'startDayCropFase' => '2',
            'stopDayCropFase' => '15',                     
            'GrowthStageName' => 'Vegetative', 

             'nitrogen_per_phase' => '12.8',
            'phosphorus_per_phase' => '21.5',
            'potassium_per_phase' => '17',
               'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',                 
            
        ]);
            PlantStage::create([
            'id' => '3',
            'plant_id' => '11',
            'faseNumber' => '3',
            'startDayCropFase' => '16', 
            'stopDayCropFase' => '30',                     
            'GrowthStageName' => 'Flowering',  

             'nitrogen_per_phase' => '10',
            'phosphorus_per_phase' => '13',
            'potassium_per_phase' => '16',
               'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',
            
        ]);
             PlantStage::create([
            'id' => '4',
            'plant_id' => '11',
            'company_id' => null,
            'faseNumber' => '4',
            'startDayCropFase' => '31',
            'stopDayCropFase' => '40',                     
            'GrowthStageName' => 'Fruit set',  

             'nitrogen_per_phase' => '10',
            'phosphorus_per_phase' => '13',
            'potassium_per_phase' => '16',
               'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',                  
            
        ]);
              PlantStage::create([
            'id' => '5',
            'plant_id' => '11',
            'company_id' => null,
            'faseNumber' => '5',
            'startDayCropFase' => '41',
            'stopDayCropFase' => '60',                     
            'GrowthStageName' => 'Fruit Grow', 

             'nitrogen_per_phase' => '20',
            'phosphorus_per_phase' => '17.5',
            'potassium_per_phase' => '20',
               'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',                  
            
        ]);
               PlantStage::create([
            'id' => '6', 
            'plant_id' => '11',
            'company_id' => null,
            'faseNumber' => '6',
            'startDayCropFase' => '61',
            'stopDayCropFase' => '65',                     
            'GrowthStageName' => 'Harvest',    

             'nitrogen_per_phase' => '20',
            'phosphorus_per_phase' => '17.5',
            'potassium_per_phase' => '20',
               'Magnesium_per_phase' => '17',
            'Calcium_per_phase' => '17',
            'Sulfur_per_phase' => '16.5',
            'Sodium_per_phase' => '16.5',
            'Boron_per_phase' => '16.5',
            'zinc_per_phase' => '16.5',
            'Manganese_per_phase' => '16.5',
            'Cooper_per_phase' => '16.5',
            'Iron_per_phase' => '16.5',
            'Aluminium_per_phase' => '16.5',              
            
        ]);
        
    }
}
 