<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;
use DB;

use Illuminate\Support\Str;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Hash;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('devices')->delete();
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Device::create([
            'id' => '1',
            'device_type_id' => '2', 
            'ref' => Str::random(12),
            'lat' => '39.7436200',
            'lng' => '-8.8070500' ,
            'uptime' => 0,        
            'battery_status' => '100',
            'num_reads' => 0,
            'enabled' => true,
            'company_id' => '1',

          
      ]);

        Device::create([
            'id' => '2',
            'device_type_id' => '1', 
            'ref' => Str::random(12),
            'lat' => '39.7436200',
            'lng' => '-8.8070500' ,
            'uptime' => 0,        
            'battery_status' => '100',
            'num_reads' => 0,
            'enabled' => true,
            'company_id' => '1',
   
      ]);
    }
}
