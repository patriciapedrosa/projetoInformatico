@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{$controlador->mac}}</div>
                @if(is_null($controlador->mac)) @else
                <p>
                    <b>MAC:</b>
                    {{$controlador->mac}}</p>
                @endif 
                @if(is_null($controlador->ip)) @else
                <p>
                    <b>IP:</b>
                    {{$controlador->ip}}</p>
                @endif 
                
                @if(is_null($controlador->netmask)) @else
                <p>
                    <b>Netmask:</b>
                    {{$controlador->netmask}}</p>
                @endif 
                @if(is_null($controlador->gateway)) @else
                <p>
                    <b>Gateway:</b>
                    {{$controlador->gateway}}</p>
                @endif 
                @if(is_null($controlador->dns)) @else
                <p>
                    <b>DNS:</b>
                    {{$controlador->dns}}</p>
                @endif 

                @if(is_null($controlador->ssid)) @else
                <p>
                    <b>SSID:</b>
                    {{$controlador->ssid}}</p>
                @endif 
                @if(is_null($controlador->password)) @else
                <p>
                    <b>Password:</b>
                    {{$controlador->password}}</p>
                @endif 


                <div class="row justify-content-center">
                    <a class="btn btn-primary" style="float:right" href="{{route('controlador.list')}}"> Voltar </a>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection