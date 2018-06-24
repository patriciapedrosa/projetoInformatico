<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;
use App\Http\Resources\RedeResource;

class RedeControllerAPI extends Controller
{

    public function getInformation(string $mac_address)
    {

        $thing = Thing::where('mac', $mac_address)->first();
        return new RedeResource($thing);
    }
}

