<div class="popup">
  <div class="inner text-center">
    @if($code->active)
      <h4 class="roboto">Ya puedes ir a devorar churros</h4>
      <h1>2x1</h1>
      <h4 class="roboto">Acércate junto a:</h4>
      <h2 class="roboto text-white">
        @if($code->email == Auth::user()->email)
          {{ $code->name }}
        @else
          {{ $code->user->name }}
        @endif
      </h2>
      <h4 class="roboto">a uno de nuestros locales con el siguiente código: </h4>
      <h2 class="roboto text-white"><span class="fz-20">{{ $code->code }}</span></h2>
    @else
      <h4 class="roboto">Ya tienes medio codigo</h4>
      <h1>2x1</h1>
      <h4>Taggea a <strong>{{ $code->name }}</strong> en una publicación, para obtener la otra mitad.</h4>
      <a href="#" class="btn btn-lg btn-primary my-4"><i class="fab fa-facebook"></i> compartir y Taggear</a>
      <h2 class="roboto text-white"><span class="fz-20">{{ substr($code->code, 0, 3) }}XXX</span></h2>
      <h4 class="txt-white">Cuando <strong>{{ $code->name }}</strong> acepte tendras el resto del código.</h4>
    @endif
    <p class="text-white text-justify">
      <small>
        Promoción válida del 1 al 30 de noviembre de 2018, para redimirla debes seguirnos en nuestra cuenta de instagram @TuChurrisimo. De lunes a jueves en productos seleccionados: churritos con azúcar, churritos glaseados y churritos con azúcar y canela en cualquiera de sus dos presentaciones por 6 o por 12. Aplica en Centro Comercial Centro Chía, local 1087, Centro Comercial Santafé, local 3-03 (Bogotá), Centro Comercial Plaza Central, local 3-78, Centro Calle 22 # 6 -53, local 2 , Centro Local City, Centro Comercial Terreros, local 4-24, Centro Comercial Guacarí, local 2241 (Sincelejo). No es acumulable con otras promociones.
      </small>
    </p>
  </p>
</div>
