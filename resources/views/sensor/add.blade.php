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
                        @include('sensor.components.add-edit')
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('sensor.list', $controlador->id) }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @endsection