<?php

namespace App\Http\Controllers;

use App\Thing;
use App\Pin;
use App\Sensor;
use App\SensorType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\SensorResource;
use App\Http\Requests\UpdateSensorRequest;

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
        return view('sensor.list', compact('sensors', 'thing'));
    }

    public function showSensor($thing_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        
        return view('sensor.view_sensor', compact('sensor'));
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
        $validated = $this->validate($request,[
            'nome' => 'required|string|max:50',
            'tipo' => 'required|between:0,1',
            'grandeza' => 'required|string|max:50',
            'inativo' => 'required|between:0,1',
            'pin' => 'required|between:0,2'
        ]);
        $sensor->fill($validated);
        $sensor->configDate = Carbon::now();
        $thing = Thing::findOrFail($thing_id);
        $sensor->thing_id = $thing->id;
        $sensor->save();

        return redirect()
            ->route('sensor.list', compact('sensor', 'thing_id'))->with('success', 'Sensor adicionado com sucesso');
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
        return view('sensor.edit', compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSensorRequest $request, $thing_id, $sensor_id)
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
            ->with('success', 'Sensor editado com sucesso');
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
            ->with('success', 'Sensor removido com sucesso');
    }


    public function getSensores(string $mac){
        
        $thing = Thing::where('mac', $mac)->first();
        if($thing == null){
            return response()->json(['error' => 'Invalid mac adress']);
        }
        return SensorResource::collection($thing->sensores);   
        
    }
    //Obter data dos sensores de um thing
    public function getData(string $mac_address)
    {
        $thing = Thing::where('mac', $mac_address)->with('sensores')->first();
        if($thing == null){
            return response()->json(['error' => 'Invalid mac adress']);
        }
        $array = [];
        foreach ($thing->sensores as $sensor) {
            $obj = [];
            $obj['id'] = $sensor->id;
            $obj['data'] = Carbon::parse($sensor->configDate)->format('YmdHis');
            $array[] = $obj;
        }
        return response()->json(['data' => $array]);
    }
}
