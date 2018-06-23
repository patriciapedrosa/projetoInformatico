<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/things', 'ThingController@create');
Route::post('/loginControladorManager', 'LoginControllerAPI@loginControladorManager');


Route::post('/registerMac', 'MacControllerAPI@add'); //funciona
Route::get('/networkConfiguration/{id}', 'RedeControllerAPI@getInformation'); //funciona

Route::get('/getsensores/{id}', 'SensorController@getSensores');

Route::get('/getThingConfigDate/{id}', 'ThingController@getData');
Route::get('/getSensorConfigDate/{id}', 'SensorController@getData');



