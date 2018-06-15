@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Things
                        <a class="btn btn-xs btn-success" style="float:right" href="{{ route('thing.create')}}">Configurar Things</a>
                    </h3>
                </div>
                @if (count($things))
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>MAC</th>
                            <th>Configurado</th>
                            <th>Açoes</th>
                        </tr>
                    </thead>
                    @foreach ($things as $thing)
                    <tr>

                        <td>
                            {{$thing->mac}}
                        </td>

                        <td>
                            {{$thing->ConfiguradoToStr()}}
                        </td>
                        
                        <td>
                            
                            <a class="btn btn-info" href="{{ route('thing.showthing', $thing) }}">Ver Things</a>

                            <a class="btn btn-info" href="{{route('sensor.list', $thing->id)}}">Ver sensores</a>
                            

                        </td>
                        

                    </tr>
                    @endforeach

                </table>
                @else

                <h2>Não foram encontrados things</h2>
                @endif
                <div class="row justify-content-center">
                    <div class="pagination" align="middle"> {{$things->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection