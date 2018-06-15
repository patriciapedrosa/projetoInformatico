<?php

namespace App\Http\Controllers;

use App\Rede;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RedeController extends Rede
{

    

    // public function edit(Rede $rede)
    // {
    //     return view('rede.edit', compact('rede'));
    // }

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
