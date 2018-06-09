<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Controlador;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSensorRequest;
use App\Http\Requests\StoreSensorRequest;
use App\Pin;
use Carbon\Carbon;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Controlador $controlador)
    {
        $sensors = Sensor::where('controlador_id', $controlador->id)->orderBy('id')->paginate(10);
        $pins = Pin::all();

        return view('sensor.list',compact('sensors', 'pins','controlador'));
    }

    public function showSensor(Sensor $sensor)
    {
        $pin = Pin::where('sensor_id', $sensor->id);
        return view('sensor.view_sensor', compact('sensor', 'pin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Controlador $controlador)
    {
        $sensor = new Sensor();
        $pins = new Pin();
        return view('sensor.add', compact('sensor', 'pins', 'controlador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->controlador_id);
        $sensor = new Sensor();
        $sensor->fill($request->all());
        $sensor->created_at = Carbon::now();
        $sensor->save();

        Controlador::where('id',$request->controlador_id)->update([
            'configurado'=>1
            ]); 

        return redirect()
        ->route('sensor.showSensor',compact('sensor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        return view('sensor.edit', compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
     Sensor::where('id',$id)->update([
            'nome' => $request->input('nome'), 
            'tipo' => $request->input('tipo'),
            'leitura' => $request->input('leitura'),
            'updated_at' => Carbon::now()
        ]);

     return redirect()
     ->route('sensor.list')
     ->with('success', 'Sensor configurado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();
        return redirect()
        ->route('sensor.list')
        ->with('success', 'Sensor deleted successfully');
    }
}
