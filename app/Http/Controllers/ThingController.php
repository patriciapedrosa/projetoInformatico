<?php

namespace App\Http\Controllers;

use App\Thing;
use App\Mac;
use App\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sensor $sensors, Thing $thing)
    {

        $things = Thing::orderBy('id')->paginate(10);

        return view('thing.list', compact('things'));
    }

    public function naoConfig()
    {

        $macs = MAC::orderBy('id')->where('configured','0')->paginate(10);

        return view('thing.listNaoConfig', compact('macs'));
    }

    public function create(Request $request)
    {
        $thing = new Thing();
        $macs = Mac::where('configured', '=', 0)->get();
        return view('thing.add', compact('thing', 'macs'));
    }
    public function store(Request $request)
    {
        $thing = new Thing();
        $thing->fill($request->all());

        $mac = Mac::where('mac_adress', '=', $request->mac)->first();
        if ($mac == null || $mac->configured) {
            return redirect()
                ->route('thing.create');
        }
        $mac->markAsConfigured();
        $thing->created_at = Carbon::now();
        $thing->save();

        return redirect()
            ->route('thing.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thing  $Thing
     * @return \Illuminate\Http\Response
     */
    public function showThing(Thing $thing)
    {
        return view('thing.view_thing', compact('thing'));
    }

    public function destroy($thing_id)
    {  

        $thing = Thing::findOrFail($thing_id);
        $thing->delete();
        $mac = Mac::where('mac_adress',$thing->mac);
        $mac->delete();
        
        return redirect()
        ->route('thing.list')
        ->with('success', 'Thing deleted successfully');
    }




}
