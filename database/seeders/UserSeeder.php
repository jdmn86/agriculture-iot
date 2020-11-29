<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
     //    DB::table('users')->delete();
    	// DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        //  User::create([
        //     'id' => '1',
        //     'name' => 'admin',
	    //     'email' => 'admin@admin.com',
	    //     'email_verified_at' => now(),
	    //     'password' => bcrypt('password'),
	        
        // ]);

        //   User::create([
        //     'id' => '2',
        //     'name' => 'adminCompany',
	    //     'email' => 'adminEmpresa@adminEmpresa.com',
	    //     'email_verified_at' => now(),
	    //     'password' => bcrypt('password'),
	        
        // ]);

        //     User::create([
        //     'id' => '3',
        //     'name' => 'user',
	    //     'email' => 'user@user.com',
	    //     'email_verified_at' => now(),
	    //     'password' => bcrypt('password'),
	        
        // ]);
           
    }
}
