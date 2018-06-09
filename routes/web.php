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

/*Route::get('/', function () {
    return view('sensor.list');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
	if (Auth::check()) {
		return redirect('/controladores');
	} else {
		return view('auth.login');
	}
});

Route::get('/acercaDe', 'HomeController@acercaDe')->name('acercade');

//add
Route::get('/sensor/{controlador}/addSensor','SensorController@create')->name('sensor.create');
Route::post('/sensor/storeSensor','SensorController@store')->name('sensor.store');

//ver lista de sensores
Route::get('/sensores/{controlador}', 'SensorController@index')->name('sensor.list');
//ver um sensor
Route::get('/sensor/{sensor}', 'SensorController@showSensor')->name('sensor.showSensor');
//edit
Route::get('/sensor/{sensor}/edit', 'SensorController@edit')->name('sensor.edit');
Route::post('/sensor/{sensor}/edit', 'SensorController@update')->name('sensor.update');
//Route::get('/sensor/{sensor}','SensorController@showSensor')->name('sensor.view_sensor');


Route::get('/controladores', 'ControladorController@index')->name('controlador.list');
Route::get('/controladores/{controlador}', 'ControladorController@showControlador')->name('controlador.showControlador');
