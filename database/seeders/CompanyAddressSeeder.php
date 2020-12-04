<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyAddress;
use DB;

class CompanyAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run() 
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('company_addresses')->delete();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         
         CompanyAddress::create([
            'id' => '1',
            'company_id' => '1',
	        'address_id' => '1',
	       
        ]);

         CompanyAddress::create([
            'id' => '2', 
            'company_id' => '2',
	        'address_id' => '1',
	        
        ]);
    }
}
