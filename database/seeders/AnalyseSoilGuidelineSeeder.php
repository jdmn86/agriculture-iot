<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnalyseSoilGuideline;
use DB;

class AnalyseSoilGuidelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('analyse_soil_guidelines')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
        AnalyseSoilGuideline::create([
            'id' => '1',
            'Lime' => '7000',
            'nitrogen' => '110',
            'phosphorus' => '300',
            'potash' => '120',                     
            'Magnesium' => null,                     
            'zinc' => '10',                     
            'Sulfur' => '30',                     
            'Manganese' => null,                     
            'Cooper' => null,
            'Iron' => null,
            'Boron' => '0.5',
            
            
        ]);
    }
}
 