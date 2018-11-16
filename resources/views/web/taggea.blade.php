@extends('layouts.app')
@section('metas')
  <meta property="og:url"                content="https://http://taggea.tuchurrisimo.com/taggea/{{ $code->id }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="{{ $code->user->name }} te ha invitado" />
  <meta property="og:description"        content="Ingresa con tu cuenta, acepta la invitación a devorar churros al <strong>2 x 1</strong>, y demuéstrale que eres todo un Churrísimo." />
  <meta property="og:image"              content="https://http://taggea.tuchurrisimo.com/uploads/code-{{ $code->id }}.jpg" />
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 text-center">
      <img src="/img/logo00.png" class="img-fluid">
    </div>
    <div class="col-md-6 text-center">
      <div class="mt-5 roboto">
        <img src="{{ $code->user->avatar }}">
      </div>
      <p class="roboto py-5 px-md-5 fz-15 text-secondary">
        <strong>{{ $code->user->name }} te ha invitado</strong><br>
         Ingresa con tu cuenta, acepta la invitación a devorar churros al <strong>2 x 1</strong>, y demuéstrale que eres todo un Churrísimo.
      </p>
      @if(Auth::check())
        @if($code->active == true)
        <div class="text-center m-4" style="background-color: #F2BA2B;">
          <img src="https://taggeatuchurro.com/img/code01.png" class="img-fluid">
            <h2 class="text-white">
              @if($code->email == Auth::user()->email)
                {{ $code->user->name }}
              @else
                {{ $code->name }}
              @endif
            </h2>
          <img src="https://taggeatuchurro.com/img/code02.png" class="img-fluid">
            <h1 class="text-white">{{ $code->code }}</h1>
          <img src="https://taggeatuchurro.com/img/code03.png" class="img-fluid">
        </div>
        @endif
      @else
        <a href="/login/facebook" class="btn btn-lg btn-fb"><i class="fab fa-facebook"></i> Ingresa con Facebook</a> &nbsp;
        <a href="/login/google" class="btn btn-lg btn-fb btn-out-line-danger"><i class="fab fa-google"></i> Ingresa con Google</a>
      @endif

    </div>
  </div>
</div>
@endsection
