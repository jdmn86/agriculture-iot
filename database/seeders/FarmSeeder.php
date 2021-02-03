<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Farm;
use DB;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('farms')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Farm::create([
            // 'id' => '1',
            'name' => "Farm 1",
	        'farm_company' => '1',
            'localizacao' => 'Leiria',
            'areaTotal' => '4488.50',
	        'lat' => "39.757026",
            'lng' => "-8.792968",
        ]);
    }
}
