<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LightingController extends Controller
{

    protected $deviceId;

    protected $particleUrl;

    protected $particleToken;

    /**
     * Turn lights on with Particle API.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct()
    {

      $this->deviceId = env('PARTICLE_LIGHTS_ID', null);

      $this->particleUrl = env('PARTICLE_URL', NULL);

      $this->particleToken = env('PARTICLE_TOKEN', null);

    }

    /**
     * Trigger Relay.
     *
     * @return Response
     */
    public function triggerRelay( $arg )
    {

      $client = new Client();

      $url = $this->particleUrl.'/'.$this->deviceId.'/lights';

      $args = [
        'form_params' => [
          'access_token' => $this->particleToken,
          'args' => $arg
        ]
      ];

      $request = $client->request(
        'POST',
        $url,
        $args
      );

      $response = $request->getBody()->getContents();

      return $response;

    }

}

/*

sample code flashed to particle device

// -----------------------------------
// Controlling Lights with J.A.R.V.I.S.
// -----------------------------------

int relay1 = D3;
int relay2 = D4;
int relay3 = D5;
int relay4 = D6;

void setup()
{

   pinMode(relay1, OUTPUT);
   pinMode(relay2, OUTPUT);
   pinMode(relay3, OUTPUT);
   pinMode(relay4, OUTPUT);

   Particle.function("lights",controlLights);

   digitalWrite(relay1, LOW);
   digitalWrite(relay2, LOW);
   digitalWrite(relay3, LOW);
   digitalWrite(relay4, LOW);

}

void loop()
{
}

int controlLights(String command) {

    if (command=="1on") {
        digitalWrite(relay1,HIGH);
        return 1;
    }
    else if (command=="2on") {
        digitalWrite(relay2,HIGH);
        return 1;
    }
    else if (command=="3on") {
        digitalWrite(relay3,HIGH);
        return 1;
    }
    else if (command=="4on") {
        digitalWrite(relay4,HIGH);
        return 1;
    }
    else if (command=="1off") {
        digitalWrite(relay1,LOW);
        return 0;
    }
    else if (command=="2off") {
        digitalWrite(relay2,LOW);
        return 0;
    }
    else if (command=="3off") {
        digitalWrite(relay3,LOW);
        return 0;
    }
    else if (command=="4off") {
        digitalWrite(relay4,LOW);
        return 0;
    }
    else {
        return -1;
    }
}

*/
