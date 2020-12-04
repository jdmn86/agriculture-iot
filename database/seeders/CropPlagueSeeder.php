<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CropPlague;
use DB;

class CropPlagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('crop_plagues')->delete();
        

        //   App\CultivoPragas::create([
        //     'cultivo_id' => '1', 
        //     'pragas_id' => '1',
            
        // ]);
          
          DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
 