<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Evento - Edugestion')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @include('web.evento._color')
  @stack('stylesheet')
</head>
<body>
  <div id="app">
    @yield('app')
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('vendor/intwo/input.js') }}"></script>
  @include('layouts._toast')
  @stack('javascript')
</body>
</html>