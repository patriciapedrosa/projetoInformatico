<?php

namespace App\Http\Controllers;

use App\Controlador;
use App\Mac;
use App\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ControladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sensor $sensors, Controlador $controlador)
    {

        $controladores = Controlador::orderBy('id')->paginate(10);

        return view('controlador.list', compact('controladores'));
    }

    public function create(Request $request)
    {
        $controlador = new Controlador();
        $macs = Mac::where('configured', '=', 0)->get();
        return view('controlador.add', compact('controlador', 'macs'));
    }
    public function store(Request $request)
    {
        $controlador = new Controlador();
        $controlador->fill($request->all());

        $mac = Mac::where('mac_adress', '=', $request->mac)->first();
        if ($mac == null || $mac->configured) {
            return redirect()
                ->route('controlador.create');
        }
        $mac->markAsConfigured();
        $controlador->created_at = Carbon::now();
        $controlador->save();

        return redirect()
            ->route('controlador.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Controlador  $controlador
     * @return \Illuminate\Http\Response
     */
    public function showControlador(Controlador $controlador)
    {
        return view('controlador.view_controlador', compact('controlador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Controlador  $controlador
     * @return \Illuminate\Http\Response
     */
    public function edit(Controlador $controlador)
    {
        return view('controlador.edit', compact('controlador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Controlador  $controlador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Controlador $controlador, $id)
    {
        Controlador::where('id', $id)->update([

            'updated_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('controlador.list')
            ->with('success', 'Controlador configurado com sucesso');
    }

}
