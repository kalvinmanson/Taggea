<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <main class="py-4">
      @yield('content')
    </main>
    <footer class="text-center">
      <a href="#" class="roboto fz-20 text-secondary btn-map">
        Conoce tu punto Churrísimo<br>
        <span class="text-warning">más cercano.</span>
      </a>
    </footer>
    <a href="#" class="btn-end bg-warning text-white p-2">Desliza hacia arriba</a>
  </div>
</body>
</html>
