@extends('layouts.app')

@section('content')
<div class="app flex-row align-items-center">
    <div class="app-body">
        <main class="main">
  <div class="row">
    <div class="col-md-8">
      <div class="card-group">
        <div class="col-md-2"></div>
        <div class="card p-4">
          <div class="card-body">
            <h1>Login</h1>
            <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                </div>
                <input id="email" placeholder="E-Mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                </div>
                <div class="input-group mb-4">
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

                <div class="row">
                <div class="col-6">
                <div class="checkbox">
                    <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-6">
    <button type="submit" class="btn btn-primary px-4">
        {{ __('Login') }}
    </button>


</div>
<div class="col-6 text-right">
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
</div>
</div>
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
