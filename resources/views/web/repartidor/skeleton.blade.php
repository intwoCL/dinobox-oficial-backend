<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Administrador - Delivery')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @if (auth('usuario')->check())
    @if (current_user()->config_theme!='default')
      <link rel="stylesheet" href="/dist/theme/{{ current_user()->config_theme }}/bootstrap.css">
    @endif
    @php
      $darkMode = current_user()->getConfigDarkMode() ? 'dark-mode' : '';
    @endphp
  @endif
  <style>
    .btn-circle {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 6px 0;
      font-size: 12px;
      line-height: 1.428571429;
      border-radius: 15px;
    }
    .btn-circle.btn-lg {
      width: 50px;
      height: 50px;
      padding: 10px 16px;
      font-size: 18px;
      line-height: 1.33;
      border-radius: 25px;
    }
    .btn-circle.btn-xl {
      width: 70px;
      height: 70px;
      padding: 10px 16px;
      font-size: 24px;
      line-height: 1.33;
      border-radius: 35px;
    }

    .btn-round {
      justify-items: center;
      text-align: center;
      align-items: center;
      padding: 4px 4px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

  </style>
  @stack('stylesheet')
</head>
<body class="text-sm hold-transition sidebar-mini layout-fixed layout-footer-fixed {{ $darkMode ?? '' }}">
  <div class="wrapper" id="app">
    @yield('app')
  </div>
  @stack('extra')
  <script src="{{ mix('js/www/manifest.js') }}"></script>
  <script src="{{ mix('js/www/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="/vendor/intwo/input.js"></script>
  @include('layouts._toast')
  @stack('javascript')
</body>
</html>
