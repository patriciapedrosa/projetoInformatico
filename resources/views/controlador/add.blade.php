@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Controlador
                    </h3>
                </div>
                <div class="container">
                    <form action="{{route('controlador.store', $controlador->controlador_id)}}" method="post" class="form-group" enctype="multipart/form-data">
                        <div class="form-group">
                            <b>
                                <label for="nome">MAC Adress</label>
                            </b>
                            <select class="form-control" name="mac">
                                @foreach($macs as $mac)
                                <option value="{{$mac->mac_adress}}">{{$mac->mac_adress}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="leitura">Descriçao</label>
                            </b>
                            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{old('descricao', $controlador->descricao)}}"
                            />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('controlador.list', $controlador->id) }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @endsection