#include <WiFi.h>
#include <HTTPClient.h>
#include <UltrasonicSensor.h>
UltrasonicSensor ultra(13,14);
char ssid[] = "WiFidiElio";
char password[] = "Elio0000";
HTTPClient http[3];
int sveglia;
int luce;
int allarmValue;
boolean ctrl = false;
#define soundPin 4 //buzzer della sveglia
#define allarmPin 21 //buzzer dell'allarme
#define led1 18
#define led2 19
#define led3 23  //Dirgo Maribleno
void setup() {
  Serial.begin(115200);
            WiFi.disconnect(true);
            WiFi.begin(ssid, password);
            while(WiFi.status() != WL_CONNECTED) {
            delay(500);
            Serial.println("Connessione al WiFi...");
      }
       Serial.print("Connesso WiFi");
       Serial.println(ssid);
      pinMode(soundPin,OUTPUT);
      pinMode(led1,OUTPUT);
      pinMode(led2,OUTPUT);
      pinMode(led3,OUTPUT);
      int temperature = 20; //Setting ambient temperature
      ultra.setTemperature(temperature);
}

void loop() {
  getCombinationToTurnOn("192.168.172.174",80,"/esameIoT/getLuci.php");
  isActive("192.168.172.174",80,"/esameIoT/getAllarme.php");
  getDateFromDB("192.168.172.174",80,"/esameIoT/getSveglie.php");
  delay(5000);
}

//questo sottofunzione fa una request al db dove abbiamo salvato le sveglie e le salva nella coda
void getDateFromDB(String ipServer,int port,String subSet){// Indirizzo IP o nome del server che ospita lo script PHP getServer
 // Effettua la richiesta GET al server
  
  http[0].begin(ipServer,port,subSet);
  int httpResponseCode = http[0].GET();
  if (httpResponseCode == 200) {
    String payload = http[0].getString();
    if(payload.equals("Nessun dato presente nella tabella.")){Serial.println(payload);}
    else{
      sveglia=payload.toInt();
      Serial.println("Dati ottenuti dalla tabella del database:");
      Serial.print(sveglia);//ci stampa i secondi che mancano alla sveglia
      Serial.println(" s");
      if(sveglia<10){
        suonaSveglia(sveglia);
      }
    }
    
  } else {
    Serial.print("Errore nella richiesta GET. Codice di risposta: ");
    Serial.println(httpResponseCode);
  }
  // Rilascia la connessione e libera le risorse
  http[0].end(); 
}

//funzione per far suonare la sveglia
void suonaSveglia(int t){//questa è la funzione per spegnere la sveglia
  t*=1000;//converto il tempo in millisecondi
  delay(t);
  digitalWrite(soundPin,HIGH); 
  delay(5000);//la sveglia si spegne dopo 60s per velocità lo faccio suonare per 5s
  digitalWrite(soundPin,LOW);
}

void getCombinationToTurnOn(String ipServer,int port,String subSet){// Indirizzo IP o nome del server che ospita lo script PHP getServer
 // Effettua la richiesta GET al server
  
  http[1].begin(ipServer,port,subSet);
  int httpResponseCode=http[1].GET();
  if (httpResponseCode==200) {
    String payload=http[1].getString();
      luce=payload.toInt();
      Serial.println("Dati ottenuti dalla tabella del database:");
      Serial.println(luce);
      switch (luce) {
        case 1:
            digitalWrite(led1, HIGH);
            digitalWrite(led2, LOW);
            digitalWrite(led3, LOW);
            break;
        case 2:
            digitalWrite(led1, LOW);
            digitalWrite(led2, HIGH);
            digitalWrite(led3, LOW);
            break;
        case 3:
            digitalWrite(led1, HIGH);
            digitalWrite(led2, HIGH);
            digitalWrite(led3, LOW);
            break;
        case 4:
            digitalWrite(led1, LOW);
            digitalWrite(led2, LOW);
            digitalWrite(led3, HIGH);
            break;
        case 5:
            digitalWrite(led1, HIGH);
            digitalWrite(led2, LOW);
            digitalWrite(led3, HIGH);
            break;
        case 6:
            digitalWrite(led1, LOW);
            digitalWrite(led2, HIGH);
            digitalWrite(led3, HIGH);
            break;
        case 7:
            digitalWrite(led1, HIGH);
            digitalWrite(led2, HIGH);
            digitalWrite(led3, HIGH);
            break;
        default:
            digitalWrite(led1, LOW);
            digitalWrite(led2, LOW);
            digitalWrite(led3, LOW);
            break;
    }
    //nello SC: secondo uno schema logico accendiamo è spengnamo le luci
  } else {
    Serial.print("Errore nella richiesta GET. Codice di risposta: ");
    Serial.println(httpResponseCode);
  }
  // Rilascia la connessione e libera le risorse
  http[1].end();
}

void isActive(String ipServer,int port,String subSet){// Indirizzo IP o nome del server che ospita lo script PHP getServer
  // Effettua la richiesta GET al server
  
  http[2].begin(ipServer,port,subSet);
  int httpResponseCode=http[2].GET();
  if (httpResponseCode==200) {
    String payload=http[2].getString();
      allarmValue=payload.toInt();
      Serial.println("Dati ottenuti dalla tabella del database:");
      if(allarmValue==0){
        Serial.println("L'allarme è Spento");
        digitalWrite(soundPin,LOW);
        ctrl=false;
      }
      else{
        Serial.println("L'allarme è Attivo");
        int d=ultra.distanceInCentimeters();
        Serial.println(d);
        if(d<20){
          //ctrl=true;
          digitalWrite(soundPin,HIGH);
        }
      }
    
  } else {
    Serial.print("Errore nella richiesta GET. Codice di risposta: ");
    Serial.println(httpResponseCode);
  }
  // Rilascia la connessione e libera le risorse
  http[2].end();
}
