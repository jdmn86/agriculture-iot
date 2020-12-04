<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductComposition;
use DB;

class ProductCompositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_compositions')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
         ProductComposition::create([	    
         	'id' => '1',    
	        'nitrogenTotal'=> '5',
	        'nitrateNitrogen' => null,
	        'amoniacalNitrogen'=> null,
	        'otherNitrogen'=> null,
	        'P2O5'=> null, 
	        'K2O'=> null,
	        'CaO'=> null,
	        'MgO'=> null,
	        'SO3'=> null,
	        'Ca'=> null,
	        'B'=> null,
	        'Cu'=> null,
	        'Fe'=> null,
	        'Mn'=> null,
	        'Mo'=> null,
	        'Zn'=> null,
	        'OrganicMatter'=> null,
        ]);

          ProductComposition::create([	
          	'id' => '2',        
	        'nitrogenTotal'=> '8',
	        'nitrateNitrogen' => '0.05',
	        'amoniacalNitrogen'=> '0.63',
	        'otherNitrogen'=> '7.31',
	        'P2O5'=> '4',
	        'K2O'=> null,
	        'CaO'=> null,
	        'MgO'=> null,
	        'SO3'=> null,
	        'Ca'=> null,
	        'B'=> null,
	        'Cu'=> null,
	        'Fe'=> null,
	        'Mn'=> null,
	        'Mo'=> null,
	        'Zn'=> null,
	        'OrganicMatter'=> null,
        ]);

           ProductComposition::create([	
          	'id' => '3',        
	        'nitrogenTotal'=> null,
	        'nitrateNitrogen' => null,
	        'amoniacalNitrogen'=> null,
	        'otherNitrogen'=> null,
	        'P2O5'=> null,
	        'K2O'=> null,
	        'CaO'=> null,
	        'MgO'=> null,
	        'SO3'=> null,
	        'Ca'=> null,
	        'B'=> null,
	        'Cu'=> '8',
	        'Fe'=> null,
	        'Mn'=> null,
	        'Mo'=> null,
	        'Zn'=> null,
	        'OrganicMatter'=> null,
        ]);

    }
}
 