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
    public function relayControl( $arg )
    {

      $client = new Client();

      $url = $this->particleUrl.'/'.$this->deviceId.'/control';

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

    /**
     * Get Relay Status.
     *
     * @return Response
     */
    public function relayStatus( $arg )
    {

      $client = new Client();

      $url = $this->particleUrl.'/'.$this->deviceId.'/status';

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

//This #include statement was automatically added by the Particle IDE.
#include "RelayShield/RelayShield.h"

// Create an instance of the RelayShield library, so we have something to talk to
RelayShield myRelays;

// Create prototypes of the Spark.functions we'll declare in setup()
int relay(String command);
int status(String command);

void setup() {
    //.begin() sets up a couple of things and is necessary to use the rest of the functions
    myRelays.begin();

    // Register Spark.functions and assign them names
    Particle.function("control", relay);
    Particle.function("status", status);
}

void loop() {
    // Nothing needed here, functions will just run when called
}

int relay(String command){
    // Ritual incantation to convert String into Int
    char inputStr[64];
    command.toCharArray(inputStr,64);
    int i = atoi(inputStr);

    // Turn the desired relay on and check for status
    if(i == 5) {
        myRelays.allOn();
    } else {
        if(myRelays.isOn(i)) {
            myRelays.off(i);
            return 0;
        } else {
            myRelays.on(i);
            return 1;
        }

    }

}

int status(String command) {
    // Ritual incantation to convert String into Int
    char inputStr[64];
    command.toCharArray(inputStr,64);
    int i = atoi(inputStr);

    // Check for status
    if(myRelays.isOn(i)) {
        return 1;
    } else {
        return 0;
    }

}

*/
