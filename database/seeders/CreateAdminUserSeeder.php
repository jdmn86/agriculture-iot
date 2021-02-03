<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
    public function run()
    {
        // 'password' => bcrypt('admin'),
        // 'password' => Hash::make('admin'),

        $user = User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin'),
        'company_id' => null,
        'blocked' => false
        ]);

         $role = Role::create(['name' => 'admin']);
        // $role =Role::findByName('Super Admin');

        $permissions = Permission::pluck('id','id')->all();
        
        $role->syncPermissions($permissions);
        
        $user->assignRole($role);
    }
}
