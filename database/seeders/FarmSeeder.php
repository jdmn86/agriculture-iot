<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Farm;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::create([
            // 'id' => '1',
            'name' => "Farm 1",
	        'farm_company' => '1',
	        'localizacao' => 'Leiria',	        
	        
        ]);
    }
}
