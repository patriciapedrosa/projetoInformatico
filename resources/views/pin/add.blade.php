@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Pin
                    </h3></div>
<div class="container">
    <form action="{{route('pin.store', $pin->sensor_id)}}" method="post" class="form-group" enctype="multipart/form-data">


        <div class="form-group">
            <b><label for="numero_pin">Numero</label></b>
            <input
            type="ñumber" class="form-control"
            name="numero_pin" id="numero_pin"
            placeholder="numero_pin" value="{{old('numero_pin', $pin->numero_pin)}}" />
        </div>

        <div class="form-group">
            <p><b><label for="sensor_id">Sensor_id</label></b></p>
            <input type="radio" name="sensor_id" value="{{$sensor->id}}" checked> {{$sensor->id}}<br>
        </div>


                
        <div class="form-group">
            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
            <a class="btn btn-default" href="{{ route('sensor.showSensor', $sensor) }}" id="cancel">Cancel</a>
        </div>
        {{csrf_field()}}
    </form>
</div>
@endsection