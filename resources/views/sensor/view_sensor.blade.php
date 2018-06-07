@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$sensor->id}} </div>
                 @if(is_null($sensor->nome))
       
                @else
                    <p><b>Nome:</b>
                    {{$sensor->nome}}</p>
                @endif
                @if(is_null($sensor->tipo))
       
                @else
                    <p><b>Tipo:</b>
                    {{$sensor->tipoToStr()}}</p>
                @endif
                @if(is_null($sensor->leitura))
       
                @else
                    <p><b>Leitura:</b>
                    {{$sensor->leitura}}</p>
                @endif
                @if(is_null($sensor->configurado))
       
                @else
                    <p><b>Configurado:</b>
                    {{$sensor->ConfiguradoToStr()}}</p>
                @endif



            </div>
        </div>
    </div>
</div>
@endsection
