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
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                      
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

           PlantUptake::create([
            'id' => '2',
            'plantStage_id' => '2',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

            PlantUptake::create([
            'id' => '3',
            'plantStage_id' => '3',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);
             PlantUptake::create([
            'id' => '4',
            'plantStage_id' => '4',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);
              PlantUptake::create([
            'id' => '5',
            'plantStage_id' => '5',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);
               PlantUptake::create([
            'id' => '6',
            'plantStage_id' => '6',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);
                PlantUptake::create([
            'id' => '7',
            'plantStage_id' => '7',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

          PlantUptake::create([
            'id' => '8',
            'plantStage_id' => '8',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

           PlantUptake::create([
            'id' => '9',
            'plantStage_id' => '9',
            'plant_id' => '6',
            'expectedProductionByHa' => '80',
            'nitrogen' => '1.14',
            'phosphorus' => '0.3',                     
            'potassium' => '1.98',                     
            'Magnesium' => '0.32',                     
            'Calcium' => '1.11',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

            PlantUptake::create([
            'id' => '10',
            'plantStage_id' => '1',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

             PlantUptake::create([
            'id' => '11',
            'plantStage_id' => '2',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

              PlantUptake::create([
            'id' => '12',
            'plantStage_id' => '3',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

               PlantUptake::create([
            'id' => '13',
            'plantStage_id' => '4',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

                   PlantUptake::create([
            'id' => '14',
            'plantStage_id' => '5',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);


                PlantUptake::create([
            'id' => '15',
            'plantStage_id' => '6',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

                PlantUptake::create([
            'id' => '16',
            'plantStage_id' => '7',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);

                    PlantUptake::create([
            'id' => '17',
            'plantStage_id' => '8',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                     
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);
         PlantUptake::create([
            'id' => '18',
            'plantStage_id' => '9',
            'plant_id' => '6',
            'expectedProductionByHa' => '150',
            'nitrogen' => '1.99',
            'phosphorus' => '0.51',                     
            'potassium' => '3.45',                      
            'Magnesium' => '0.52',                     
            'Calcium' => '1.78',                     
            'Sulfur' => null,                     
            'Sodium' => null,
            'Boron' => null,
            'zinc' => null,
            'Manganese' => null,
            'Cooper' => null,
            'Iron' => null,
            'Aluminium' => null,
            
        ]);


    }
}
 