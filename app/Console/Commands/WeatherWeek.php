<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Device;
use App\Models\Farm;
use App\Models\DailyWeather;

use GuzzleHttp\Client;
use Carbon\Carbon;

class WeatherWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WeatherWeek:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather data future for all farms';

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

         $DEFAULT_API_BASE_URL = "https://api.openweathermap.org/data/2.5/onecall?lat=";

        $lasturl= "&units=metric&exclude=hourly,current,minutely&appid=41b13be552473c0c0ada1381a7ba3fef";


  $farms = Farm::where('enabled','1')->whereNotNull('lat')->whereNotNull('lng')->get();

$this->info('2');
        foreach ($farms as $farm) {
            
            $lat=$farm->lat;
            $lon=$farm->lng;
           
            
$this->info($DEFAULT_API_BASE_URL.$lat.'&lon='.$lon.$lasturl);

        $client = new Client();
        $response = $client->request('GET',$DEFAULT_API_BASE_URL.$lat.'&lon='.$lon.$lasturl);


        $json = json_decode($response->getBody(),false);

        $now = Carbon::now();
        // $dateF = Carbon::toDateTimeString();
        $dateWithDays = $now->addDays(6);


              foreach ($json->daily as $d) {
                
                if(date('Y-m-d',$d->dt) > date('Y-m-d') && date('Y-m-d',$d->dt) < $dateWithDays){

                $dailyWeather = new DailyWeather;

                $dailyWeather->id_farm = $farm->id;

                $dailyWeather->date = date('Y-m-d H:i:s',$d->dt);

                $dailyWeather->weekDay = date('w', $d->dt);
                
               if($d->weather[0]->icon == '01n'){
                $dailyWeather->icon = 'fas fa-moon fa-2x';

            }else if($d->weather[0]->icon == '10d' || $d->weather[0]->icon == '10n'){
                
                $dailyWeather->icon = 'fas fa-cloud-showers-heavy fa-2x';
            
              }else if($d->weather[0]->icon == '13d' || $d->weather[0]->icon == '13n'){
            
                $dailyWeather->icon = 'fas fa-snowflake fa-2x';
            
             }else if($d->weather[0]->icon == '11d' || $d->weather[0]->icon == '11n'){
            
                $dailyWeather->icon = 'fas fa-cloud-meatball fa-2x';
            
             }else if($d->weather[0]->icon == '09d' || $d->weather[0]->icon == '09n'){
            
                $dailyWeather->icon = 'fas fa-wind fa-2x';
            
            }else if($d->weather[0]->icon == '50d' || $d->weather[0]->icon == '50n'){
            
                $dailyWeather->icon = 'fas fa-smog fa-2x';
            
             }else if($d->weather[0]->icon == '04d' || $d->weather[0]->icon == '04n'){
            
                $dailyWeather->icon = 'fas fa-cloud fa-2x';
            
              }else if($d->weather[0]->icon == '03d' || $d->weather[0]->icon == '02d' ){
            
                $dailyWeather->icon = 'fas fa-cloud-sun fa-2x';
            
            }else if($d->weather[0]->icon == '03n' || $d->weather[0]->icon == '02n'){
            
                $dailyWeather->icon = 'fas fa-cloud-moon fa-2x';
            }else {
                //clear-day
                $dailyWeather->icon = 'fas fa-sun';
            }         

            $dailyWeather->weather_type = $d->weather[0]->main;

            $dailyWeather->sunrise = date('Y-m-d H:i:s',$d->sunrise);

            $dailyWeather->sunset = date('Y-m-d H:i:s',$d->sunset);

            $dailyWeather->temp_min = $d->temp->min;
            
            $dailyWeather->temp_max = $d->temp->max;

            $dailyWeather->dew_point = $d->dew_point;

            $dailyWeather->humidity = $d->humidity;

            $dailyWeather->pressure = $d->pressure;

            $dailyWeather->wind_speed = $d->wind_speed;

            if(isset($d->wind_gust)){
                $dailyWeather->wind_gust = $d->wind_gust;                
            }
            
            $dailyWeather->wind_deg = $d->wind_deg;

            $dailyWeather->uvi = $d->uvi;

            if(isset($d->clouds)){
                $dailyWeather->clouds = $d->clouds;
            }

            if(isset($d->pop)){
                $dailyWeather->pop = $d->pop;
            }

            if(isset($d->rain)){
                $dailyWeather->rain = $d->rain;
            }
            if(isset($d->snow)){
                $dailyWeather->snow = $d->snow;
            }
            

                $dailyWeather->save();
        }
    }
}
        return 0;
    }
}
