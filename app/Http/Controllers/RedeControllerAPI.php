<?php

namespace App\Http\Controllers;

use App\Controlador;
use Illuminate\Http\Request;

class RedeControllerAPI extends Controller
{

    public function getInformation(int $id)
    {
    	return new RedeResource(Controlador::find($id));
        /*$controlador = Controlador::first();
        return response()->json($controlador);*/
    }
}
