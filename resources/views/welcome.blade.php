<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.: UKAW :.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/_login.css') }}" rel="stylesheet">
        <style>
        .dropdown-menu{
          background-color: #C5D1DA;
          border: 1px solid #69899F;
        }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin:0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href=""></a>
                        <button type="button" class="btn btn-info btn-lg" >{{ Auth::user()->name }}</button>
                        <!-- onclick="window.location='{{ url("/home")}}'" -->
                        <button type="button" class="btn btn-danger dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only"></span>
                        </button>

                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item"  href="{{ route('home')}}">Home</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                </form>
                          </li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register_xxx'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
               <img src="{{ asset('img/logo.png') }}" width="250px" alt="Logo"/>
                <div class="title m-b-md">
                    Universitas Kristen Artha Wacana
                </div>

                <div class="links">
                    <a href="https://ukaw.ac.id/univ/">UKAW.AC.ID</a>
                    <a href="https://ukaw.eakademik.id/ukaw/login.jsp">E-Akademik</a>
                    <a href="http://repository.ukaw.ac.id:88/repos/index.php">Repositori</a>
                    <a href="https://ukaw.ac.id/univ/pengumuman/">Pengumuman</a>
                </div>
            </div>
        </div>
    </body>
</html>
