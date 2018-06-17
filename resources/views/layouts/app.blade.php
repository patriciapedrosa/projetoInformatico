<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Plataforma') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
     <header class="app-header navbar">

      <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="{{ asset('img/iotLogo.png')}}" height="50" width="50"></img>
                </a>
               
                    <ul class="nav navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li  class="nav-item px-3"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li class="nav-item px-3"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <div class="nav-item px-3">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-lock"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </div>
                        @endguest
                    </ul>



    </header>
    @guest
                            {{-- expr --}}
    @else
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('thing.list') }}" >
                <img src="{{ asset('img/iot5.png')}}" height="30" width="30"></img>
              Things Configuradas</a>
            </li>

             <li class="nav-item"><a class="nav-link" href="{{ route('thing.listnaoConfig') }}" >
             <img src="{{ asset('img/iot5.png')}}" height="30" width="30"></img>
         Things Detetadas</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{ route('acercade') }} " >
                            <i class="fas fa-info-circle" style="font-size:25px;"></i> Acerca De</a></li>
        </ul>
    </nav>
</div>


@endguest

        
            @yield('content')
</div>
</body>
</html>
