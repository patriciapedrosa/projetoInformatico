<?php

namespace App\Http\Controllers;

use App\Rede;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RedeController extends Rede
{

    public function show()
    {
        $redes = Rede::orderBy('id');
        return view('rede.view_rede', compact('redes'));
    }


    public function create()
    {
        $rede = new Rede();
        return view('rede.add', compact('rede'));
    }

    public function store(Request $request)
    {
        $rede = new Rede();
        $rede->fill($request->all());
        $rede->created_at = Carbon::now();
        $rede->save();

        return redirect()
        ->route('rede.show',compact('rede'));
    }


    

   
    public function edit(Rede $rede)
    {
        return view('rede.edit',compact('rede'));
    }

   /*public function update(Request $request)
    {
     Rede::where('id',$id)->update([
            'ip' => $request->input('ip'), 
            'netmask' => $request->input('netmask'), 
            'gateway' => $request->input('gateway'), 
            'dns' => $request->input('dns'), 
            'ssid' => $request->input('ssid'), 
            'password' => $request->input('password'), 
            'updated_at' => Carbon::now()
        ]);

     return redirect()
     ->route('rede.view_rede')
     ->with('success', 'Rede configurada com sucesso');
    }
*/
}
