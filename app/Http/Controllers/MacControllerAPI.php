<?php

namespace App\Http\Controllers;

use App\Mac;
use Illuminate\Http\Request;

class MacControllerAPI extends Controller
{

    public function add(Request $request)
    {

        $mac_adress = $request->input('mac_adress');
        $mac_count = Mac::where('mac_adress', '=', $mac_adress)->count();
        if ($mac_count == 0) {
            $mac = Mac::create(['mac_adress' => $mac_adress, 'configured' => 0]);
        }
        return response()->json(['message' => 'sucesso'], 200);
    }


}
