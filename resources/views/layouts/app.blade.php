<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HOME') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_spinner.js') }}" defer></script>
    <script src="{{ asset('js/_navbar.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_spinner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_navbar.css') }}" rel="stylesheet">
    <!-- unggah -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"> -->
<!-- dropdown user -->
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>
<body onLoad="endLoad();" style="background-color=#fff;" >
    <div>
      <nav class="navbar navbar-expand-custom navbar-mainbg">
      <a class="navbar-brand navbar-logo" href="#">Universitas Kristen Artha Wacana</a>
      <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
              <li class="nav-item @if(Route::currentROuteName() == 'berkasImport.show') active @endif">
                  <a class="nav-link" href="{{ route("berkasImport.show", "0" )}}">
                    <!-- <i class="fas fa-tachometer-alt"> -->
                    </i>Data Mahasiswa</a>
              </li>
              <li class="nav-item @if(Route::currentROuteName() == 'home') active @endif">
                  <a class="nav-link" href="{{ route("home")}}">
                    <!-- <i class="far fa-address-book"></i> -->
                    Data Berkas</a>
              </li>
              <li class="nav-item @if(Route::currentROuteName() == 'berkasUnggah.index') active @endif">
                  <a class="nav-link" href="{{ route("berkasUnggah.index") }}">
                    <!-- <i class="far fa-clone"></i> -->
                    Unggah Berkas</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                   <!-- <i class="far fa-calendar-alt"></i> -->
              </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0);">
                    <!-- <i class="far fa-copy"></i> -->
                    UKAW</a>
              </li>
          </ul>
      </div>
    </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
    </form>
</body>
</html>
