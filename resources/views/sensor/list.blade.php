@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Sensores
                        
                    <a class="btn btn-xs btn-success" style="float:right" href="{{ route('sensor.create', $controlador)}}">Adicionar Sensor</a>
                    </h3></div>

                @if (count($sensors)) 
                <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Leitura</th>
                                <th>Pins</th>
                                <th>Acoes</th>
                            </tr>
                        </thead>
                        @foreach ($sensors as $sensor)
                        <tr>
                            
                            <td>
                                {{$sensor->nome}}
                            </td>
                            <td>
                                {{$sensor->tipoToStr()}}
                            </td>
                            <td>
                                {{$sensor->leitura}}
                            </td>
                            <td>
                                @foreach ($pins as $pin)
                                {{$pin->id}}
                                @endforeach
                            </td>
                            
                            <td>

                                @can('update', $sensor)
                                     <a class="btn btn-success" href="{{route('sensor.edit', $sensor->id)}}">Configurar</a>
                                     @endcan
                                <a class="btn btn-info" href="{{route('sensor.showSensor', $sensor)}}">Ver sensor</a>
                            </td>

                        </tr>
                        @endforeach

                    </table>
                    @else 
                    <h2>Não foram encontrados sensores</h2>
                    @endif
                    <div class="row justify-content-center">
                    <div class="pagination" align="middle" > {{$sensors->links()}}</div>
                    </div>
            </div>

        </div>
    </div>

</div>
@endsection
