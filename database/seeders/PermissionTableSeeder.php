<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = [
            'role-list',
            'role-create', 
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create', 
            'permission-edit',
            'permission-delete',

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

            'variety-create',
            'variety-edit',
            'variety-delete',

            'soiltype-list',
            'soiltype-create',
            'soiltype-edit',
            'soiltype-delete',

            'productType-list',
            'productType-create',
            'productType-edit',
            'productType-delete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            'productComposition-list',
            'productComposition-create',
            'productComposition-edit',
            'productComposition-delete',

            'plantUptake-list',
            'plantUptake-create',
            'plantUptake-edit',
            'plantUptake-delete',

            'plantStage-list',
            'plantStage-create',
            'plantStage-edit',
            'plantStage-delete',

            'plagueType-list',
            'plagueType-create',
            'plagueType-edit',
            'plagueType-delete',

            'plagueSpot-list',
            'plagueSpot-create',
            'plagueSpot-edit',
            'plagueSpot-delete',

            'plague-list',
            'plague-create',
            'plague-edit',
            'plague-delete',

            'analyseWater-list',
            'analyseWater-create',
            'analyseWater-edit',
            'analyseWater-delete',

            'analyseSoilGuideline-list',
            'analyseSoilGuideline-create',
            'analyseSoilGuideline-edit',
            'analyseSoilGuideline-delete',

            'analyseSoil-list',
            'analyseSoil-create',
            'analyseSoil-edit',
            'analyseSoil-delete',

            'address-list',
            'address-create',
            'address-edit',
            'address-delete',

            'plantPartsAnatomy-list',
            'plantPartsAnatomy-create',
            'plantPartsAnatomy-edit',
            'plantPartsAnatomy-delete',
            
            'PlaguePlantPartsAnatomy-list',
            'PlaguePlantPartsAnatomy-create',
            'PlaguePlantPartsAnatomy-edit',
            'PlaguePlantPartsAnatomy-delete',

            'companyAddress-list',
            'companyAddress-create',
            'companyAddress-edit',
            'companyAddress-delete',

            'cropPlague-list',
            'cropPlague-create',
            'cropPlague-edit',
            'cropPlague-delete',

            'device-list',
            'device-create',
            'device-edit',
            'device-delete',

            'plantAnalyse-list',
            'plantAnalyse-create',
            'plantAnalyse-edit',
            'plantAnalyse-delete',

            'plantPlague-list',
            'plantPlague-create',
            'plantPlague-edit',
            'plantPlague-delete',

            
            ];

            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        
    }
}
