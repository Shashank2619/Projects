#define BUZZER 7
#define GREEN 6
#include <Wire.h>
#include <Adafruit_MLX90614.h>

Adafruit_MLX90614 mlx = Adafruit_MLX90614();

void setup() {
  Serial.begin(9600);

  pinMode(BUZZER,OUTPUT);

  pinMode(GREEN,OUTPUT);

  Serial.println("Adafruit MLX90614 test");  

  mlx.begin();  

}

void loop() {
  float temp_c=mlx.readObjectTempC();
  float temp_f=mlx.readObjectTempF();

  if(temp_c>39){
    digitalWrite(BUZZER,HIGH);
    digitalWrite(GREEN,LOW);
  }
  else{
    digitalWrite(BUZZER,LOW);
    digitalWrite(GREEN,HIGH);
  }

  Serial.print("*C Object = "); 
  Serial.print(mlx.readObjectTempC());
  Serial.print("    *F Object = "); 
  Serial.print(mlx.readObjectTempF());

  Serial.println();
  delay(1000);
}