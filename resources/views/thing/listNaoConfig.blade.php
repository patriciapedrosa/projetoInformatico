@extends('layouts.app') @section('content')
<main class="main">
<div class="container">
    <div class="card-body">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3><img src="{{ asset('img/iot3.png')}}" height="40" width="40"></img>Lista de things não configuradas
                    </h3>
                </div>
                @if (count($macs))
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>MAC</th>
                            
                        </tr>
                    </thead>
                    @foreach ($macs as $mac)
                    <tr>
                        <td>
                            {{$mac->mac_adress}}
                            <a class="btn btn-xs btn-success" style="float:right" href="{{ route('mac.config', $mac)}}">+</a>
                        </td> 

                    </tr>
                    @endforeach

                </table>

                @else
                <div class="card-body">

                <h2>Não foram encontrados MACS</h2>
            </div>
                @endif
                <div class="row justify-content-center">
                    <div class="pagination" align="middle"> {{$macs->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection