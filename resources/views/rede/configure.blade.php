@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Rede
                    </h3>
                </div>
                <div class="container">
                    <form action="{{route('rede.edit')}}" method="post" class="form-group" enctype="multipart/form-data">
                        <div class="form-group">
                            <b>
                                <label for="nome">IP</label>
                            </b>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder="ip" value="{{old('ip', $rede->ip)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Netmask</label>
                            </b>
                            <input type="text" class="form-control" name="netmask" id="netmask" placeholder="netmask" value="{{old('netmask', $rede->netmask)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Gateway</label>
                            </b>
                            <input type="text" class="form-control" name="gateway" id="gateway" placeholder="gateway" value="{{old('gateway', $rede->gateway)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">DNS</label>
                            </b>
                            <input type="text" class="form-control" name="dns" id="dns" placeholder="dns" value="{{old('dns', $rede->dns)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">SSID</label>
                            </b>
                            <input type="text" class="form-control" name="ssid" id="ssid" placeholder="ssid" value="{{old('ssid', $rede->ssid)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Password</label>
                            </b>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password" value="{{old('password', $rede->password)}}"
                            />
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('rede.show') }}" id="cancel">Cancel</a>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                @endsection