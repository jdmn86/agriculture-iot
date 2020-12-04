<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnalyseSoil;
use DB;

class AnalyseSoilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('analyse_soils')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

          AnalyseSoil::create([
            'id' => '1', 
            'terrain_id' => '1',
            'tipoSolo_id' => '12',

            'analysisGuideline_id' => '1',

            'soilDepth' => '10.00',
            
            'date' => '2020-08-01',
            
            'matOrgPer' => '1.90',
            'matOrgPerLevel' => '1',

            'nitrogen' => '82',
            'nitrogenLevel'=> '4',//DL ou DC
            
            'phosphorus' => '70',
            'phosphorusLevel' => '4', 

            'potassium' => '203',
            'potassiumLevel' => '3',
            
            'Magnesium' => '330',
            'MagnesiumLevel' => '4', 
            
            'Calcium' => '2214',
            'CalciumLevel' => '3',
            
            'Sodium' => '77',
            'SodiumLevel' => '3',
            
            'phSoil' => '7.3',
            'phSoilLevel' => '3',
            'phBufferIndex' => null,
            
            'hydrogen' => null,
            'hydrogenLevel' => null,
            
            'Sulfur' => '64',
            'SulfurLevel' => '4',
            
            'zinc' => '0.8',
            'zincLevel' => '2',
            
            'Manganese' => '12',
			'ManganeseLevel' => '3',
			
			'Cooper' => '1.9',
			'CooperLevel' => '3',
			
			'Iron' => '46',
			'IronLevel' => '3',
			
			'Boron' => '1.5',
			'BoronLevel' => '3',
			
			'Aluminium' => null,
			'AluminiumLevel' => null,
			
			'excessLime' => null,
			
			'CEC' => '14.5',
			
			'perCationSatK' => '3.6',
			'perCationSatKLevel' => '3',
			'perCationSatMg' => '19',
			'perCationSatMgLevel' => '4',
			'perCationSatCa' => '76',
			'perCationSatCaLevel' => '4',
			'perCationSatNa' => '0',
			'perCationSatNaLevel' => '1',
			
			'Sulfate' => '192',
			'SulfateLevel' => '4',
			
			'Chloride' => '39.90',
			'ChlorideLevel' => '3',
			
			'Ece' => '1.10',
			'EceLevel' => '3',
			
			'Obs' => 'Dont have OBS',

        ]);

           AnalyseSoil::create([
            'id' => '2',
            'terrain_id' => '1',
            'tipoSolo_id' => '12',
            'soilDepth' => '10.00',
            
            'date' => '2020-08-15',
            
            'matOrgPer' => '1.90',
            'matOrgPerLevel' => '1',

            'nitrogen' => '82',
            'nitrogenLevel'=> '4',//DL ou DC
            
            'phosphorus' => '70',
            'phosphorusLevel' => '4',

            'potassium' => '203',
            'potassiumLevel' => '3',
            
            'Magnesium' => '330',
            'MagnesiumLevel' => '4',
            
            'Calcium' => '2214',
            'CalciumLevel' => '3',
            
            'Sodium' => '77',
            'SodiumLevel' => '3',
            
            'phSoil' => '7.3',
            'phSoilLevel' => '3',
            'phBufferIndex' => null,
            
            'hydrogen' => null,
            'hydrogenLevel' => null,
            
            'Sulfur' => '64',
            'SulfurLevel' => '4',
            
            'zinc' => '0.8',
            'zincLevel' => '2',
            
            'Manganese' => '12',
			'ManganeseLevel' => '3',
			
			'Cooper' => '1.9',
			'CooperLevel' => '3',
			
			'Iron' => '46',
			'IronLevel' => '3',
			
			'Boron' => '1.5',
			'BoronLevel' => '3',
			
			'Aluminium' => null,
			'AluminiumLevel' => null,
			
			'excessLime' => null,
			
			'CEC' => '14.5',
			
			'perCationSatK' => '3.6',
			'perCationSatKLevel' => '3',
			'perCationSatMg' => '19',
			'perCationSatMgLevel' => '4',
			'perCationSatCa' => '76',
			'perCationSatCaLevel' => '4',
			'perCationSatNa' => '0',
			'perCationSatNaLevel' => '1',
			
			'Sulfate' => '192',
			'SulfateLevel' => '4',
			
			'Chloride' => '39.90',
			'ChlorideLevel' => '3',
			
			'Ece' => '1.10',
			'EceLevel' => '3',
			
			'Obs' => 'Dont have OBS',

        ]);

           AnalyseSoil::create([
            'id' => '3',
            'terrain_id' => '1',
            'tipoSolo_id' => '12',
            'soilDepth' => '10.00',
            
            'date' => '2020-08-30',
            
            'matOrgPer' => '1.90',
            'matOrgPerLevel' => '1',

            'nitrogen' => '82',
            'nitrogenLevel'=> '4',//DL ou DC
            
            'phosphorus' => '70',
            'phosphorusLevel' => '4',

            'potassium' => '203',
            'potassiumLevel' => '3',
            
            'Magnesium' => '330',
            'MagnesiumLevel' => '4',
            
            'Calcium' => '2214',
            'CalciumLevel' => '3',
            
            'Sodium' => '77',
            'SodiumLevel' => '3',
            
            'phSoil' => '7.3',
            'phSoilLevel' => '3',
            'phBufferIndex' => null,
            
            'hydrogen' => null,
            'hydrogenLevel' => null,
            
            'Sulfur' => '64',
            'SulfurLevel' => '4',
            
            'zinc' => '0.8',
            'zincLevel' => '2',
            
            'Manganese' => '12',
			'ManganeseLevel' => '3',
			
			'Cooper' => '1.9',
			'CooperLevel' => '3',
			
			'Iron' => '46',
			'IronLevel' => '3',
			
			'Boron' => '1.5',
			'BoronLevel' => '3',
			
			'Aluminium' => null,
			'AluminiumLevel' => null,
			
			'excessLime' => null,
			
			'CEC' => '14.5',
			
			'perCationSatK' => '3.6',
			'perCationSatKLevel' => '3',
			'perCationSatMg' => '19',
			'perCationSatMgLevel' => '4',
			'perCationSatCa' => '76',
			'perCationSatCaLevel' => '4',
			'perCationSatNa' => '0',
			'perCationSatNaLevel' => '1',
			
			'Sulfate' => '192',
			'SulfateLevel' => '4',
			
			'Chloride' => '39.90',
			'ChlorideLevel' => '3',
			
			'Ece' => '1.10',
			'EceLevel' => '3',
			
			'Obs' => 'Dont have OBS',

        ]);


           AnalyseSoil::create([
            'id' => '4',
            'terrain_id' => '1',
            'tipoSolo_id' => '12',
            'soilDepth' => '10.00',
            
            'date' => '2020-09-01',
            
            'matOrgPer' => '1.90',
            'matOrgPerLevel' => '1',

            'nitrogen' => '82',
            'nitrogenLevel'=> '4',//DL ou DC
            
            'phosphorus' => '70',
            'phosphorusLevel' => '4',

            'potassium' => '203',
            'potassiumLevel' => '3',
            
            'Magnesium' => '330',
            'MagnesiumLevel' => '4',
            
            'Calcium' => '2214',
            'CalciumLevel' => '3',
            
            'Sodium' => '77',
            'SodiumLevel' => '3',
            
            'phSoil' => '7.3',
            'phSoilLevel' => '3',
            'phBufferIndex' => null,
            
            'hydrogen' => null,
            'hydrogenLevel' => null,
            
            'Sulfur' => '64',
            'SulfurLevel' => '4',
            
            'zinc' => '0.8',
            'zincLevel' => '2',
            
            'Manganese' => '12',
			'ManganeseLevel' => '3',
			
			'Cooper' => '1.9',
			'CooperLevel' => '3',
			
			'Iron' => '46',
			'IronLevel' => '3',
			
			'Boron' => '1.5',
			'BoronLevel' => '3',
			
			'Aluminium' => null,
			'AluminiumLevel' => null,
			
			'excessLime' => null,
			
			'CEC' => '14.5',
			
			'perCationSatK' => '3.6',
			'perCationSatKLevel' => '3',
			'perCationSatMg' => '19',
			'perCationSatMgLevel' => '4',
			'perCationSatCa' => '76',
			'perCationSatCaLevel' => '4',
			'perCationSatNa' => '0',
			'perCationSatNaLevel' => '1',
			
			'Sulfate' => '192',
			'SulfateLevel' => '4',
			
			'Chloride' => '39.90',
			'ChlorideLevel' => '3',
			
			'Ece' => '1.10',
			'EceLevel' => '3',
			
			'Obs' => 'Dont have OBS',

        ]);
 
 		AnalyseSoil::create([
            'id' => '5',
            'terrain_id' => '1',
            'tipoSolo_id' => '12',
            'soilDepth' => '10.00',
            
            'date' => '2020-09-15',
            
            'matOrgPer' => '1.90',
            'matOrgPerLevel' => '1',

            'nitrogen' => '82',
            'nitrogenLevel'=> '4',//DL ou DC
            
            'phosphorus' => '70',
            'phosphorusLevel' => '4',

            'potassium' => '203',
            'potassiumLevel' => '3',
            
            'Magnesium' => '330',
            'MagnesiumLevel' => '4',
            
            'Calcium' => '2214',
            'CalciumLevel' => '3',
            
            'Sodium' => '77',
            'SodiumLevel' => '3',
            
            'phSoil' => '7.3',
            'phSoilLevel' => '3',
            'phBufferIndex' => null,
            
            'hydrogen' => null,
            'hydrogenLevel' => null,
            
            'Sulfur' => '64',
            'SulfurLevel' => '4',
            
            'zinc' => '0.8',
            'zincLevel' => '2',
            
            'Manganese' => '12',
			'ManganeseLevel' => '3',
			
			'Cooper' => '1.9',
			'CooperLevel' => '3',
			
			'Iron' => '46',
			'IronLevel' => '3',
			
			'Boron' => '1.5',
			'BoronLevel' => '3',
			
			'Aluminium' => null,
			'AluminiumLevel' => null,
			
			'excessLime' => null,
			
			'CEC' => '14.5',
			
			'perCationSatK' => '3.6',
			'perCationSatKLevel' => '3',
			'perCationSatMg' => '19',
			'perCationSatMgLevel' => '4',
			'perCationSatCa' => '76',
			'perCationSatCaLevel' => '4',
			'perCationSatNa' => '0',
			'perCationSatNaLevel' => '1',
			
			'Sulfate' => '192',
			'SulfateLevel' => '4',
			
			'Chloride' => '39.90',
			'ChlorideLevel' => '3',
			
			'Ece' => '1.10',
			'EceLevel' => '3',
			
			'Obs' => 'Dont have OBS',

        ]);

          

    }
}
 