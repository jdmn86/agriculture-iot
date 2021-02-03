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
            'company_id' => '1',
            'blocked' => false 
            ]);
    
            $role = Role::create(['name' => 'adminCompany']);
    
            $permissions = Permission::pluck('id','id')->all();
            
            //$role->syncPermissions($permissions);

            $role->givePermissionTo('role-list');
            $role->givePermissionTo('permission-list');

            $role->givePermissionTo('user-list');
            $role->givePermissionTo('user-create');
            $role->givePermissionTo('user-edit');
            $role->givePermissionTo('user-delete');

            $role->givePermissionTo('company-list');
            $role->givePermissionTo('company-edit');

            $role->givePermissionTo('farm-list');
            $role->givePermissionTo('farm-create');
            $role->givePermissionTo('farm-edit');
            $role->givePermissionTo('farm-delete');

            $role->givePermissionTo('terrain-list');
            $role->givePermissionTo('terrain-create');
            $role->givePermissionTo('terrain-edit');
            $role->givePermissionTo('terrain-delete');

            $role->givePermissionTo('plantType-list');
            
            $role->givePermissionTo('crop-list');
            $role->givePermissionTo('crop-create');
            $role->givePermissionTo('crop-edit');
            $role->givePermissionTo('crop-delete');

            $role->givePermissionTo('plant-list');

            $role->givePermissionTo('variety-edit');
            $role->givePermissionTo('variety-create');
            $role->givePermissionTo('variety-delete');   

            $role->givePermissionTo('soiltype-list');

            $role->givePermissionTo('productType-list');

            $role->givePermissionTo('product-list');
            $role->givePermissionTo('product-create');
            $role->givePermissionTo('product-edit');
            $role->givePermissionTo('product-delete');

            $role->givePermissionTo('productComposition-list');
            $role->givePermissionTo('productComposition-create');
            $role->givePermissionTo('productComposition-edit');
            $role->givePermissionTo('productComposition-delete');

            $role->givePermissionTo('plantUptake-list');

            $role->givePermissionTo('plantStage-list');

            $role->givePermissionTo('plagueType-list');

            $role->givePermissionTo('plagueSpot-list');

            $role->givePermissionTo('plague-list');
            $role->givePermissionTo('plague-create');
            $role->givePermissionTo('plague-edit');
            $role->givePermissionTo('plague-delete');

            $role->givePermissionTo('analyseWater-list');
            $role->givePermissionTo('analyseWater-create');
            $role->givePermissionTo('analyseWater-edit');
            $role->givePermissionTo('analyseWater-delete');

            $role->givePermissionTo('analyseSoilGuideline-list');
            $role->givePermissionTo('analyseSoilGuideline-create');
            $role->givePermissionTo('analyseSoilGuideline-edit');
            $role->givePermissionTo('analyseSoilGuideline-delete');

            $role->givePermissionTo('analyseSoil-list');
            $role->givePermissionTo('analyseSoil-create');
            $role->givePermissionTo('analyseSoil-edit');
            $role->givePermissionTo('analyseSoil-delete');

            $role->givePermissionTo('address-list');
            $role->givePermissionTo('address-create');
            $role->givePermissionTo('address-edit');
            $role->givePermissionTo('address-delete');

            $role->givePermissionTo('plantPartsAnatomy-list');

            $role->givePermissionTo('PlaguePlantPartsAnatomy-list');

            $role->givePermissionTo('companyAddress-list');
            $role->givePermissionTo('companyAddress-create');
            $role->givePermissionTo('companyAddress-edit');
            $role->givePermissionTo('companyAddress-delete');

            $role->givePermissionTo('cropPlague-list');
            $role->givePermissionTo('cropPlague-create');
            $role->givePermissionTo('cropPlague-edit');
            $role->givePermissionTo('cropPlague-delete');

            $role->givePermissionTo('device-list');
            $role->givePermissionTo('device-create');
            $role->givePermissionTo('device-edit');
            $role->givePermissionTo('device-delete');

            
            $role->givePermissionTo('deviceType-list');                        
            $role->givePermissionTo('plantAnalyse-list');
            $role->givePermissionTo('plantAnalyse-create');
            $role->givePermissionTo('plantAnalyse-edit');
            $role->givePermissionTo('plantAnalyse-delete');

            $role->givePermissionTo('plantPlague-list');

            $role->givePermissionTo('dailyWeather-list');

            $role->givePermissionTo('currentWeather-list');

            $role->givePermissionTo('harvest-list');
            $role->givePermissionTo('harvest-create');
            $role->givePermissionTo('harvest-edit');

            $role->givePermissionTo('soilData-list');

            $role->givePermissionTo('airData-list');
         

            $user->assignRole($role);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'company_id' => '1',
            'blocked' => false
            ]);
    
            $role = Role::create(['name' => 'user']);
    
            //$permissions = Permission::pluck('id','id')->all();
            $role->givePermissionTo('role-list');
            $role->givePermissionTo('permission-list');

            $role->givePermissionTo('user-list');
            $role->givePermissionTo('user-edit');

            $role->givePermissionTo('company-list');

            $role->givePermissionTo('farm-list');

            $role->givePermissionTo('terrain-list');

            $role->givePermissionTo('plantType-list');
            
            $role->givePermissionTo('crop-list');
            $role->givePermissionTo('crop-create');
            $role->givePermissionTo('crop-edit');

            $role->givePermissionTo('plant-list');

            $role->givePermissionTo('soiltype-list');

            $role->givePermissionTo('productType-list');

            $role->givePermissionTo('product-list');

            $role->givePermissionTo('productComposition-list');

            $role->givePermissionTo('plantUptake-list');

            $role->givePermissionTo('plantStage-list');

            $role->givePermissionTo('plagueType-list');

            $role->givePermissionTo('plagueSpot-list');

            $role->givePermissionTo('plague-list');

            $role->givePermissionTo('analyseWater-list');
            $role->givePermissionTo('analyseWater-create');
            $role->givePermissionTo('analyseWater-edit');
            $role->givePermissionTo('analyseWater-delete');

            $role->givePermissionTo('analyseSoilGuideline-list');
            $role->givePermissionTo('analyseSoilGuideline-create');
            $role->givePermissionTo('analyseSoilGuideline-edit');
            $role->givePermissionTo('analyseSoilGuideline-delete');

            $role->givePermissionTo('analyseSoil-list');
            $role->givePermissionTo('analyseSoil-create');
            $role->givePermissionTo('analyseSoil-edit');
            $role->givePermissionTo('analyseSoil-delete');

            $role->givePermissionTo('address-list');

            $role->givePermissionTo('plantPartsAnatomy-list');

            $role->givePermissionTo('PlaguePlantPartsAnatomy-list');

            $role->givePermissionTo('companyAddress-list');

            $role->givePermissionTo('cropPlague-list');
            $role->givePermissionTo('cropPlague-create');
            $role->givePermissionTo('cropPlague-edit');
            $role->givePermissionTo('cropPlague-delete');

            $role->givePermissionTo('device-list');

            $role->givePermissionTo('deviceType-list');

            $role->givePermissionTo('plantAnalyse-list');
            $role->givePermissionTo('plantAnalyse-create');
            $role->givePermissionTo('plantAnalyse-edit');
            $role->givePermissionTo('plantAnalyse-delete');

            $role->givePermissionTo('plantPlague-list');

            $role->givePermissionTo('dailyWeather-list');

            $role->givePermissionTo('currentWeather-list');

            $role->givePermissionTo('harvest-list');

            $role->givePermissionTo('soilData-list');

            $role->givePermissionTo('airData-list');
            
            $user->assignRole($role);

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
