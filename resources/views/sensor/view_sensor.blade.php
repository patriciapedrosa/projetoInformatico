@extends('layouts.app') @section('content')
<main class="main">
    <div class="container">
        <div class="card-body">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$sensor->nome}} </div>
                    <div class="card-body">
                        @if(is_null($sensor->nome)) {{"N/A"}} @else
                        <p>
                            <b>Nome:</b>
                            {{$sensor->nome}}</p>

                            @endif
                            <p>
                                <b>Tipo:</b>
                                @if(is_null($sensor->tipo)) {{"N/A"}} @else{{$sensor->tipoToStr()}}@endif
                            </p>

                            <p>
                                <b>Grandeza:</b>
                                @if(is_null($sensor->grandeza)) {{"N/A"}} @else{{$sensor->grandeza}} @endif
                            </p>
                            <p>
                                <b>Pin:</b>
                                @if(is_null($sensor->pin)) {{"N/A"}} @else{{$sensor->pin}} @endif
                            </p>

                            <p>
                                <b>Inativo:</b>
                                @if(is_null($sensor->inativo)) {{"N/A"}} @else{{$sensor->inativoToStr()}} @endif
                            </p>


                            <div class="row justify-content-center">
                                <a class="btn btn-primary" style="float:right" href="{{route('sensor.list', $sensor->thing_id)}}"> Voltar </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    @endsection

