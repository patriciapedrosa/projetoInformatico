<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;

class RedeControllerAPI extends Controller
{

    public function getInformation(int $id)
    {
    	return new RedeResource(Thing::find($id));
        /*$controlador = Controlador::first();
        return response()->json($controlador);*/
    }
}
