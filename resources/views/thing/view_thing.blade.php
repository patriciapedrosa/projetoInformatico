
@extends('layouts.app') @section('content')
<main class="main">
<div class="container">
    <div class="card-body">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{$thing->mac}}
                    </h3>
                </div>


<div class="card-body">
                @if(is_null($thing->mac)) @else
                <p>
                    <b>MAC:</b>
                    {{$thing->mac}}</p>
                @endif 
                @if(is_null($thing->ip)) @else
                <p>
                    <b>IP:</b>
                    {{$thing->ip}}</p>
                @endif 
                
                @if(is_null($thing->netmask)) @else
                <p>
                    <b>Netmask:</b>
                    {{$thing->netmask}}</p>
                @endif 
                @if(is_null($thing->gateway)) @else
                <p>
                    <b>Gateway:</b>
                    {{$thing->gateway}}</p>
                @endif 
                @if(is_null($thing->dns)) @else
                <p>
                    <b>DNS:</b>
                    {{$thing->dns}}</p>
                @endif 

                @if(is_null($thing->ssid)) @else
                <p>
                    <b>SSID:</b>
                    {{$thing->ssid}}</p>
                @endif 
                @if(is_null($thing->password)) @else
                <p>
                    <b>Password:</b>
                    {{$thing->password}}</p>
                @endif 


                <div class="row justify-content-center">
                    <a class="btn btn-primary" style="float:right" href="{{route('thing.list')}}"> Voltar </a>
                </div>
</div>
</div>
        </div>
    </div>
</div>
</main>

@endsection