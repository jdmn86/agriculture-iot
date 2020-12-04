<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoilType;
use DB;


class SoilTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
         DB::table('soil_types')->delete();
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        SoilType::create([
            'id' => '1',
            'nome_solo' => 'sand',
            'argila_percentagem' => '7.5',
            'silte_percentagem' => '7.5',
            'areia_percentagem' => '85',//franco arenoso - M
            'capacidade_campo' => '0.122', //percentagem
            'capacidade_emurchecimento' => '0.021',//percentagem
            'massa_volumica_aparente' => '1.40',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '2',
            'nome_solo' => 'Loamy sand',
            'argila_percentagem' => '7',
            'silte_percentagem' => '15',
            'areia_percentagem' => '78',//franco arenoso - M
            'capacidade_campo' => '0.224', //percentagem
            'capacidade_emurchecimento' => '0.055',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '3',
            'nome_solo' => 'Sandy Loam',
            'argila_percentagem' => '10',
            'silte_percentagem' => '27.5',
            'areia_percentagem' => '62.5',//franco arenoso - M
            'capacidade_campo' => '0.274', //percentagem
            'capacidade_emurchecimento' => '0.104',//percentagem
            'massa_volumica_aparente' => '1.6',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '4',
            'nome_solo' => 'Silt Loam',
            'argila_percentagem' => '3',
            'silte_percentagem' => '71',
            'areia_percentagem' => '26',//franco arenoso - M
            'capacidade_campo' => '0.322', //percentagem
            'capacidade_emurchecimento' => '0.142',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '5',
            'nome_solo' => 'Silt',
            'argila_percentagem' => '4',
            'silte_percentagem' => '88',
            'areia_percentagem' => '8',//franco arenoso - M
            'capacidade_campo' => '0.27', //percentagem
            'capacidade_emurchecimento' => '0.15',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '6',
            'nome_solo' => 'Loam',
            'argila_percentagem' => '19',
            'silte_percentagem' => '41',
            'areia_percentagem' => '40',//franco arenoso - M
            'capacidade_campo' => '0.274', //percentagem
            'capacidade_emurchecimento' => '0.128',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '7',
            'nome_solo' => 'Clay Loam',
            'argila_percentagem' => '33.5',
            'silte_percentagem' => '33',
            'areia_percentagem' => '33.5',//franco arenoso - M
            'capacidade_campo' => '0.3125', //percentagem
            'capacidade_emurchecimento' => '0.219',//percentagem
            'massa_volumica_aparente' => '1.6',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '8',
            'nome_solo' => 'Silty Clay Loam',
            'argila_percentagem' => '33.5',
            'silte_percentagem' => '56.5',
            'areia_percentagem' => '10',//franco arenoso - M
            'capacidade_campo' => '0.42', //percentagem
            'capacidade_emurchecimento' => '0.211',//percentagem
            'massa_volumica_aparente' => '1.30',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '9',
            'nome_solo' => 'Silty Clay',
            'argila_percentagem' => '46.5',
            'silte_percentagem' => '46.5',
            'areia_percentagem' => '7',//franco arenoso - M
            'capacidade_campo' => '0.452', //percentagem
            'capacidade_emurchecimento' => '0.29',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '10',
            'nome_solo' => 'Clay',
            'argila_percentagem' => '67',
            'silte_percentagem' => '15',
            'areia_percentagem' => '18',//franco arenoso - M
            'capacidade_campo' => '0.362', //percentagem
            'capacidade_emurchecimento' => '0.268',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '11',
            'nome_solo' => 'Sandy Clay',
            'argila_percentagem' => '41.5',
            'silte_percentagem' => '7.5',
            'areia_percentagem' => '51',//franco arenoso - M
            'capacidade_campo' => '0.256', //percentagem
            'capacidade_emurchecimento' => '0.170',//percentagem
            'massa_volumica_aparente' => '1.4',
            'agua_disponivel_total' => '0'
        ]);
        SoilType::create([
            'id' => '12',
            'nome_solo' => 'Sandy Clay Loam',
            'argila_percentagem' => '26',
            'silte_percentagem' => '13',
            'areia_percentagem' => '61',//franco arenoso - M
            'capacidade_campo' => '0.269', //percentagem
            'capacidade_emurchecimento' => '0.187',//percentagem
            'massa_volumica_aparente' => '1.7',
            'agua_disponivel_total' => '0'
        ]);

          
    }
}
 