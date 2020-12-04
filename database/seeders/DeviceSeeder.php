<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;
use DB;


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
          'deviceMac' => 'B4E62DEE5D09',
          // 'device_user' => null,
          // 'terrain_id' => null,
          'type' => 'M',
          'enabled' => 1,
          'lat' => '39.7436200',
          'lng' => '-8.8070500' ,
          'num_reads' => 0,
          'masterId' => null,
      ]);
    }
}
