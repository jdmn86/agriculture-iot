<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlagueType;
use DB;

class PlagueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('plague_types')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
 
         PlagueType::create([
            'id' => '1',
            'typePlague' => 'Fungo',
            'name' => 'Fungo',           
        ]);

         PlagueType::create([
            'id' => '2',
            'typePlague' => 'Bacteria',
            'name' => 'Bacteria',            
        ]); 

         PlagueType::create([
            'id' => '3',
            'typePlague' => 'Virus', 
            'name' => 'Virus',            
        ]);

         PlagueType::create([
            'id' => '4',
            'typePlague' => 'Nematodo',
            'name' => 'Nematodo',           
        ]);

         PlagueType::create([
            'id' => '5',
            'typePlague' => 'Insecto',
            'name' => 'Insecto',           
        ]);
         PlagueType::create([
            'id' => '6',
            'typePlague' => 'Carencia',
            'name' => 'Carencia',           
        ]);
         PlagueType::create([
            'id' => '7',
            'typePlague' => 'DesordemFisica',
            'name' => 'Desordem Fisica',           
        ]);
          PlagueType::create([
            'id' => '8',
            'typePlague' => 'Other',
            'name' => 'Other',           
        ]);
    }
}
 