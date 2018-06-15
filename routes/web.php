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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/controladores');
    } else {
        return view('auth.login');
    }
});

Route::middleware('auth')->get('/acercaDe', 'HomeController@acercaDe')->name('acercade');

//add

//Sensores
Route::middleware('auth')->get('controladores/{controlador_id}/sensores/create', 'SensorController@create')->name('sensor.create');
Route::middleware('auth')->post('controladores/{controlador_id}/sensores/create', 'SensorController@store')->name('sensor.store');
Route::middleware('auth')->get('controladores/{controlador_id}/sensores/', 'SensorController@index')->name('sensor.list');
Route::middleware('auth')->get('/controladores/{controlador_id}/sensores/{sensor_id}', 'SensorController@showSensor')->name('sensor.show');
Route::middleware('auth')->get('/controladores/{controlador_id}/sensor/{sensor_id}/edit', 'SensorController@edit')->name('sensor.edit');
Route::middleware('auth')->post('/controladores/{controlador_id}/sensor/{sensor_id}/edit', 'SensorController@update')->name('sensor.update');
Route::middleware('auth')->delete('controladores/{controlador_id}/sensores/{sensor}/delete', 'SensorController@destroy')->name('sensor.delete');

//Controladores
Route::middleware('auth')->get('/controladores', 'ControladorController@index')->name('controlador.list');
Route::middleware('auth')->get('/naoConfig', 'ControladorController@naoConfig')->name('controlador.listnaoConfig');
Route::middleware('auth')->get('/controladores/create', 'ControladorController@create')->name('controlador.create');
Route::middleware('auth')->post('/controladores/store', 'ControladorController@store')->name('controlador.store');
Route::middleware('auth')->get('/controladores/{controlador}', 'ControladorController@showControlador')->name('controlador.showControlador');

//Pins
Route::middleware('auth')->get('/controladores/{controlador_id}/sensores/{sensor_id}/pins/create', 'PinController@create')->name('pin.create');
Route::middleware('auth')->post('/controladores/{controlador_id}/sensores/{sensor_id}/pins/create', 'PinController@store')->name('pin.store');

Route::middleware('auth')->get('/rede', 'RedeController@show')->name('rede.show');
Route::middleware('auth')->get('/rede/configurar', 'RedeController@configure')->name('rede.configure');
Route::middleware('auth')->post('/rede/edit', 'RedeController@edit')->name('rede.edit');
