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

Route::post('/things', 'ThingController@create');
Route::post('/loginControladorManager', 'LoginControllerAPI@loginControladorManager');

Route::middleware('auth:api')->post('/registerMac', 'MacControllerAPI@add');
Route::middleware('auth:api')->get('/networkConfiguration/{id}', 'RedeControllerAPI@getInformation');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
