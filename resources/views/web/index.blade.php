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
          <div class="text-left d-block px-md-5">
            <div class="userMy roboto">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="float-right text-warning">
                Salir <i class="fas fa-power-off"></i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>

              <img src="{{ Auth::user()->avatar }}" class="float-left mr-2 mb-2" width="50"> {{ Auth::user()->name }}<br>
              <small>{{ Auth::user()->email }}</small>
            </div>
            <div class="clearfix"></div>
            <form method="POST" action="{{ route('invite') }}">
              @csrf
              <p class="fz-15 text-center py-2 roboto text-secondary">¿Con quién quieres devorar tus churros?</p>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white border border-warning"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control border border-warning" name="name" placeholder="Nombre" aria-label="Nombre" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white border border-warning"><i class="far fa-envelope-open"></i></span>
                    </div>
                    <input type="email" class="form-control border border-warning" name="email" placeholder="Email" aria-label="Email" required>
                  </div>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-link btn-secondary text-secondary">Enviar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      @if(Auth::user()->places->count() > 0)
        @include('partials.admin')
      @endif
      <h3 class="text-center text-secondary py-3 roboto">Mis taggeadas</h3>
      <div class="card-columns">
        @foreach(Auth::user()->invites as $invite)
          <a data-fancybox data-type="ajax" class="card" data-src="/code/{{ $invite->id }}" href="javascript:;">
            <div class="card-body text-secondary">
              @if($invite->user->avatar)
                <img src="{{ $invite->user->avatar }}" class="float-left mr-2 mb-2" width="50">
              @endif
              <strong>{{ $invite->user->name }}</strong> te ha invitado a un <strong>2x1</strong> en Churrisimo.
            </div>
          </a>
        @endforeach
        @foreach(Auth::user()->codes as $code)
          <a data-fancybox data-type="ajax" class="card" data-src="/code/{{ $code->id }}" href="javascript:;">
            <div class="card-body bg-warning text-white">
              @if($code->user->avatar)
                <img src="{{ $code->user->avatar }}" class="float-left mr-2 mb-2" width="50">
              @endif
              Has invitado a <strong>{{ $code->name }}</strong> para <strong>2x1</strong> en Churrisimo.
              @if(!$code->active)
                <br><small>Pero aun no ha visto tu invitación.</small>
              @endif
            </div>
          </a>
        @endforeach
      </div>
  </div>

  @if($autoCode)
    <div class="loadCode" data-code="{{ $autoCode->id }}"></div>
  @endif
@endsection
