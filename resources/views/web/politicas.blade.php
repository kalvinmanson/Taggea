@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <a href="{{ route('home') }}"><img src="/img/logo00.png" class="img-fluid"></a>
        </div>
        <div class="col-md-6 text-center">
          <p class="roboto py-5 mt-5 px-md-5 text-secondary">
            Promoción válida del 1 al 30 de noviembre de 2018, para redimirla debes seguirnos en nuestra cuenta de instagram @TuChurrisimo. De lunes a jueves en productos seleccionados: churritos con azúcar, churritos glaseados y churritos con azúcar y canela en cualquiera de sus dos presentaciones por 6 o por 12. Aplica en Centro Comercial Centro Chía, local 1087, Centro Comercial Santafé, local 3-03 (Bogotá), Centro Comercial Plaza Central, local 3-78, Centro Calle 22 # 6 -53, local 2 , Centro Local City, Centro Comercial Terreros, local 4-24, Centro Comercial Guacarí, local 2241 (Sincelejo). No es acumulable con otras promociones.
          </p>
          <a href="/login/facebook" class="btn btn-lg btn-fb"><i class="fab fa-facebook"></i> Ingresa con Facebook</a>
        </div>
      </div>
  </div>

@endsection
