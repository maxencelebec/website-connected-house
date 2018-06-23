#include <Servo.h>
 
#define LED 34
 
/// Define pins for multiplexor (The light on the board)
#define pin0 11
#define pin1 12
#define pin2 13
const int d = 0; // for delaying the pins
 
 
bool ledVal[] = {false,false,false,false,false,false};
int count=0;
 
/// Variable for alarm
float sinVal;
int toneVal;
 
 
/// Variable for the
 
char temp[1];
 
 
 
 
 
/// Defining the pins for the IRsensor
 
int RIRsensorPin = 24;    // Pin for the right IR Sensor
float RIRsensorValue = 0;  // variable to store the value coming from the sensor
int RIRdistance = 0; // distance for the right sensor
bool RIR;
 
int LIRsensorPin = 25;    // Pin for the right IR Sensor
float LIRsensorValue = 0;  // variable to store the value coming from the sensor
int LIRdistance = 0; // distance for the right sensor
bool LIR;
 
////
 
/// Defining the pins for the temps sensor
 
int TEMP1sensorPin = PE_3;    // Pin for the 1 Temp sensor
float TEMP1sensorValue = 0;  // variable to store the value coming from the sensor
bool TEMP1;
 
int TEMP2sensorPin = PB_5;    // Pin for the 2 Temp sensor
float TEMP2sensorValue = 0;  // variable to store the value coming from the sensor
bool TEMP2;
 
int TEMP3sensorPin = PE_0;    // Pin for the 3 Temp sensor
float TEMP3sensorValue = 0;  // variable to store the value coming from the sensor
bool TEMP3;
 
int TEMP4sensorPin = PD_0;    // Pin for the 4 Temp sensor
float TEMP4sensorValue = 0;  // variable to store the value coming from the sensor
bool TEMP4;
 
 
 
/// Defining the pins for the temps sensor
 
int L1sensorPin = PE_1;    // Pin for the 1 L sensor
float L1sensorValue = 0;  // variable to store the value coming from the sensor
bool L1;
int L2sensorPin = 5;//PE_4;    // Pin for the 2 L sensor
float L2sensorValue = 0;  // variable to store the value coming from the sensor
bool L2;
int L3sensorPin = PD_3;    // Pin for the 3 L sensor
float L3sensorValue = 0;  // variable to store the value coming from the sensor
bool L3;
int L4sensorPin = PE_5;    // Pin for the 4 L sensor
float L4sensorValue = 0;  // variable to store the value coming from the sensor
bool L4;

 
Servo myvolet;
 
void setup() {
 
  // Configuration des pins pour le multiplexeurs
  pinMode(pin0, OUTPUT);
  pinMode(pin1, OUTPUT);
  pinMode(pin2, OUTPUT);
  Serial.begin(9600);
  Serial1.begin(9600);
  
 
  myvolet.attach(PF_3); // pin 39 ceci est pour le volet.
 
  //turnLedOn(7); // alume la 7 `eme LED ( qui n'existe pas et donc 'ca 'eteint les leds)
}
 
void loop()
{
  //readIRsensor();
  
  turnLed(500000); // turn on the leds for 2 seconds

  capteur_push(RIR,0x0001,'1'); // proximité gauche 
  capteur_push(LIR,0x0002,'1'); // proximité droit

  turnLed(500000); // turn on the leds for 2 seconds
  
  capteur_push(TEMP1,0x0001,'3'); // température 1
  capteur_push(TEMP2,0x0002,'3'); // température 2
  capteur_push(TEMP3,0x0003,'3'); // température 3
  capteur_push(TEMP4,0x0004,'3'); // température 2

  turnLed(500000); // turn on the leds for 2 seconds

  capteur_push(L1,0x0001,'5'); // Lumière 1
  capteur_push(L2,0x0002,'5'); // Lumière 2 
  capteur_push(L3,0x0003,'5'); // Lumière 3 
  capteur_push(L4,0x0004,'5'); // Lumière 4 
  
}

void capteur_push(bool STATE,char NUM,char TYP){

  if(Serial1.available()<=0){

      if(STATE){
        switch(TYP){
    
          case 1:
            sendTrame(readIRsensor(NUM),NUM, '1');
            break;
          case 3:
            sendTrame(readTempSensor(NUM),NUM, '2');
            break;
          case 5:
            sendTrame(readLSensor(NUM),NUM, '3');
            break;
          
        }
        
      }

  }
  else{
    scoutTrame();
  }

  
}
 /// switch all the leds on for xx cycles
void turnLed(int x){
  int i=0;
  while(i<=x){
    for (count=0;count<6;count++) {
      if(ledVal[count]==true){
        turnLedOn(count);
        Serial.println(count);
      }
      else if (ledVal[count]==false){
        //turnLedOn(7);
      }
    }

    i++;
    if(Serial1.available()>0){
      i=x+1; /// si on recoit une info on break directement la loop pour la lire. 
    }
  }

}
 
 
void turnLedOn(int outputPin)
// turns on output at pin 'outputPin'
{
  switch (outputPin)
  {
    case 0:
      digitalWrite(pin0, LOW);
      digitalWrite(pin1, LOW);
      digitalWrite(pin2, LOW);
      break;
    case 1:
      digitalWrite(pin0, HIGH);
      digitalWrite(pin1, LOW);
      digitalWrite(pin2, LOW);
      break;
    case 2:
      digitalWrite(pin0, LOW);
      digitalWrite(pin1, HIGH);
      digitalWrite(pin2, LOW);
      break;
    case 3:
      digitalWrite(pin0, HIGH);
      digitalWrite(pin1, HIGH);
      digitalWrite(pin2, LOW);
      break;
    case 4:
      digitalWrite(pin0, LOW);
      digitalWrite(pin1, LOW);
      digitalWrite(pin2, HIGH);
      break;
    case 5:
      digitalWrite(pin0, HIGH);
      digitalWrite(pin1, LOW);
      digitalWrite(pin2, HIGH);
      break;
    case 6:
      digitalWrite(pin0, LOW);
      digitalWrite(pin1, HIGH);
      digitalWrite(pin2, HIGH);
      break;
    case 7:
      digitalWrite(pin0, HIGH);
      digitalWrite(pin1, HIGH);
      digitalWrite(pin2, HIGH);
      break;
  }
}
 
 
/*
   Emulation de lumière d'alarme, elles clignotent à la suite
 
*/
void emulateAlarm(int dd)
{
  for (int i = 0; i < 8; i++)
  {
    turnLedOn(i);
    delay(dd);
  }
  for (int i = 7; i >= 0; --i)
  {
    turnLedOn(i);
    delay(dd);
  }
}

void allLedOn(int dd)
// scans all outputs on to emulate all being on at once for 'dd' cycles
{
  for (int j = 0; j < dd; j++)
  {
    for (int i = 0; i < 8; i++)
    {
      turnLedOn(i);
    }
  }
 
}
 
/*
   Read the value for the IR sensor, and store it in the corresponding variables
   0 == left sensor, 1== right sensor
*/
float readIRsensor(char i) {
 
  if (i == 0x0002) {
    RIRsensorValue = analogRead(RIRsensorPin) * 0.0008056640625;
    RIRdistance = 13 * pow(RIRsensorValue, -1);
 
    if (RIRdistance < 7) {
      alarm();
    }
    else {
      analogWrite(PB_4, 0);
    }
    return RIRdistance;
 
  }
 
  else if(i == 0x0001) {
 
    LIRsensorValue = analogRead(LIRsensorPin) * 0.0008056640625;
    LIRdistance = 13 * pow(LIRsensorValue, -1);
    
 
    return LIRdistance;
  }
}

float readTempSensor(char i){
 
 
  if (i == 0x0001) {
    TEMP1sensorValue = analogRead(TEMP1sensorPin);
    return TEMP1sensorValue;
  }
  else if (i == 0x0002) {
    TEMP2sensorValue = analogRead(TEMP2sensorPin);
    return TEMP2sensorValue;
  }
  else if (i == 0x0003) {
    TEMP3sensorValue = analogRead(TEMP3sensorPin);
    return TEMP3sensorValue;
  }
  else if (i == 0x0004) {
    TEMP4sensorValue = analogRead(TEMP4sensorPin);
    return TEMP4sensorValue;
  }
  
  
}

float readLSensor(char i){
 
 
  if (i == 0x0001) {
    L1sensorValue = analogRead(L1sensorPin);
    return L1sensorValue;
  }
  else if (i == 0x0002) {
    L2sensorValue = analogRead(L2sensorPin);
    return L2sensorValue;
  }
  else if (i == 0x0003) {
    L3sensorValue = analogRead(L3sensorPin);
    return L3sensorValue;
  }
  else if (i == 0x0004) {
    L4sensorValue = analogRead(L4sensorPin);
    return L4sensorValue;
  }
  
  
}
 
 
void alarm() {
 
  emulateAlarm(25);
 
  allLedOn(5000);
  for (int x = 0; x < 180; x++) {
    // convert degrees to radians then obtain sin value
    sinVal = (sin(x * (3.1412 / 180)));
    // generate a frequency from the sin value
    toneVal = 2000 + (int(sinVal * 1000));

analogWrite(PB_4, toneVal);
  }
}
 
char toText(char text) {
  if (text < 10) {
    text += 0x30;
  }
  else {
    text += 55;
  }
  return text;
}
////////////////////////////////////////////////////////////////////////////////////////////////////Scout
void scoutTrame(){
  char trame[18];
  
  for(int i=0; i<19; i++) {
    trame[i] = Serial1.read();    // Lecture de la trame
  }
  //Serial.print(trame);    //Copie dans la console
if(trame[5]=='2'){    //Si requête en lecture (l'objet reçoit l'info)
    String TYP = String(trame[6]);
 
    
    String NUM = String(trame[7]) + String(trame[8]);
    
    String VAL = String(trame[9]) + String(trame[10]) + String(trame[11]) + String(trame[12]);
 
    if(Serial1.read()<=0){Serial1.println(trame);}
    action(TYP, NUM, VAL);
    
  }
}
 
void action(String TYP, String NUM, String VAL) {
 
  // Actions neccessaire pour les leds
  int x = NUM.toInt();
  if(TYP=="3" && VAL=="0001") {
    
    ledVal[x]=true;
    Serial.println("imhere");
    //LOW
  }
  else if(TYP=="3" && VAL=="0000") {
    //HIGH
    ledVal[x]=false;
  }
 
 ///// 
 
 
 
}



void sendTrame(int VAL, int NUM, char TYP) {
  char trame[18];
 
  if(VAL==NULL){VAL=0;}
  
  // Ecriture de la trame (sans la checksum)
  trame[0] = '1';    //TRA
  trame[1] = '0';    //OBJ
  trame[2] = '0';   //OBJ
  trame[3] = '9';   //OBJ
  trame[4] = 'D';    //OBJ
  trame[5] = '1';    //REQ
  trame[6] = TYP;    //TYP
  trame[7] = toText((NUM >> 4) & 0x0f); 
  trame[8] = toText(NUM & 0x0f);
  trame[9] = toText((VAL >> 12) & 0x0f);// temp2[0];  
  trame[10] = toText((VAL >> 8) & 0x0f);//temp2[1];
  trame[11] = toText((VAL >> 4) & 0x0f);// temp2[2];
  trame[12] = toText(VAL & 0x0f);// temp2[3];
  trame[13] = '0';  //TIM
  trame[14] = 'E';  //TIM
  trame[15] = 'C';  //TIM
  trame[16] = 'R';  //TIM
 
 
  // Calcul de la checksum avec les valeurs présentes 
/*  int CHK = 00;
  CHK = checksum(trame);*/
  
  /* Insertion checksum dans la trame */
  trame[17] = '0';  //CHK
  trame[18] = '3';  //CHK
  
  /* Système d'envoie de la trame */
  int pot = analogRead(28);
  if(pot>1000) {
    for(int i=0; i<19; i++) {
      Serial1.print(trame[i]);  //Envoie à la passerelle
      Serial.print(trame[i]);
    }
  }
  else {
    Serial.println("Switch(pot) is OFF!");
  }
  Serial.println();
}
 
/*

      case '0':
        res += 0x30;
        break;
      case '1':
        res += 0x31;
        break;
      case '2':
        res += 0x32;
        break;
      case '3':
        res += 0x33;
        break;
      case '4':
        res += 0x34;
        break;
      case '5':
        res += 0x35;
        break;
      case '6':
        res += 0x36;
        break;
      case '7':
        res += 0x37;
        break;
      case '8':
        res += 0x38;
        break;
      case '9':
        res += 0x39;
        break;
      case 'A':
        res += 0x40;
        break;
      case 'B':
        res += 0x41;
        break;
      case 'C':
        res += 0x42;
        break;
      case 'D':
        res += 0x43;
        break;
      case 'E':
        res += 0x44;
        break;
      case 'F':
        res += 0x45;
        break;
    }
  }
  return res;
}
*/
