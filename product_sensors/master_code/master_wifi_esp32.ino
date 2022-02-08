#include <esp_now.h>
#include <WiFi.h>
#include <WiFiClientSecure.h>
#include <PubSubClient.h>
#include <Adafruit_MPL3115A2.h>
#include <DHT.h>
#include "Adafruit_TSL2591.h"
#include <NTPClient.h>
#include <WiFiUdp.h>
#include <ESPmDNS.h>
#include <SPI.h>
#include "esp_bt.h"

// Define NTP Client to get time
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP);

//SSID e senha para se conectar à internet
#define SSID "Vodafone-"
#define PASSWORD "*******"
 
//Server MQTT que iremos utilizar
#define MQTT_SERVER "sadalab.com"
 
//Nome do tópico que devemos enviar os dados
//para que eles apareçam nos gráficos
#define TOPIC_NAME "dataDevice" 

 // Variables to save date and time
String formattedDate;
String dayStamp;
String timeStamp;

const char* ca_cert = \ 
"-----BEGIN CERTIFICATE-----\n" \
"MIIEkjCCA3qgAwIBAgIQCgFBQgAAAVOFc2oLheynCDANBgkqhkiG9w0BAQsFADA/\n" \
"MSQwIgYDVQQKExtEaWdpdGFsIFNpZ25hdHVyZSBUcnVzdCBDby4xFzAVBgNVBAMT\n" \
"DkRTVCBSb290IENBIFgzMB4XDTE2MDMxNzE2NDA0NloXDTIxMDMxNzE2NDA0Nlow\n" \
"SjELMAkGA1UEBhMCVVMxFjAUBgNVBAoTDUxldCdzIEVuY3J5cHQxIzAhBgNVBAMT\n" \
"GkxldCdzIEVuY3J5cHQgQXV0aG9yaXR5IFgzMIIBIjANBgkqhkiG9w0BAQEFAAOC\n" \
"AQ8AMIIBCgKCAQEAnNMM8FrlLke3cl03g7NoYzDq1zUmGSXhvb418XCSL7e4S0EF\n" \
"q6meNQhY7LEqxGiHC6PjdeTm86dicbp5gWAf15Gan/PQeGdxyGkOlZHP/uaZ6WA8\n" \
*******
"-----END CERTIFICATE-----\n";



//Cliente WiFi que o MQTT irá utilizar para se conectar
WiFiClientSecure wifiClient;
 
//Cliente MQTT, passamos a url do server, a porta
//e o cliente WiFi
PubSubClient client("sadalab.com",8883,wifiClient);



Adafruit_TSL2591 tsl = Adafruit_TSL2591(2591); // pass in a number for the sensor identifier (for your use later)

Adafruit_MPL3115A2 baro = Adafruit_MPL3115A2();

DHT dht(32, DHT22); //,15


void getAllSensorData();
void sendToMQTT(const String &msg );
void setupWiFi();
void configDeviceAP();
void setupEspNow();
void connectToMQTTServer();
void advancedRead();
void configureSensor();
void readLux();
void readDht();
void readAltimetro();
void readBattery(); 
int getTime();
void OnDataRecv(const uint8_t *mac_addr, const uint8_t *data, int data_len);

//Estrutura de comunicação entre os ESPs com DHT e o gateway
char message[125];
String Mac = "B4E62DEE5D09";

//altimetro
float altimetroPressure = 1000;
float altimetroMeters = 100;
float altimetroTempC = 20.0;

//dht
  float dhtHumidity = 0;
  float dhtTempC  = 0;
  float dhtHeatIndex  = 0;
  double dhtDewPoint = 0;

//status bat
  float bat = 0;

//lux sensor
  float luxIr = 0;
  float luxFull = 0;
  float luxVisible = 0;
  float lux = 0;


//time

int nextMinute ;

int CHANNEL = 6;

void setup() {

   btStop();

delay(1000);

  //Inicia serial
  Serial.begin(9600);



  //Inicia WiFi
  setupWiFi();

  //wifiClient.setCACert(ca_cert); 
   


    configDeviceAP();
  
  
  //Inicia ESPNOW
  setupEspNow();
  
      
      
   esp_now_register_recv_cb(OnDataRecv);



  //Conecta ao server MQTT
  connectToMQTTServer();
  

    int minutes = getTime();
     
      float restoInteiro = minutes / 5 ;

      float restoDecimal = minutes / 5.00  ;
      
      float diffresto = restoDecimal - restoInteiro  ;
      
      float tirar = diffresto *5 ;
      
      float sleepMinutos = 5 - tirar;
      
      nextMinute = sleepMinutos + minutes; ;
      
      if(nextMinute >= 60){
        nextMinute = 0;
      }

      
}

// config AP SSID
void configDeviceAP() {
  String Prefix = "Slave:";
  String Mac = WiFi.macAddress();
  String nameAp = Prefix + Mac;
  String Password = "123456789";
  bool result = WiFi.softAP(nameAp.c_str(), Password.c_str(), CHANNEL, 0);
  if (!result) {
    Serial.println("AP Config failed.");
  } else {
    Serial.println("AP Config Success. Broadcasting with AP: " + String(nameAp));
  }
}


void setupWiFi(){
  //Desconecta e reseta as configurações da WiFi
  //WiFi.disconnect(true, true);

/*  WiFi.persistent(false);
  WiFi.disconnect();
  WiFi.disconnect(WIFI_OFF);
  */
  delay(200);
  
  //O modo deve ser tanto AP quanto Station
  WiFi.mode(WIFI_AP_STA);

 //  delay(200);
  //Mandamos conectar na rede
 //delay(500);
  WiFi.begin(SSID, PASSWORD);

    // delay(1000);
  //Enquanto não estiver conectado à rede WiFi
  while (WiFi.status() != WL_CONNECTED) {
      
      delay(500);
      Serial.print(".");
  }
  
 
  //Se chegou aqui está conectado
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(SSID);
 
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

Serial.print("wifi channel : ");
Serial.println(WiFi.channel());

  CHANNEL = WiFi.channel();

}

void setupEspNow() {
  //Se a inicialização foi bem sucedida
  if (esp_now_init() == ESP_OK) {
    Serial.println("ESPNow Init Success");
    //Registra a função que será executada quando chegarem dados dos ESPs com DHT
 
  }
  //Se houve erro na inicialização
  else {
    Serial.println("ESPNow Init Failed");
    ESP.restart();
  }

  
}

//Função responsável por conectar ao server MQTT
void connectToMQTTServer() {
    /* get the IP address of server by MDNS name */
  //Serial.println("mDNS responder started");
  //IPAddress serverIp = MDNS.queryHost("sadalab.com");
  /* configure the MQTT server with IPaddress and port */
 // client.setServer(serverIp, 8883);
  /* this receivedCallback function will be invoked 
  when client received subscribed topic */
  //client.setCallback(receivedCallback);

    while (WiFi.status() != WL_CONNECTED) {
  Serial.println("WIFI desligado");
       //ESP.restart();
  }
  
   while (!client.connected()) {
     
    

    Serial.print("MQTT connecting ...");    
    /* connect now */
    if (client.connect(Mac.c_str(),"sadalabMqtt","JD9126jd")) {
      Serial.println("connected");
      /* subscribe topic */
     // client.subscribe("dataDevice");
    } else {
      Serial.print("failed, status code =");
      Serial.print(client.state());
      Serial.println("try again in 5 seconds");
      /* Wait 5 seconds before retrying */
      delay(3000);//5000
    }
  }
}


//Função que serve de callback para nos avisar
//quando chegou algo dos ESPs com DHT
void OnDataRecv(const uint8_t *mac_addr, const uint8_t *data, int data_len) {
  Serial.println("Received");
    char macStr[18];
  snprintf(macStr, sizeof(macStr), "%02x:%02x:%02x:%02x:%02x:%02x",
           mac_addr[0], mac_addr[1], mac_addr[2], mac_addr[3], mac_addr[4], mac_addr[5]);
 // SensorData* sensorData = (SensorData*) data;
   Serial.print("Last Packet Recv from: "); Serial.println(macStr);
  Serial.print("Last Packet Recv Data: "); Serial.println(*data);

    connectToMQTTServer();
    
  //Envia para o Server MQTT
  sendToMQTT((char *)data);
}

void sendToMQTT(const String &msg ) {


  
  Serial.print("Publish message: ");
  Serial.println(msg);
 
  //Publicamos no tópico onde o servidor espera para receber 
  //e gerar o gráfico
  client.publish(TOPIC_NAME, msg.c_str());
}


//Não precisamos fazer nada no loop
//Sempre que chegar algo de um dos ESPs com DHT
//a função OnDataRecv é executada automaticamente
//já que adicionamos como callback utilizando a função
//esp_now_register_recv_cb
void loop() {

//Serial.print("STA MAC: "); Serial.println(WiFi.macAddress());
//Serial.print("softAPmacAddress: "); 
//Serial.println(WiFi.softAPmacAddress());

  
   
int minut = getTime();

  if( nextMinute == minut ){

Serial.print("nextMinute: ");
Serial.print(nextMinute);
Serial.print("<");
Serial.println(getTime());  

    getAllSensorData();
    
    //ir buscar o tempo que deve dormir
    
      int minutes = getTime();
     
      float restoInteiro = minutes / 5 ;
      float restoDecimal = minutes / 5.00  ;
      float diffresto = restoDecimal - restoInteiro  ;
      float tirar = diffresto *5 ;
      float sleepMinutos = 5 - tirar;

      nextMinute = sleepMinutos + minutes; ;
      
      if(nextMinute >= 60){
        nextMinute = 0;
      }
      
   // int sleepSeconds=sleepMinutos * 60;
    
   // int sleepSecondsAdjust=sleepSeconds - 25
  
  }

//readBattery();


   // client.loop();
}

int getTime(){
 // Serial.println("in function getTime");
  // Initialize a NTPClient to get time
  timeClient.begin();

//  Serial.println("in function getTime after begin");
  
while(!timeClient.update()) {
    timeClient.forceUpdate();
  }
  // The formattedDate comes with the following format:
  // 2018-05-28T16:00:13Z
  // We need to extract date and time
  formattedDate = timeClient.getFormattedTime();
//  Serial.println(formattedDate);

//   Serial.print(timeClient.getMinutes());
//   Serial.print("minutes:");
  return timeClient.getMinutes();
}

void getAllSensorData(){


delay(1000);
  //get all values

  readBattery();  
  readAltimetro();
  readDht();
  readLux();

connectToMQTTServer();
  
sprintf(message, "data=%s, %.2f, %.2f, %.2f, %.2f, %.2f,%.2f,%.2f,%.2f,%.2f,%.2f,%.2f,%.2f",Mac.c_str(), dhtHumidity, dhtTempC, dhtHeatIndex, altimetroPressure, altimetroMeters, altimetroTempC, dhtDewPoint,luxFull,luxVisible,luxIr,lux, bat);

  sendToMQTT(message);
}


void readAltimetro() {

  delay(200);
  if (! baro.begin()) {
    Serial.println("Couldnt find sensor");
    return;
  }

  float hpa = baro.getPressure();
  altimetroPressure = hpa / 100;    //convert pascals to hectopascals
    
  altimetroMeters = baro.getAltitude();
    
  altimetroTempC = baro.getTemperature();

}


void readDht() {

  //pinMode(32,INPUT);
  
 dht.begin();

//delay(200);

   dhtHumidity = dht.readHumidity();

   dhtTempC = dht.readTemperature();

   dhtHeatIndex = dht.computeHeatIndex(dhtTempC, dhtHumidity, false);
  
 while (isnan(dhtHumidity) || isnan(dhtTempC) || isnan(dhtHeatIndex)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    delay(2000);
     dhtHumidity = dht.readHumidity();
   dhtTempC = dht.readTemperature();
   dhtHeatIndex = dht.computeHeatIndex(dhtTempC, dhtHumidity, false);
    
    //return;

    
  }

  double a = 17.271;
  double b = 237.7;
  double temp = (a * dhtTempC) / (b + dhtTempC) + log(dhtHumidity * 0.01);
   dhtDewPoint = (b * temp) / (a - temp);
   dhtDewPoint = 0;
  
}


void readLux(){

  if (tsl.begin()) 
  {
    Serial.println(F("Found a TSL2591 sensor"));
  } 
  else 
  {
    Serial.println(F("No sensor found ... check your wiring?"));
    while (1);
  }
  
  /* Configure the sensor */
  configureSensor();

delay(200);//200

  // simpleRead(); 
  advancedRead();
 //  unifiedSensorAPIRead();
  
}


void configureSensor(void)
{
  // You can change the gain on the fly, to adapt to brighter/dimmer light situations
  tsl.setGain(TSL2591_GAIN_LOW);    // 1x gain (bright light)
  //tsl.setGain(TSL2591_GAIN_MED);      // 25x gain
  //tsl.setGain(TSL2591_GAIN_HIGH);   // 428x gain
  
  // Changing the integration time gives you a longer time over which to sense light
  // longer timelines are slower, but are good in very low light situtations!
  tsl.setTiming(TSL2591_INTEGRATIONTIME_100MS);  // shortest integration time (bright light)
  //tsl.setTiming(TSL2591_INTEGRATIONTIME_200MS);
  //tsl.setTiming(TSL2591_INTEGRATIONTIME_300MS);
  // tsl.setTiming(TSL2591_INTEGRATIONTIME_400MS);
  // tsl.setTiming(TSL2591_INTEGRATIONTIME_500MS);
  // tsl.setTiming(TSL2591_INTEGRATIONTIME_600MS);  // longest integration time (dim light)

  tsl2591Gain_t gain = tsl.getGain();
 
}


void advancedRead(void)
{
  // More advanced data read example. Read 32 bits with top 16 bits IR, bottom 16 bits full spectrum
  // That way you can do whatever math and comparisons you want!
  uint32_t lum = tsl.getFullLuminosity();
  uint16_t ir, full;
  ir = lum >> 16;
  full = lum & 0xFFFF;
  Serial.print(F("[ ")); Serial.print(millis()); Serial.print(F(" ms ] "));
  Serial.print(F("IR: ")); Serial.print(ir);  Serial.print(F("  "));
  Serial.print(F("Full: ")); Serial.print(full); Serial.print(F("  "));
  Serial.print(F("Visible: ")); Serial.print(full - ir); Serial.print(F("  "));
  Serial.print(F("Lux: ")); Serial.println(tsl.calculateLux(full, ir), 6);
  luxIr = ir;
  luxFull = full;
  luxVisible = full-ir;
  lux = tsl.calculateLux(full, ir);
}

void readBattery(){

   float VBAT = (126.0f/100.0f) * 3.30f * float(analogRead(33)) / 4096.0f;  // LiPo battery
    Serial.print("Battery Voltage = "); Serial.print(VBAT, 2); Serial.println(" V");   
    
/*analogSetCycles(8);
analogSetSamples(1); 
analogSetClockDiv(1); 
analogSetAttenuation(ADC_11db);
analogSetPinAttenuation(4,ADC_11db);
*/  
 float ana = analogRead(33);//4
//34
//35
  float batPercent = map(VBAT, 2.8f, 4.2f, 0, 100);

Serial.println("analog value : ");
Serial.println(ana);

Serial.println("batery perccentage : ");
Serial.println(batPercent);

   //bat = batPercent;
   bat = VBAT;
}
