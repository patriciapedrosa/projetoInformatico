<?php

namespace App\Http\Controllers;

use App\Controlador;
use App\Pin;
use App\Sensor;
use App\SensorType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($controlador_id)
    {
        $controlador = Controlador::findOrFail($controlador_id);
        $sensors = Sensor::where('controlador_id', $controlador_id)->orderBy('id')->paginate(10);
        //$pins = Pin::where('sensor_id', $sensor->id);
        return view('sensor.list', compact('sensors', 'controlador'));
    }

    public function showSensor($controlador_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $pins = Pin::where('sensor_id', $sensor_id)->get();
        //dd($pin->numero_pin);
        return view('sensor.view_sensor', compact('sensor', 'pins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($controlador_id)
    {
        $controlador = Controlador::findOrFail($controlador_id);
        $sensor = new Sensor();
        $sensor_types = SensorType::all();
        return view('sensor.add', compact('sensor', 'controlador', 'sensor_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $controlador_id)
    {
        //dd($request->controlador_id);
        $sensor = new Sensor();
        $sensor->fill($request->all());
        $sensor->created_at = Carbon::now();
        $controlador = Controlador::findOrFail($controlador_id);
        $sensor->controlador_id = $controlador->id;
        $sensor->save();

        return redirect()
            ->route('sensor.list', compact('sensor', 'controlador_id'));
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
    public function edit($controlador_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $sensor_types = SensorType::all();
        return view('sensor.edit', compact('sensor', 'sensor_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $controlador_id, $sensor_id)
    {
        Sensor::findOrFail($sensor_id)->update([
            'nome' => $request->input('nome'),
            'tipo' => $request->input('tipo'),
            'tipo_leitura' => $request->input('tipo_leitura'),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('sensor.list', compact('controlador_id'))
            ->with('success', 'Sensor configurado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($controlador_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $sensor->delete();
        return redirect()
            ->route('sensor.list', compact('controlador_id'))
            ->with('success', 'Sensor apagado com sucesso');
    }
}
