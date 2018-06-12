@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Sensor
                    </h3>
                </div>
                <div class="container">
                    <form action="{{route('sensor.store', $controlador->id)}}" method="post" class="form-group" enctype="multipart/form-data">
                        <div class="form-group">
                            <b>
                                <label for="nome">Nome</label>
                            </b>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="{{old('nome', $sensor->nome)}}" />
                        </div>

                        <div class="form-group">
                            <p>
                                <b>
                                    <label for="name">Tipo de Leitura</label>
                                </b>
                            </p>
                            @foreach($sensor_types as $type)
                            <input type="radio" name="tipo_leitura" value="{{$type->type}}"> {{$type->type}}
                            <br> @endforeach


                        </div>

                        <div class="form-group">
                            <p>
                                <b>
                                    <label for="name">Tipo</label>
                                </b>
                            </p>
                            <input type="radio" name="tipo" value="digital"> Digital
                            <br>
                            <input type="radio" name="tipo" value="analogico"> Analógico
                            <br>



                        </div>

                       


                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('sensor.list', $controlador->id) }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @endsection