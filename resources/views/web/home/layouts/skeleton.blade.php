<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dinobox.cl</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="/vendor/intwo/www/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ mix('css/www/app2.css') }}">
  <style>
    .intro-section {
      background-image: url("{{ asset('dist/img/dinobox-fondo.png') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
  @stack('stylesheet')
</head>
<body>
  <div id="app">
    @yield('app')
  </div>
  @stack('extra')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ mix('js/www/manifest.js') }}"></script>
  <script src="{{ mix('js/www/vendor.js') }}"></script>
  <script src="{{ mix('js/www/app2.js') }}"></script>
  <script src="/vendor/intwo/input.js"></script>
  @stack('javascript')
</body>
</html>