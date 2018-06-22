@extends('layouts.app') @section('content')

<main class="main">
<div class="container">
    <div class="card-body">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Thing
                    </h3>
                </div>
                <div class="card-body">
                <div class="container">
                    <form action="{{route('thing.update', $thing->id)}}" method="post" class="form-group" enctype="multipart/form-data">
                        

                        

                        <div class="form-group">
                            <b>
                                <label for="nome">IP</label>
                            </b>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder="ip" value="{{old('ip', $thing->ip)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Netmask</label>
                            </b>
                            <input type="text" class="form-control" name="netmask" id="netmask" placeholder="netmask" value="{{old('netmask', $thing->netmask)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Gateway</label>
                            </b>
                            <input type="text" class="form-control" name="gateway" id="gateway" placeholder="gateway" value="{{old('gateway', $thing->gateway)}}"
                            />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">DNS</label>
                            </b>
                            <input type="text" class="form-control" name="dns" id="dns" placeholder="dns" value="{{old('dns', $thing->dns)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">SSID</label>
                            </b>
                            <input type="text" class="form-control" name="ssid" id="ssid" placeholder="ssid" value="{{old('ssid', $thing->ssid)}}" />
                        </div>

                        <div class="form-group">
                            <b>
                                <label for="nome">Password</label>
                            </b>
                            <input type="text" class="form-control" name="password" id="password" placeholder="password" value="{{old('password', $thing->password)}}"
                            />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="ok" name="ok">Save</button>
                            <a class="btn btn-default" href="{{ route('thing.list', $thing->id) }}" id="cancel">Cancel</a>
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