<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Device;
use App\Models\Farm;
use App\Models\CurrentWeather;

use GuzzleHttp\Client;

class WeatherCurrent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WeatherCurrent:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data weather external Api currently for all farms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            \Log::info("Cake Cron execution!");
    $this->info('Cake:Cron Command is working fine!');

        $DEFAULT_API_BASE_URL = "https://api.openweathermap.org/data/2.5/onecall?lat=";

        $lasturl= "&units=metric&exclude=hourly,daily,minutely&appid=41b13be552473c0c0ada1381a7ba3fef";


        // $devices= Device::where('enabled','1')->whereNotNull('currentTerrain_id')->whereNotNull('currentFarm_id')->get();
         $farms = Farm::where('enabled','1')->whereNotNull('lat')->whereNotNull('lng')->get();

$this->info('2');
        foreach ($farms as $farm) {
            
            $lat=$farm->lat;
            $lon=$farm->lng;
           
            
$this->info($DEFAULT_API_BASE_URL.$lat.'&lon='.$lon.$lasturl);

            $client = new Client();
            $response = $client->request('GET',$DEFAULT_API_BASE_URL.$lat.'&lon='.$lon.$lasturl);

            $json = json_decode($response->getBody());

            $currentWeather = new CurrentWeather;


            $currentWeather->id_farm = $farm->id; 

            $currentWeather->date = date('Y-m-d H:i:s', $json->current->dt); 
            $currentWeather->weekDay = date('w', $json->current->dt);
            // $currentWeather->icon = $json->current->icon;
            if($json->current->weather[0]->icon == '01n'){
                $currentWeather->icon = 'fas fa-moon fa-2x';

            }else if($json->current->weather[0]->icon == '10d' || $json->current->weather[0]->icon == '10n'){
                
                $currentWeather->icon = 'fas fa-cloud-showers-heavy fa-2x';
            
              }else if($json->current->weather[0]->icon == '13d' || $json->current->weather[0]->icon == '13n'){
            
                $currentWeather->icon = 'fas fa-snowflake fa-2x';
            
             }else if($json->current->weather[0]->icon == '11d' || $json->current->weather[0]->icon == '11n'){
            
                $currentWeather->icon = 'fas fa-cloud-meatball fa-2x';
            
             }else if($json->current->weather[0]->icon == '09d' || $json->current->weather[0]->icon == '09n'){
            
                $currentWeather->icon = 'fas fa-wind fa-2x';
            
            }else if($json->current->weather[0]->icon == '50d' || $json->current->weather[0]->icon == '50n'){
            
                $currentWeather->icon = 'fas fa-smog fa-2x';
            
             }else if($json->current->weather[0]->icon == '04d' || $json->current->weather[0]->icon == '04n'){
            
                $currentWeather->icon = 'fas fa-cloud fa-2x';
            
              }else if($json->current->weather[0]->icon == '03d' || $json->current->weather[0]->icon == '02d' ){
            
                $currentWeather->icon = 'fas fa-cloud-sun fa-2x';
            
            }else if($json->current->weather[0]->icon == '03n' || $json->current->weather[0]->icon == '02n'){
            
                $currentWeather->icon = 'fas fa-cloud-moon fa-2x';
            }else {
                //clear-day
                $currentWeather->icon = 'fas fa-sun';
            }         

            $currentWeather->clouds = $json->current->clouds;
            $currentWeather->weather_type = $json->current->weather[0]->main;
            
            $currentWeather->temp = $json->current->temp; 
            $currentWeather->feels_like = $json->current->feels_like;    
            $currentWeather->dew_point = $json->current->dew_point;
            $currentWeather->humidity = $json->current->humidity;
            $currentWeather->pressure = $json->current->pressure;
            $currentWeather->wind_speed = $json->current->wind_speed;
            if(isset($json->current->wind_gust)){
                $currentWeather->wind_gust = $json->current->wind_gust;                
            }
            
            $currentWeather->wind_deg = $json->current->wind_deg;
            $currentWeather->uvi = $json->current->uvi;
            $currentWeather->visibility = $json->current->visibility;
            if(isset($json->current->rain->{'1h'})){
                $currentWeather->rain = $json->current->rain->{'1h'};
            }
            if(isset($json->current->rain_hour)){
                $currentWeather->rain_hour = $json->current->rain_hour;
            }
            if(isset($json->current->snow)){
                $currentWeather->snow = $json->current->snow;
            }
            if(isset($json->current->snow_hour)){
                $currentWeather->snow_hour = $json->current->snow_hour;
            }

            if($currentWeather->temp-$currentWeather->dew_point<1.8){
                $currentWeather->wetleaf = 1;
            } else{
                $currentWeather->wetleaf  = 0;
            }

            $this->info(print_r($currentWeather, true) );

            $currentWeather->save();

        }


          return 0;

    }
}
