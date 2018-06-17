@extends('layouts.app') @section('content')
<main class="main">
<div class="container">
    <div class="card-body">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Sensores

                        <a class="btn btn-xs btn-success" style="float:right" href="{{ route('sensor.create', $thing->id)}}">Adicionar Sensor</a>
                    </h3>
                </div>

                @if (count($sensors))
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Leitura</th>
                            <th>Acoes</th>
                        </tr>
                    </thead>
                    @foreach ($sensors as $sensor)
                    <tr>

                        <td>
                            {{$sensor->nome}}
                        </td>
                        <td>
                            {{$sensor->tipo}}
                        </td>
                        <td>
                            {{$sensor->tipo_leitura}}
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{route('sensor.show', [$thing->id,$sensor->id])}}">Ver</a>
                            <a class="btn btn-warning" href="{{route('sensor.edit', [$thing->id,$sensor->id])}}">Editar</a>
                            <form action="{{ route('sensor.delete', [$thing->id,$sensor]) }}" method="POST" accept-charset="utf-8">
                                {{method_field('delete')}} {{csrf_field()}}
                                <button type="submit" class="btn btn-xs btn-danger">Remover</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </table>
                @else
                <h2>Não foram encontrados sensores</h2>
                @endif
                <div class="row justify-content-center">
                    <div class="pagination" align="middle"> {{$sensors->links()}}</div>
                </div>
            </div>

        </div>
    </div>

</div>
</main>
@endsection