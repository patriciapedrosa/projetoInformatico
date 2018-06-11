@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Controlador
                    </h3></div>
<div class="container">
    <form action="{{route('sensor.store', $sensor->controlador_id)}}" method="post" class="form-group" enctype="multipart/form-data">
        <div class="form-group">
            <b><label for="nome">Nome</label></b>
            <input
            type="text" class="form-control"
            name="nome" id="nome"
            placeholder="nome" value="{{old('nome', $sensor->nome)}}" />
        </div>

<div class="form-group">
    <p><b><label for="name">Tipo</label> </b></p>
        <input type="radio" name="tipo" value="0">Analogico<br>
        <input type="radio" name="tipo" value="1">Digital
</div>


        <div class="form-group">
            <b><label for="leitura">Leitura</label></b>
            <input
            type="text" class="form-control"
            name="leitura" id="leitura"
            placeholder="leitura" value="{{old('leitura', $sensor->leitura)}}" />
        </div>


        <div class="form-group">
            <p><b><label for="controlador_id">Controlador_id</label></b></p>
            <input type="radio" name="controlador_id" value="{{$controlador->id}}" checked> {{$controlador->id}}<br>
        </div>


                
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
            <a class="btn btn-default" href="{{ route('sensor.list', $controlador->id) }}" id="cancel">Cancel</a>
        </div>
        {{csrf_field()}}
    </form>
</div>
@endsection