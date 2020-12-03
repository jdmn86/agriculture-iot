<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'adminCompany',
            'email' => 'adminCompany@adminCompany.com',
            'password' => bcrypt('adminCompany'),
            'company_id' => '1'
            ]);
    
            $role = Role::create(['name' => 'adminCompany']);
    
            $permissions = Permission::pluck('id','id')->all();
            
            $role->syncPermissions($permissions);
            
            $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'company_id' => '1'
            ]);
    
            $role = Role::create(['name' => 'user']);
    
            $permissions = Permission::pluck('id','id')->all();
            
            // $role->syncPermissions($permissions);
            
            $user->assignRole([$role->id]);

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
