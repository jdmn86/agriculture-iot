<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Plant;
use DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('plants')->delete(); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
          Plant::create([
            'id' => '1',
            'name' => 'Onion',
            'name_cientifico' => 'Allium cepa',
            // 'bio' => null,
            'master_plant_id' => null,
            'nome_variedade' => null,
            'tipo_planta_id' => '1',
            //'tipo_dias'=> 'DL',//DL ou DC
            'ph_min' => '5.5',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.3',
            //'solo_drenagem' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            //'solo_arejado' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            //'densidade_folhas' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            // 'temp_min' => '12',
            // 'temp_max' => '28',
            'compasso_plantas' => '12.5',
            'compasso_linhas' => '50',
            'fotoperiodo' => '10',
            //'rotacoes' => null, //num anos 
            // 'producao' => '25',// ton/ha 
            //'month_inicio' => '2-4',  
            // 'dias_germinacao' =>'8',
            // 'dias_transplantacao' =>'50',
            // 'dias_crescimento' =>'75',
            // 'temperatura_germinacao_min' => '15',
            // 'temperatura_germinacao_max' => '22',
            'water_consumption' => '1',
            'image' => '/img/plantas/Onion/onion1.jpeg',
            'company_id' => null,
            
        ]);

           Plant::create([
            'id' => '2',
            'name' => 'Onion',
            'name_cientifico' => 'Allium cepa',
            // 'bio' => null,
            'master_plant_id' => '1',
            'nome_variedade' => 'leone',
            'tipo_planta_id' => '1',
            //'tipo_dias'=> 'DL',//DL ou DC
            'ph_min' => '5.5',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.3',
            //'solo_drenagem' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            //'solo_arejado' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            //'densidade_folhas' => null,//1-alto 2-medio alto 3-medio 4 - baixo 5 - muito baixo
            // 'temp_min' => '12',
            // 'temp_max' => '28',
            'compasso_plantas' => '12.5',
            'compasso_linhas' => '50',
            'fotoperiodo' => '10',
            //'rotacoes' => null, //num anos 
            // 'producao' => '25',// ton/ha 
            //'month_inicio' => '2-4',  
            // 'dias_germinacao' =>'8',
            // 'dias_transplantacao' =>'50',
            // 'dias_crescimento' =>'75',
            // 'temperatura_germinacao_min' => '15',
            // 'temperatura_germinacao_max' => '22',
            'water_consumption' => '1',
            'image' => '/img/plantas/Onion/onion1.jpeg',
            'company_id' => '1',
            
        ]);


              Plant::create([
            'id' => '3',
            'name' => 'Leek',
            'name_cientifico' => 'Allium porrum',
            'master_plant_id' => null,
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.3',
            'compasso_plantas' => '25',
            'compasso_linhas' => '25',
            'fotoperiodo' => '12',
            'water_consumption' => '1',
            'image' => '/img/plantas/Leek/leek1.jpeg',
            'company_id' => null,
        ]); 

              Plant::create([
            'id' => '4',
            'name' => 'Cabbage',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica oleracea var. capitata',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);

            Plant::create([
            'id' => '5',
            'name' => 'Brussels sprouts',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica oleracea var. gemmifera',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);

             Plant::create([
            'id' => '6',
            'name' => 'Cauliflower',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica oleracea var. botrytis',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);

            Plant::create([
            'id' => '7',
            'name' => 'Chard',
            'master_plant_id' => null,
            'name_cientifico' => 'Beta vulgaris subsp. vulgaris',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);

            Plant::create([
            'id' => '8',
            'name' => 'Collard greens',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica oleracea var. viridis',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);

            Plant::create([
            'id' => '9',
            'name' => 'Kale',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica oleracea var. sabellica',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.4',
            'compasso_plantas' => '40',
            'compasso_linhas' => '65',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Cabbage/cabbage1.jpeg',
            'company_id' => null,
            
        ]);


              Plant::create([
            'id' => '10',
            'name' => 'Carrot',
            'master_plant_id' => null,
            'name_cientifico' => 'Daucus carota subsp. sativus',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.5',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.35',
            'compasso_plantas' => '10',
            'compasso_linhas' => '20',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Carrot/carrot1.jpeg',
            'company_id' => null,
        ]);


            Plant::create([
            'id' => '11',
            'name' => 'Tomato',
            'master_plant_id' => null,
            'name_cientifico' => 'Solanum lycopersicum',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '7',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.35', //kc end p
            'compasso_plantas' => '10',
            'compasso_linhas' => '30',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Tomato/tomato1.jpeg',
            'company_id' => null,
            
        ]);
              Plant::create([
            'id' => '66',
            'name' => 'Tomato',
            'master_plant_id' => '11',
            'name_cientifico' => 'Solanum lycopersicum',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '7',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.35', //kc end p
            'compasso_plantas' => '10',
            'compasso_linhas' => '30',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Tomato/tomato1.jpeg',
            'company_id' => '1',
            
        ]);

                 Plant::create([
            'id' => '12',
            'name' => 'Maize',
            'master_plant_id' => null,
            'name_cientifico' => 'Zea mays',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '6.8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.8',
            'compasso_plantas' => '25',
            'compasso_linhas' => '75',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Maize/maize1.jpeg',
            'company_id' => null,
            
        ]);

             Plant::create([
            'id' => '13',
            'name' => 'olive',
            'master_plant_id' => null,
            'name_cientifico' => 'Olea europaea',
            'water_consumption' => '1',
            'tipo_planta_id' => '4',
            'nome_variedade' => null,
            'ph_min' => '6',
            'ph_max' => '8',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '0.45',
            'compasso_plantas' => '15',
            'compasso_linhas' => '30',
            'fotoperiodo' => '12',
            'image' => '/img/plantas/Olive/olivetree1.jpeg',
            'company_id' => null,
        ]);

           Plant::create([
            'id' => '14',
            'name' => 'Strawberry',
            'master_plant_id' => null,
            'name_cientifico' => 'Fragaria × ananassa',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Strawberry/strawberry.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '15',
            'name' => 'Asparagus',
            'master_plant_id' => null,
            'name_cientifico' => 'Asparagus officinalis',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Asparagus/asparagus.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '16',
            'name' => 'Avocado',
            'master_plant_id' => null,
            'name_cientifico' => 'Persea americana',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Avocado/avocado.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '17',
            'name' => 'Barley',
            'master_plant_id' => null,
            'name_cientifico' => 'Hordeum vulgare',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Barley/barley.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '18',
            'name' => 'Blackberry',
            'master_plant_id' => null,
            'name_cientifico' => 'Rubus',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Blackberry/blackberry.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '19',
            'name' => 'Blueberry',
            'master_plant_id' => null,
            'name_cientifico' => 'Cyanococcus',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Blueberry/blueberry.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '20',
            'name' => 'Brazil nut',
            'master_plant_id' => null,
            'name_cientifico' => 'Bertholletia excelsa',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/BrazilNut/brazilNut.jpeg',
            'company_id' => null,
        ]);


           Plant::create([
            'id' => '21',
            'name' => 'Broad bean',
            'master_plant_id' => null,
            'name_cientifico' => 'Vicia faba',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/BroadBean/broadBean.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '22',
            'name' => 'Buckwheat',
            'master_plant_id' => null,
            'name_cientifico' => 'Fagopyrum esculentum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Buckwheat/buckwheat.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '23',
            'name' => 'Broccoli',
            'master_plant_id' => null,
            'name_cientifico' => ' Brassica oleracea var. italica',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Broccoli/broccoli.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '24',
            'name' => 'Cashew nuts',
            'master_plant_id' => null,
            'name_cientifico' => 'Anacardium occidentale',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/CashewNuts/cashewNuts.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '25',
            'name' => 'Chestnut',
            'master_plant_id' => null,
            'name_cientifico' => 'Castanea',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Chestnut/chestnut.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '26',
            'name' => 'Chickpea',
            'master_plant_id' => null,
            'name_cientifico' => 'Cicer arietinum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Chickpea/chickpea.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '27',
            'name' => 'Chilli Pepper',
            'master_plant_id' => null,
            'name_cientifico' => 'Capsicum frutescens',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/ChilliPepper/chilliPepper.jpeg',
            'company_id' => null,
        ]);


           Plant::create([
            'id' => '28',
            'name' => 'Chives',
            'master_plant_id' => null,
            'name_cientifico' => 'Allium schoenoprasum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Chives/chives.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '29',
            'name' => 'Coffee',
            'master_plant_id' => null,
            'name_cientifico' => 'Coffea',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Coffee/coffee.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '30',
            'name' => 'Cotton',
            'master_plant_id' => null,
            'name_cientifico' => 'Gossypium',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Cotton/cotton.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '31',
            'name' => 'Cowpea',
            'master_plant_id' => null,
            'name_cientifico' => 'Vigna unguiculata',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Cowpea/cowpea.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '32',
            'name' => 'Cress',
            'master_plant_id' => null,
            'name_cientifico' => 'Lepidium sativum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Cress/cress.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '33',
            'name' => 'Cucumber',
            'master_plant_id' => null,
            'name_cientifico' => 'Cucumis sativus',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Cucumber/cucumber.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '34',
            'name' => 'Eggplant',
            'master_plant_id' => null,
            'name_cientifico' => 'Solanum melongena',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Eggplant/eggplant.jpeg',
            'company_id' => null,
        ]);


           Plant::create([
            'id' => '35',
            'name' => 'Garlic',
            'master_plant_id' => null,
            'name_cientifico' => 'Allium sativum',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Garlic/garlic.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '36',
            'name' => 'Grape',
            'master_plant_id' => null,
            'name_cientifico' => 'Vitis vinifera',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Grape/grape.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '37',
            'name' => 'Ginger',
            'master_plant_id' => null,
            'name_cientifico' => 'Zingiber officinale',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Ginger/ginger.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '38',
            'name' => 'Hazelnut (filbert)',
            'master_plant_id' => null,
            'name_cientifico' => 'Corylus',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Hazelnut/hazelnut.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '39',
            'name' => 'Hop',
            'master_plant_id' => null,
            'name_cientifico' => 'Humulus lupulus',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Hop/hop.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '40',
            'name' => 'Lemon',
            'master_plant_id' => null,
            'name_cientifico' => 'Citrus × limon',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Lemon/lemon.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '41',
            'name' => 'Lentil',
            'master_plant_id' => null,
            'name_cientifico' => 'Lens culinaris',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Lentil/lentil.jpeg',
            'company_id' => null,
        ]);


           Plant::create([
            'id' => '42',
            'name' => 'Lettuce',
            'master_plant_id' => null,
            'name_cientifico' => 'Lactuca sativa',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Lettuce/lettuce.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '43',
            'name' => 'Nutmeg',
            'master_plant_id' => null,
            'name_cientifico' => 'Myristica fragrans',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Nutmeg/nutmeg.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '44',
            'name' => 'Oats',
            'master_plant_id' => null,
            'name_cientifico' => 'Avena sativa',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Oats/oats.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '45',
            'name' => 'Oil palm',
            'master_plant_id' => null,
            'name_cientifico' => 'Elaeis guineensis',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/OilPalm/oilPalm.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '46',
            'name' => 'Orange',
            'master_plant_id' => null,
            'name_cientifico' => 'Citrus X sinensis',
            'water_consumption' => '1',
            'tipo_planta_id' => '2',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Orange/orange.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '47',
            'name' => 'Pea',
            'master_plant_id' => null,
            'name_cientifico' => 'Pisum sativum',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Pea/pea.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '48',
            'name' => 'Peanut (groundnut)',
            'master_plant_id' => null,
            'name_cientifico' => 'Arachis hypogaea',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Peanut/peanut.jpeg',
            'company_id' => null,
        ]);


           Plant::create([
            'id' => '49',
            'name' => 'Pear',
            'master_plant_id' => null,
            'name_cientifico' => 'Pyrus',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Pear/pear.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '50',
            'name' => 'Pepper, bell',
            'master_plant_id' => null,
            'name_cientifico' => 'Capsicum annuum Group',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/PepperBell/pepperBell.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '51',
            'name' => 'Pistachio',
            'master_plant_id' => null,
            'name_cientifico' => 'Pistacia vera',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Pistachio/pistachio.jpeg',
            'company_id' => null,
        ]);

    Plant::create([
            'id' => '52',
            'name' => 'Potato',
            'master_plant_id' => null,
            'name_cientifico' => 'Solanum tuberosum',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Potato/potato.jpeg',
            'company_id' => null,
        ]);

      Plant::create([
            'id' => '53',
            'name' => 'Pumpkin',
            'master_plant_id' => null,
            'name_cientifico' => 'Cucurbita',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Pumpkin/pumpkin.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '54',
            'name' => 'Radish',
            'master_plant_id' => null,
            'name_cientifico' => 'Raphanus sativus',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Radish/radish.jpeg',
            'company_id' => null,
        ]);

          Plant::create([
            'id' => '55',
            'name' => 'Rice',
            'master_plant_id' => null,
            'name_cientifico' => 'Oryza sativa',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Rice/rice.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '56',
            'name' => 'Rye',
            'master_plant_id' => null,
            'name_cientifico' => 'Nome científico: Secale cereale',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Rye/rye.jpeg',
            'company_id' => null,
        ]); 

        Plant::create([
            'id' => '57',
            'name' => 'Soybean',
            'master_plant_id' => null,
            'name_cientifico' => 'Glycine max',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Soybean/soybean.jpeg',
            'company_id' => null,
        ]); 

        Plant::create([
            'id' => '58',
            'name' => 'Spinach',
            'master_plant_id' => null,
            'name_cientifico' => 'Spinacia oleracea',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Spinach/spinach.jpeg',
            'company_id' => null,
        ]);          

          Plant::create([
            'id' => '59',
            'name' => 'Sugarcane',
            'master_plant_id' => null,
            'name_cientifico' => 'Saccharum officinarum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Sugarcane/sugarcane.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '60',
            'name' => 'Sunflower',
            'master_plant_id' => null,
            'name_cientifico' => 'Helianthus',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Sunflower/sunflower.jpeg',
            'company_id' => null,
        ]); 

        Plant::create([
            'id' => '61',
            'name' => 'Sweet potato',
            'master_plant_id' => null,
            'name_cientifico' => 'Ipomoea batatas',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/SweetPotato/sweetPotato.jpeg',
            'company_id' => null,
        ]); 

        Plant::create([
            'id' => '62',
            'name' => 'Turnip',
            'master_plant_id' => null,
            'name_cientifico' => 'Brassica rapa subsp. rapa',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Turnip/turnip.jpeg',
            'company_id' => null,
        ]);          

          Plant::create([
            'id' => '63',
            'name' => 'Walnut',
            'master_plant_id' => null,
            'name_cientifico' => 'Juglans',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Walnut/walnut.jpeg',
            'company_id' => null,
        ]);

        Plant::create([
            'id' => '64',
            'name' => 'Wheat',
            'master_plant_id' => null,
            'name_cientifico' => 'Triticum',
            'water_consumption' => '1',
            'tipo_planta_id' => '5',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Wheat/wheat.jpeg',
            'company_id' => null,
        ]); 

        Plant::create([
            'id' => '65',
            'name' => 'Yams',
            'master_plant_id' => null,
            'name_cientifico' => 'Dioscorea alata',
            'water_consumption' => '1',
            'tipo_planta_id' => '1',
            'nome_variedade' => null,
            'ph_min' => '1',
            'ph_max' => '1',
            'fracao_esgotamento_agua_solo_conforto_hidrico' => '1',
            'compasso_plantas' => '1',
            'compasso_linhas' => '1',
            'fotoperiodo' => '1',
            'image' => '/img/plantas/Yams/yams.jpeg',
            'company_id' => null,
        ]); 
    }
}
