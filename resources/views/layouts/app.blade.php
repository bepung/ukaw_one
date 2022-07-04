<!doctype html>

@guest
@if((Route::currentRouteName() != 'home') || Route::currentRouteName() != 'login'))
  <script> window.location ="{{ route("welcome")}}";</script>
@endif
@endguest

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<!-- striped table -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- nav2 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body onLoad="endLoad();">
    <div>
      <nav class="navbar navbar-expand-custom navbar-mainbg navbar-fixed-top" style="padding-top:0px;padding-bottom:0px;">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="">
        </a>

      <h5 style="color:#fff">{{ config('app.name', 'HOME') }}</h5>
      <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>
                    Login</a>
              </li>
              @else
              <li class="nav-item @if(Route::currentRouteName() == 'allDataMahasiswa' or Route::currentRouteName() == 'readDataMahasiswa') active @endif">
                  <a class="nav-link" href="{{ route('allDataMahasiswa')}}">
                    <!-- <i class="fas fa-tachometer-alt"> -->
                    </i>Data Mahasiswa</a>
              </li>
              <li class="nav-item @if(Route::currentRouteName() == 'home') active @endif">
                  <a class="nav-link" href="{{ route("home")}}">
                    <!-- <i class="far fa-address-book"></i> -->
                    Data Berkas</a>
              </li>
              <li class="nav-item @if(Route::currentRouteName() == 'berkasUnggah.index') active @endif">
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
              @endguest
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
    @guest
    @else
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
    </form>
    @endguest
    <nav class="navbar fixed-bottom navbar-light bg-light mt-0 pt-0 mb-0 pb-0">
  <span class="navbar-text small">
  </span>
  <span class="navbar-text small">
    @php
        $thn1 = 2022;
        $thn = date('Y');
        echo $thn1 . (($thn1 != $thn)? '-' . $thn : '') ;
    @endphp
        &nbsp; &copy; bepung.net</span>
</nav>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $("#tooltipex").tooltip({
  });
});
</script>
