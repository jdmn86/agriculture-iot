<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantUptake;
use DB;

class PlantUptakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plant_uptakes')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
          PlantUptake::create([
            'id' => '1',
            'plantStage_id' => '1',
            'plant_id' => '11',
            'company_id' => null,
            'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',                     
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null, 
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);

           PlantUptake::create([
            'id' => '2',
            'plantStage_id' => '2',
            'plant_id' => '11',
            'company_id' => null,
            'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',              
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null,
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);

            PlantUptake::create([
            'id' => '3',
            'plantStage_id' => '3',
            'plant_id' => '11',
            'company_id' => null,
           'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',               
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null,
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);
             PlantUptake::create([
            'id' => '4',
            'plantStage_id' => '4',
            'plant_id' => '11',
            'company_id' => null,
            'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',                 
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null,
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);
              PlantUptake::create([
            'id' => '5',
            'plantStage_id' => '5',
            'plant_id' => '11',
            'company_id' => null,
            'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',                 
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null,
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);
               PlantUptake::create([
            'id' => '6',
            'plantStage_id' => '6',
            'plant_id' => '11',
            'company_id' => null,
            'expectedProductionByHa' => '115',
            'nitrogen_total' => '1.565',
            'phosphorus_total' => '0.405',                     
            'potassium_total' => '2.715',                      
            'Magnesium_total' => '0.42',                     
            'Calcium_total' => '1.445',                   
            'Sulfur_total' => null,                     
            'Sodium_total' => null,
            'Boron_total' => null,
            'zinc_total' => null,
            'Manganese_total' => null,
            'Cooper_total' => null,
            'Iron_total' => null,
            'Aluminium_total' => null,
            
        ]);
          

        


    }
}
 