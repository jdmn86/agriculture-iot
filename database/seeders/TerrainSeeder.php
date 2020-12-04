<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Terrain;
use DB;

class TerrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('terrains')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Terrain::create([
            
            'name' => 'Terreno1',
            'farm_id' => '1',
            'area' => '4488.50',
            'coords' => '[{"lat":39.75702622511591,"lng":-8.792968375126131},{"lat":39.757769253478,"lng":-8.792449744867392},{"lat":39.75755890994475,"lng":-8.79194997389079},{"lat":39.75681560592948,"lng":-8.792503954826154}]',                   
	        
        ]);
    }
} 
