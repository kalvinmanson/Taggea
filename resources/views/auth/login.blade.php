@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 text-center">
        <img src="/img/logo00.png" class="img-fluid">
      </div>
      <div class="col-md-6 text-center">
        <p class="roboto py-5 mt-5 px-md-5 fz-15 text-secondary">
          <strong>Ingresa con tu cuenta y envíale un correo</strong><br>
           a la persona con la que quieres ir a devorar churros al <strong>2 x 1</strong>, y demuéstrale que eres todo un Churrísimo.
        </p>
        <a href="/login/facebook" class="btn btn-lg btn-fb"><i class="fab fa-facebook"></i> Ingresa con Facebook</a> &nbsp;
        <a href="/login/google" class="btn btn-lg btn-fb btn-out-line-danger"><i class="fab fa-google"></i> Ingresa con Google</a>
        <p class="py-3">
          <a data-fancybox data-src="#hidden-content" href="javascript:;">¿Eres churrero?</a>
        </p>
      </div>
    </div>
</div>


<div style="display: none;" id="hidden-content">
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
          </button>

          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
        </div>
    </form>
</div>
@endsection
