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
        <a href="/login/facebook" class="btn btn-lg btn-fb"><i class="fab fa-facebook"></i> Ingresa con Facebook</a>
      </div>
    </div>
</div>
@endsection
