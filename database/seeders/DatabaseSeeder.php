<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(PermissionTableSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        

        $this->call(FarmSeeder::class);
        $this->call(TerrainSeeder::class);
        
        $this->call(PlantTypeSeeder::class); 
        $this->call(PlantSeeder::class);

        $this->call(SoilTypeSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductCompositionSeeder::class);
        $this->call(PlantStageSeeder::class); 
        $this->call(ProductSeeder::class);
        $this->call(PlantUptakeSeeder::class);
        
        $this->call(PlagueTypeSeeder::class);
        
        $this->call(PlantPartsAnatomySeeder::class);
        $this->call(PlagueSeeder::class);
        $this->call(PlaguePlantsPartsAnatomySeeder::class);

        $this->call(AnalyseSoilGuidelineSeeder::class);
        $this->call(AnalyseSoilSeeder::class);
        
        $this->call(AddressSeeder::class);

        $this->call(CompanyAddressSeeder::class);
        $this->call(PlantAnalyseSeeder::class);
        $this->call(CropPlagueSeeder::class);
        $this->call(PlantPlagueSeeder::class);

        $this->call(DeviceSeeder::class);
        
        
        
        
        
        
        
    }
}
