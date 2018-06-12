@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Controladores
                 <a class="btn btn-xs btn-success" style="float:right" href="{{ route('controlador.create')}}">Adicionar controlador</a>
                
            </h3></div>
                @if (count($controladores)) 
                <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>MAC</th>
                                <th>Configurado</th>
                                <th>Açoes</th>
                            </tr>
                        </thead>
                        @foreach ($controladores as $controlador)
                        <tr>
                            
                            <td>
                                {{$controlador->mac}}
                            </td>
                            
                            <td>
                                {{$controlador->ConfiguradoToStr()}}
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('controlador.showControlador', $controlador) }}">Ver Controlador</a>

                                @if ($controlador->isNaoConfigurado())
                                
                                     <a class="btn btn-success" href="{{route('sensor.list', $controlador->id)}}">Configurar</a>
                                     
                                     
                                @else
                                <a class="btn btn-info" href="{{route('sensor.list', $controlador->id)}}">Ver sensores</a>
                                
                                @endif

                            </td>

                        </tr>
                        @endforeach

                    </table>
                    @else 

                    <h2>Não foram encontrados controladores</h2>
                    @endif
                    <div class="row justify-content-center">
                    <div class="pagination" align="middle" > {{$controladores->links()}}</div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
