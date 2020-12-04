<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_types')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
        ProductType::create([
            'id' => '1',
            'typeProduct' => 'Fertilizer',
            'name' => 'Fertilizer',           
        ]);

         ProductType::create([
            'id' => '2',
            'typeProduct' => 'Acaricideos',
            'name' => 'Acaricideos',           
        ]); 

         ProductType::create([
            'id' => '3',
            'typeProduct' => 'Fungicidas',
            'name' => 'Fungicidas',           
        ]);
 
         ProductType::create([
            'id' => '4',
            'typeProduct' => 'Insecticidas',
            'name' => 'Insecticidas',           
        ]);

         ProductType::create([
            'id' => '5',
            'typeProduct' => 'Herbicidas',
            'name' => 'Herbicidas',           
        ]); 

    }
}
 