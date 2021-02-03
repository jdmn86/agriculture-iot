<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeviceType;
use DB;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('device_types')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
 
         DeviceType::create([
            'id' => '1',
            'typeDevice' => 'Air',
            'name' => 'Air',            
        ]);
          DeviceType::create([
            'id' => '2',
            'typeDevice' => 'Soil',
            'name' => 'Soil',            
        ]);
    }
}
 