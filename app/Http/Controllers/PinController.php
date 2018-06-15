<?php

namespace App\Http\Controllers;

use App\Pin;
use App\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sensor $sensor)
    {

        $pins = Pin::where('sensor_id', $sensor->id)->orderBy('id')->paginate(10);
        return view('sensor.list', compact('pins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($thing_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $pin = new Pin();
        return view('pin.add', compact('sensor', 'pin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $thing_id, $sensor_id)
    {
        $sensor = Sensor::findOrFail($sensor_id);
        $pin = new Pin();
        $pin->sensor_id = $sensor->id;
        $pin->fill($request->all());
        $pin->created_at = Carbon::now();
        $pin->save();

        return redirect()
            ->route('sensor.show', compact('thing_id', 'sensor_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function show(Pin $pin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function edit(Pin $pin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pin $pin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pin $pin)
    {
        //
    }
}
