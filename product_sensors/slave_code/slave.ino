//#include <WiFi.h>
//#include <WiFiClientSecure.h>
//#include <PubSubClient.h>
//#include <ESPmDNS.h>

#include <driver/adc.h>
//#include <esp_wifi.h>
#include "driver/adc.h"
#include "soc/rtc_cntl_reg.h"
#include <painlessMesh.h>
#include <Wire.h>
//#include <Adafruit_MPL3115A2.h>
//#include <DHT.h>
//#include <DHT_U.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include <Adafruit_Sensor.h>
#include "Adafruit_TSL2591.h"
//#include <NTPClient.h>
//#include <WiFiUdp.h>

#define   MESH_SSID       "sadalab"
#define   MESH_PASSWORD   "somethingSneaky"
#define   MESH_PORT       5555

#define ONE_WIRE_BUS 25

#define uS_TO_S_FACTOR 1000000  /* Conversion factor for micro seconds to seconds */
#define TIME_TO_SLEEP  300        /* Time ESP32 will go to sleep (in seconds) */


// Prototypes
void receivedCallback(uint32_t from, String & msg);
void newConnectionCallback(uint32_t nodeId);
void changedConnectionCallback(); 
void nodeTimeAdjustedCallback(int32_t offset); 
void delayReceivedCallback(uint32_t from, int32_t delay);

//void readdht();
void readHumiditi20();
void readHumiditi40();
//void readPrecipitation();
//void readAltimetro();


float humidadeSoil40 = 0;
float humidadeSoil20 = 0;
/*float pascals, hpa;
float altm;
float tempC;
float precipitation;*/
float tempSoil40 = 0;
float tempSoil20 = 0;

//status bat
  float bat = 0;

//uint8_t data[DATASIZE];
char message[125];

//Adafruit_MPL3115A2 baro = Adafruit_MPL3115A2();
//DHT dht(4, DHT11, 15);

OneWire oneWire(ONE_WIRE_BUS);

DallasTemperature sensors(&oneWire);

String Mac = "B4E62DEE7245";
painlessMesh  mesh;

bool calc_delay = false;
SimpleList<uint32_t> nodes;





void setup() {

  
  Serial.begin(9600);


  sensors.begin();
  sensors.setWaitForConversion(true);
  
 WRITE_PERI_REG(RTC_CNTL_BROWN_OUT_REG, 0); //disable brownout detector


  mesh.setDebugMsgTypes(ERROR | DEBUG | STARTUP | CONNECTION);  // set before init() so that you can see error messages

  mesh.init(MESH_SSID, MESH_PASSWORD, MESH_PORT);


  mesh.setContainsRoot(true);


esp_sleep_enable_timer_wakeup(TIME_TO_SLEEP * uS_TO_S_FACTOR);


}

void loop() {
  
  mesh.update();

  getAllSensorData();
  
//por a dormir
Serial.print("Go sleep");

esp_deep_sleep_start();
    // Serial.flush(); 
/*     WiFi.disconnect();
     WiFi.mode(WIFI_OFF);
     esp_wifi_stop();
     adc_power_off();
     esp_deep_sleep_start();
     delay(100);*/
}

void getAllSensorData(){


delay(1000);
  //get all values

  readBattery();
  readHumiditis();
  readtemperatures();

  sprintf(message, "data=%s, %.2f, %.2f, %.2f,%.2f,%.2f",Mac.c_str(), humidadeSoil20, humidadeSoil40, tempSoil20, tempSoil40, bat);

  Serial.println(message);
  
mesh.sendBroadcast(message);
}









void readBattery(){
  
analogSetCycles(8);
analogSetSamples(1); 
analogSetClockDiv(1); 
analogSetAttenuation(ADC_11db);
analogSetPinAttenuation(4,ADC_11db);
  
 float ana = analogRead(4);//4

  float batPercent = map(ana, 0.0f, 4095.0f, 0, 100);

Serial.println("analog value : ");
Serial.println(ana);

Serial.println("batery perccentage : ");
Serial.println(batPercent);

   bat = batPercent;
}



void readHumiditis() {

 pinMode(34,INPUT);
 pinMode(33,INPUT);

  float sensor_analog = analogRead(34);
  
//3300 - 1800
humidadeSoil20 = map(sensor_analog, 3100, 1800, 0, 100);


//pinMode(33,INPUT);
  float sensor_analog2 = analogRead(33);//39

//3100 - 1600
humidadeSoil40 = map(sensor_analog2, 3100, 1800, 0, 100);
 


if(humidadeSoil20>100){
  humidadeSoil20=100;
}else if(humidadeSoil20<0){
  humidadeSoil20=0;
}

if(humidadeSoil40>100){
  humidadeSoil40=100;
}else if(humidadeSoil40<0){
  humidadeSoil40=0;
}


}


void readtemperatures(){

 // pinMode(27,OUTPUT);
 // digitalWrite(27, HIGH);
  
  sensors.begin();
  
  sensors.setWaitForConversion(true);
  
  delay(1000);
  sensors.requestTemperatures();
  sensors.setWaitForConversion(true);
  delay(50);
  
  tempSoil40 = sensors.getTempCByIndex(0);
  tempSoil20 = sensors.getTempCByIndex(1);

  //digitalWrite(27, LOW);

}
