<?php

namespace App\Http\Controllers;

use App\Rede;
use Illuminate\Http\Request;

class RedeControllerAPI extends Controller
{

    public function getInformation(Request $request)
    {
        $rede = Rede::first();
        return response()->json($rede);

    }
}
