<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('metas')
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129291739-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-129291739-1');
  </script>
  <div id="app">
    <main class="py-4">
      <div class="container">
        @include('flash::message')
      </div>
      @yield('content')
    </main>
    <footer class="text-center">
      <a href="#map" class="roboto fz-20 text-secondary btn-map">
        Conoce tu punto Churrísimo<br>
        <span class="text-warning">más cercano.</span>
      </a>
    </footer>
    <div class="text-center mt-5 pt-5">
      <a href="#map" class="btn-end bg-warning text-white p-3">Desliza hacia arriba</a>
      <hr>
      <a name="map"></a>
      <map-component :places="{{ App\Place::all()->toJson() }}"></map-component>
    </div>
  </div>
</body>
</html>
