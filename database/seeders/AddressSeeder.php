<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('addresses')->delete();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
         Address::create([
            'id' => '1',
            'name' => 'Malaposta lote 1 1ºF',
	        'is_street' => true,
	        'is_avenue' => false,
	        'city' => 'Leiria',
	        'postal_code' => '2410-057',
	        'country' => 'Portugal',
	        'is_billing_address' => true,
        ]);

         Address::create([
            'id' => '2',
            'name' => 'Malaposta lote 1 1ºF',
	        'is_street' => false,
	        'is_avenue' => true,
	        'city' => 'Porto',
	        'postal_code' => '2440-057',
	        'country' => 'Portugal',
	        'is_billing_address' => false,
        ]);
    }
}
 