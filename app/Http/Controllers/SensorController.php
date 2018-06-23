<?php

namespace App\Http\Controllers;

use App\Thing;
use App\Pin;
use App\Sensor;
use App\SensorType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\SensorResource;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($thing_id)
    {
        $thing = Thing::findOrFail($thing_id);
        $sensors = Sensor::where('thing_id', $thing_id)->orderBy('id')->paginate(10);
        //$pins = Pin::where('sensor_id', $sensor->id);
        return view('sensor.list', compact('sensors', 'thing'));
    }

    public function showSensor($thing_id, $sensor_id)
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
    public function create($thing_id)
    {
        $thing = Thing::findOrFail($thing_id);
        $sensor = new Sensor();
        return view('sensor.add', compact('sensor', 'thing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $thing_id)
    {
        $sensor = new Sensor();
        $sensor->fill($request->all());
        $sensor->configDate = Carbon::now();
        $thing = Thing::findOrFail($thing_id);
        $sensor->thing_id = $thing->id;
        $sensor->save();

        return redirect()
            ->route('sensor.list', compact('sensor', 'thing_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit($thing_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        //$sensor_types = SensorType::all();
        return view('sensor.edit', compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $thing_id, $sensor_id)
    {
        Sensor::findOrFail($sensor_id)->update([
            'nome' => $request->input('nome'),
            'tipo' => $request->input('tipo'),
            'grandeza' => $request->input('grandeza'),
            'inativo' => $request->input('inativo'),
            'pin' => $request->input('pin'),
            'configDate' => Carbon::now(),
        ]);

        return redirect()
            ->route('sensor.list', compact('thing_id'))
            ->with('success', 'Sensor configurado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($thing_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $sensor->delete();
        return redirect()
            ->route('sensor.list', compact('thing_id'))
            ->with('success', 'Sensor apagado com sucesso');
    }


    public function getSensores(string $mac){
        
        $thing = Thing::where('mac', $mac)->first();
        $sensor = Sensor::where('thing_id', $thing->id)->get();

        return SensorResource::collection($sensor);   
        
    }

    /*public function getData(string $mac_address)
    {
        $thing = Thing::where('mac', $mac_address)->first();
        $sensor = Sensor::where('thing_id', $thing->id)->get();
        dd($sensor->id);
        //$date = Carbon::parse($sensor->configDate)->format('YmdHis');
        return $date;
    }*/




}
