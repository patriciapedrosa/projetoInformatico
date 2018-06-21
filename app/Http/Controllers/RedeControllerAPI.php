<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;
use App\Http\Resources\RedeResource;

class RedeControllerAPI extends Controller
{

    public function getInformation(int $id)
    {
    	return new RedeResource(Thing::find($id));
    }

    
}
