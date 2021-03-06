@extends('layouts.app') @section('content')

<main class="main">
<div class="container">
    <div class="card-body">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Editar sensor
                    </h3>
                    
                </div>
                <div class="card-body">
                <div class="container">
                    @if(count($errors) > 0)
    @include('partials.errors')
@endif
                    <form action="{{route('sensor.update', [$sensor->thing_id, $sensor->id])}}" method="post" class="form-group" enctype="multipart/form-data">

                        @include('sensor.components.add-edit')

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('sensor.list', $sensor->thing_id) }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</main>
                @endsection