@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$sensor->nome}} </div>
                @if(is_null($sensor->nome)) {{"N/A"}} @else
                <p>
                    <b>Nome:</b>
                    {{$sensor->nome}}</p>

                @endif
                <p>
                    <b>Tipo:</b>
                    @if(is_null($sensor->tipo)) {{"N/A"}} @else{{$sensor->tipo}}@endif
                </p>

                <p>
                    <b>Leitura:</b>
                    @if(is_null($sensor->tipo_leitura)) {{"N/A"}} @else{{$sensor->tipo_leitura}} @endif
                </p>
                <p>
                    <b>Pins:</b>
                    @foreach ($pins as $pin) {{$pin->numero_pin}} @endforeach
                    <a class="btn btn-xs btn-success" href="{{ route('pin.create', [$sensor->thing_id, $sensor->id])}}">Adicionar Pin</a>
                </p>


                <div class="row justify-content-center">
                    <a class="btn btn-primary" style="float:right" href="{{route('sensor.list', $sensor->thing_id)}}"> Voltar </a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection