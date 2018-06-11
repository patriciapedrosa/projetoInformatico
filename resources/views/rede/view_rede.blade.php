@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Rede
                        
                    <a class="btn btn-xs btn-success" style="float:right" href="{{ route('rede.create')}}">Configurar Rede</a>
                    </h3>
            </div>


@foreach ($redes as $rede)
                
                    <p><b>IP:</b>
                    {{$rede->ip}}</p>
                
                    <p><b>Netmask:</b>
                    {{$rede->netmask}}</p>
               
                    <p><b>Gateway:</b>
                    {{$rede->gateway}}</p>
                
                    <p><b>DNS:</b>
                    {{$rede->dns}}</p>
                
                    <p><b>SSID:</b>
                    {{$rede->ssid}}</p>
                
                    <p><b>Password:</b>
                    {{$rede->password}}</p>
                
@endforeach

            </div>
       
        </div>
    </div>
</div>

@endsection
