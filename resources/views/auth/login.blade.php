@extends('layouts.app')

@section('content')
<div class="login">
  <div class="login-triangle"></div>
  <h2 class="login-header">Log in</h2>

                    <form method="POST" action="{{ route('login') }}" class="login-container">
                        @csrf
                        <p><input type="text" id="username" placeholder="username" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </p>
                        @if ($errors->has('email') || $errors->has('username'))
                            <span class="h5 text-danger">
        							<strong>{{ $errors->first('email') ?: $errors->first('username') }}</strong>
        						</span>
                        @endif
                        <p><input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </p>
                        @if ($errors->has('password'))
                            <span class="h5 text-danger">
        							<strong>{{ $errors->first('password') }}</strong>
        						</span>
                        @endif
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                      <p><input type="submit" value="Log in"></p>
                    </form>
</div>
@endsection
