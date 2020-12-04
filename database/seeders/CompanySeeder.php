<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('companies')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Company::create([
            'id' => '1',
            'is_company' => false,
	        'name' => 'company 1',
	        'company_name' => 'company 1',
	        'nif' => '123456789',
            'email' => 'test@email.com',
            'email_notifications' => 'test@email.com', 
	        
        ]);

        Company::create([
            'id' => '2',
            'is_company' => true,
	        'name' => 'company 2',
	        'company_name' => 'company 2',
	        'nif' => '123456789',
	        'email' => 'test@email.com',
            'email_notifications' => 'test@email.com',
        ]);
    }
}
