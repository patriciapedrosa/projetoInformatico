@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Controlador
                    </h3>
                </div>
                <div class="container">
                    <form action="{{route('controlador.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                        <div class="form-group">
                            <b>
                                <label for="nome">MAC Adress</label>
                            </b>
                            <select class="form-control" name="mac">
                                @foreach($macs as $mac)
                                <option value="{{$mac->mac_adress}}">{{$mac->mac_adress}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="leitura">Descriçao</label>
                            </b>
                            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{old('descricao', $controlador->descricao)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">IP</label>
                            </b>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder="ip" value="{{old('ip', $controlador->ip)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Netmask</label>
                            </b>
                            <input type="text" class="form-control" name="netmask" id="netmask" placeholder="netmask" value="{{old('netmask', $controlador->netmask)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Gateway</label>
                            </b>
                            <input type="text" class="form-control" name="gateway" id="gateway" placeholder="gateway" value="{{old('gateway', $controlador->gateway)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">DNS</label>
                            </b>
                            <input type="text" class="form-control" name="dns" id="dns" placeholder="dns" value="{{old('dns', $controlador->dns)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">SSID</label>
                            </b>
                            <input type="text" class="form-control" name="ssid" id="ssid" placeholder="ssid" value="{{old('ssid', $controlador->ssid)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Password</label>
                            </b>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password" value="{{old('password', $controlador->password)}}"
                            />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('controlador.list', $controlador->id) }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @endsection