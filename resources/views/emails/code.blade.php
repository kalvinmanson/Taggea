<p align="center" style="font-family: Arial">Si no puede ver este mensaje correctamente de click <a href="https://taggeatuchurro.com/taggea/{{ $code->id }}">aqui</a>.</p>
<div style="text-align:center; background-color: #F2BA2B; color: #FFFFFF; font-family: Arial">
  <img src="https://taggeatuchurro.com/img/code01.png"><br>
    <h2>
      @if($code->email == Auth::user()->email)
        {{ $code->user->name }}
      @else
        {{ $code->name }}
      @endif
    </h2>
  <img src="https://taggeatuchurro.com/img/code02.png"><br>
    <h1>{{ $code->code }}</h1>
  <img src="https://taggeatuchurro.com/img/code03.png">
</div>
<p align="center"><small style="font-family: Arial">Recibiste este correo porque {{ $code->user->name }} nos ha suministrado tu dirección de email, no se te suscribira a ninguna lista de distribución sin tu autorización.</small></p>
