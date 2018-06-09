@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{$controlador->ip}}</div>
                 @if(is_null($controlador->ip))
       
                @else
                    <p><b>IP:</b>
                    {{$controlador->ip}}</p>
                @endif
                @if(is_null($controlador->mac))
       
                @else
                    <p><b>MAC:</b>
                    {{$controlador->mac}}</p>
                @endif
                @if(is_null($controlador->ssid))
       
                @else
                    <p><b>SSID:</b>
                    {{$controlador->ssid}}</p>
                @endif
                @if(is_null($controlador->configurado))
       
                @else
                    <p><b>Configurado:</b>
                    {{$controlador->ConfiguradoToStr()}}</p>
                @endif


            </div>
        <a class="btn btn-primary" style="float:right" href="{{route('controlador.list')}}"> Voltar </a> 
        </div>
    </div>
</div>

@endsection
