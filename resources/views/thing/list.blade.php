@extends('layouts.app') @section('content')


<main class="main">
    <div class="container">
        <div class="card-body">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3><img src="{{ asset('img/iot3.png')}}" height="40" width="40"></img> Things
                            <a class="btn btn-xs btn-success" style="float:right" href="{{ route('thing.create')}}">Configurar Things</a>
                        </h3>
                    </div>
                    @if (count($things))
                    @if(session('success'))
                    @include('partials.success')
                    @endif
                    <table class="table table-striped">


                        <thead>
                            <tr>
                                <th>MAC</th>
                                <th>IP</th>
                                <th>Gateway</th>
                                <th>SSID</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        @foreach ($things as $thing)
                        <tr>

                            <td>
                                {{$thing->mac}}
                            </td>

                            <td>
                                {{$thing->ip}}
                            </td>
                            <td>
                                {{$thing->gateway}}
                            </td>
                            <td>
                                {{$thing->ssid}}
                            </td>
                            
                            <td>
                                <a class="btn btn-info" href="{{ route('thing.showthing', $thing) }}">Ver Thing</a>

                                <a class="btn btn-info" href="{{route('sensor.list', $thing->id)}}">Ver Sensores</a>
                                
                                <a class="btn btn-success" href="{{ route('thing.edit',$thing->id) }}">Editar</a>
                                
                                <a><form action="{{ route('thing.delete',$thing) }}" method="POST" accept-charset="utf-8">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-xs btn-danger">Remover</button>
                                </form> </a>

                            </td>
                            

                        </tr>
                        @endforeach

                    </table>
                    @else
                    <div class="card-body">

                        <h2>Não foram encontrados things</h2>
                    </div>
                    @endif 
                    <div class="row justify-content-center">
                        <div class="pagination" align="middle"> {{$things->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection