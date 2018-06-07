@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Sensor
                    </h3></div>
{{$controlador->id}}
<div class="container">
    <form action="{{route('sensor.store', $sensor, $controlador)}}" method="post" class="form-group" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input
            type="text" class="form-control"
            name="nome" id="nome"
            placeholder="nome" value="{{old('nome', $sensor->nome)}}" />
        </div>

<div class="form-group">
    <p><label for="name">Tipo</label> </p>
        <input type="radio" name="tipo" value="0">Analogico<br>
        <input type="radio" name="tipo" value="1">Digital
</div>


        <div class="form-group">
            <label for="leitura">Leitura</label>
            <input
            type="text" class="form-control"
            name="leitura" id="leitura"
            placeholder="leitura" value="{{old('leitura', $sensor->leitura)}}" />
        </div>

        <div class="form-group">
            <label for="controlador_id">Controlador_id</label>
            <input
            type="text" class="form-control"
            name="controlador_id" id="controlador_id"
            placeholder="controlador_id" value="{{old('controlador_id', $controlador->id)}}" />
        </div>


                
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
            <a class="btn btn-default" href="{{ route('controlador.list') }}" id="cancel">Cancel</a>
        </div>
        {{csrf_field()}}
    </form>
</div>
@endsection