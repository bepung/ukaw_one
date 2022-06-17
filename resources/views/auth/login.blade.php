<!DOCTYPE html>
<html lang="en">
<head>
    <title>Masuk</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login_style/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/login_style/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/login_style/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_style/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-25 p-b-20">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
          <span class="login100-form-title p-b-5">
						<img src="{{ asset('img/logo.png') }}" width="250px" alt="Logo"/>
					</span>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100 {{ $errors->has('email') || $errors->has('username') ? 'is-invalid' : '' }}"
                           type="text"
                           id="username"
                           name="username"
                           placeholder="Username"
                           value="{{ old('email') ?: old('username') }}"
                           autocomplete="off">
                </div>
                <!-- <br> -->
                @if ($errors->has('email') || $errors->has('username'))
                    <span class="h6 text-danger">
							<strong>{{ $errors->first('email') ?: $errors->first('username') }}</strong>
						</span>
                @endif

                <div class="wrap-input100 validate-input m-t-5" data-validate="Enter password">
                    <input id="password"
                           class="input100 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           type="password"
                           name="password"
                           placeholder="Kata Sandi"
                           autocomplete="current-password">
                </div>
                <br>
                @if ($errors->has('password'))
                    <span class="h6 text-danger">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
                @endif

                <div class="container-login100-form-btn m-t-10">
                    <button class="login100-form-btn" type="submit">
                        Masuk
                    </button>
                </div>
            </form>
<?php /*
            <form class="login100-form validate-form">

                <ul class="login-more p-t-10">
                    <li class="m-b-8">
							<span class="txt1">
								Lupa
							</span>

                        <a href="{{ route('password.request') }}" class="txt2">
                            kata sandi?
                        </a>
                    </li>
                </ul>
            </form>
            */
            ?>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{ asset('js/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('js/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/main.js"></script>

</body>
</html>
