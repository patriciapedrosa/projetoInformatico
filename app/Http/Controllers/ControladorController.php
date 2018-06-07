<?php

namespace App\Http\Controllers;

use App\Controlador;
use Illuminate\Http\Request;
use App\Sensor;

class ControladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controladores = Controlador::orderBy('id')->paginate(10);

        return view('controlador.list',compact('controladores'));
    }

    public function create(Request $request)
    {
        $controlador = new Controlador();
        $controlador->fill($request->all());
        $controlador->created_at = Carbon::now();
        $controlador->save();
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
        return view('controlador.edit',compact('controlador'));
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
         Controlador::where('id',$id)->update([

            'updated_at' => Carbon::now()
        ]);

        return redirect()
        ->route('controlador.list')
        ->with('success', 'Controlador configurado com sucesso');
    }

}
