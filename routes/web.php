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

Route::get('/heating', function () {
    return view( 'heating' );
});

Route::get('/heating/boost-heating', 'heatingController@boostHeating');

Route::get('/heating/boost-hotwater', 'heatingController@boostHotWater');

Route::get('/lighting', function () {
    return view( 'lighting' );
});

Route::get('/lighting/{id}', 'LightingController@toggle');
