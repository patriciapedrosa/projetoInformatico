@extends('layouts.app')

@section('content')
<div class="app flex-row align-items-center">
    <div class="app-body">
        <main class="main">
<div class="container">
  <div class="card-body">
    <div class="col-md-8">
      <div class="card-group">
        <div class="col-md-2"></div>
        <div class="card p-4">

              <h1>Register</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input id="name" placeholder="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>




                            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
                                <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>



<div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>

                                <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required>
                            </div>



                                <button type="submit" class="btn btn-block btn-success">
                                    {{ __('Register') }}
                                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</main>
</div>
</div>
@endsection
