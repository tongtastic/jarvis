<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cooling', function () {
    return view( 'cooling' );
});

Route::get('/security', function () {
    return view( 'security' );
});

Route::group(['prefix' => 'heating'], function () {

  Route::get('/', function () {
      return view( 'heating' );
  });

  Route::get('/boost-heating', 'heatingController@boostHeating');

  Route::get('/boost-hotwater', 'heatingController@boostHotWater');

});

Route::group(['prefix' => 'lighting'], function () {

  Route::get('/', function () {
      return view( 'lighting' );
  });

  Route::get('/control/{arg}', 'LightingController@relayControl', ['id', 'arg']);

  Route::get('/status/{arg}', 'LightingController@relayStatus', ['id', 'arg']);

});
