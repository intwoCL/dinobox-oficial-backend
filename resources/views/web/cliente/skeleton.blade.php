<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Delivery - Dinobox')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  {{-- <link rel="stylesheet" href="/dist/webv1/style.css"> --}}
  @stack('stylesheet')
</head>

<body class="text-sm hold-transition">
  {{-- <body class="dark-mode" class="text-sm hold-transition sidebar-mini layout-fixed layout-footer-fixed"> --}}
  <div id="app">
    @yield('app')
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="/dist/webv1/app.js"></script>
  @include('layouts._toast')
  @stack('javascript')
</body>
</html>