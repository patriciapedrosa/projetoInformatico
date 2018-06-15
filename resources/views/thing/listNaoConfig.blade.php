@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Lista de things não configuradas
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
                        </td> 
                    </tr>
                    @endforeach

                </table>
                @else

                <h2>Não foram encontrados MACS</h2>
                @endif
                <div class="row justify-content-center">
                    <div class="pagination" align="middle"> {{$macs->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection