<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Crop;
use DB;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('crops')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Crop::create([
            'id' => '1',
            'num_plantas' => '1000', 
            'id_plant' => '11',
            'id_terrain' => '1',
            'densidade_distribuicao_terreno' => '3' ,
            'cropStage_id' => '3',        
            'expectedProductionByHa' => '1000',
            'start_crop_date' => '2021-01-29 02:05:07',
            'isSeed' => true,
            'crop_day' => '31',
            'enabled' => true,
          
      ]);
    }
}

