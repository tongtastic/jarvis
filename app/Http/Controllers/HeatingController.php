<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HeatingController extends Controller
{

    protected $username;

    protected $password;

    protected $caller;

    protected $client;

    protected $url;

    protected $headers;

    protected $sessionId;

    /**
     * Construct.
     *
     */
    public function __construct()
    {

      $this->headers = [
        'Content-Type' => 'application/vnd.alertme.zoo-6.1+json',
        'Accept' => 'application/vnd.alertme.zoo-6.1+json',
        'X-Omnia-Client' => 'Hive Web Dashboard'
      ];

      $this->url = env('HIVE_URL', null);

      $this->username = env('HIVE_USERNAME', null);

      $this->password = env('HIVE_PASSWORD', null);

      $this->caller = 'WEB';

      $this->sessionId = null;

    }

    /**
     * Login.
     *
     * @return Response
     */
    public function login()
    {

      $client = new Client();

      $url = $this->url.'/auth/sessions';

      $args = [
        'headers' => $this->headers,
        'json' => [
          'sessions' => [
            [
              'username' => $this->username,
              'password' => $this->password,
              'caller' => $this->caller
            ]
          ]
        ]
      ];

      $request = $client->request(
        'POST',
        $url,
        $args
      );

      $response = $request->getBody()->getContents();

      $response = json_decode( $response );

      if(isset($response->sessions[0]->sessionId)) {

        return $response->sessions[0]->sessionId;

      }  else {

        return false;

      }


      /*
      {
          "sessions": [{
              "username": "{{username}}",
              "password": "{{password}}",
              "caller": "WEB"
          }]
      }
      */

    }

    /**
     * Get devices.
     *
     * @return Response
     */
    public function getDevices()
    {

      if( null !== ( $sessionId = $this->login() ) ) {

        $url = $this->url.'/nodes';

        $client = new Client();

        $this->headers['X-Omnia-Access-Token'] = $sessionId;

        $args = [
          'headers' => $this->headers
        ];

        $request = $client->request(
          'GET',
          $url,
          $args
        );

        $response = $request->getBody()->getContents();

        $response = json_decode( $response );

        return $response->nodes[0]->id;

      } else {

        return false;

      }

    }

    /**
     * Boost heating.
     *
     * @return Response
     */
    public function boostHeating()
    {

      if( null !== ( $sessionId = $this->login() ) ) {

        if( null !== ( $device = $this->getDevices() ) ) {

          $url = $this->url.'/nodes/'.$device;

          $client = new Client();

          $this->headers['X-Omnia-Access-Token'] = $sessionId;

          $args = [
            'headers' => $this->headers,
            'json' => [
              'nodes' => [
                [
                  'attributes' => [
                    'activeHeatCoolMode' => [
                      'targetValue' => 'BOOST'
                    ],
                    'activeScheduleLock' => [
                      'targetValue' => 30
                    ],
                    'targetHeatTemperature' => [
                      'targetValue' => 22
                    ]
                  ]
                ]
              ]
            ]
          ];

          $request = $client->request(
            'PUT',
            $url,
            $args
          );

          $response = $request->getBody()->getContents();

          $response = json_decode( $response );

        } else {

          echo 'No device found';

        }

        /*
        {
            "nodes": [{
                "attributes": {
                    "activeHeatCoolMode": {
                        "targetValue": "BOOST"
                    },
                    "scheduleLockDuration": {
                        "targetValue": 30
                    },
                    "targetHeatTemperature": {
                        "targetValue": 22
                    }
                }
            }]
        }
        */

      } else {

        echo 'No Session ID';

      }

    }

    /**
     * Boost hot water.
     *
     * @return Response
     */
    public function boostHotWater()
    {

      /*
      {
          "nodes": [{
              "attributes": {
                  "activeHeatCoolMode": {
                      "targetValue": "BOOST"
                  },
                  "scheduleLockDuration": {
                      "targetValue": 30
                  },
                  "targetHeatTemperature": {
                      "targetValue": 22
                  }
              }
          }]
      }
      */
    }
}
