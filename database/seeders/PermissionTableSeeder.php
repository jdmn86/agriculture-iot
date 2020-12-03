<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'company-list',
            'company-create',
            'company-edit',
            'company-delete',
            'farm-list',
            'farm-create',
            'farm-edit',
            'farm-delete',
            'terrain-list',
            'terrain-create',
            'terrain-edit',
            'terrain-delete',
            'plantType-list',
            'plantType-create',
            'plantType-edit',
            'plantType-delete',
            'crop-list',
            'crop-create',
            'crop-edit',
            'crop-delete',
            'plant-list',
            'plant-create',
            'plant-edit',
            'plant-delete',

            ];

            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        
    }
}
