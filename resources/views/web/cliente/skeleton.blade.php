<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Delivery - Dinobox')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <style>
    .color {
      border-radius: 0px 10px 10px;
      background: rgba(255, 255, 255, 0.95);
      width: 100%;
      position: relative;
      box-shadow: none;
      margin-bottom: 20px;
      overflow: unset;
      display: block;
      flex-direction: column;
      -webkit-box-pack: start;
      justify-content: flex-start;
      -webkit-box-align: center;
      align-items: center;
      padding: 20px 15px;
    }

    .list-group-item.active {
      z-index: 2;
      color: #fff;
      background-color: #4e4e4e;
      border-color: #4e4e4e;
    }

    @media (max-width: 575.98px) {
      .content-form {
        margin-top: 50px;
      }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
      .content-form {
        margin-top: 50px;
      }
    }

    .modal-header {
      border-bottom: 0px ;
    }

  </style>
  @stack('stylesheet')
</head>

<body class="text-sm hold-transition">
  {{-- <body class="dark-mode" class="text-sm hold-transition sidebar-mini layout-fixed layout-footer-fixed"> --}}
  <div id="app">
    @yield('app')
  </div>
  @stack('extra')
  <script src="{{ mix('js/www/manifest.js') }}"></script>
  <script src="{{ mix('js/www/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  {{-- <script src="/dist/webv1/app.js"></script> --}}
  @include('layouts._toast')
  @stack('javascript')
</body>
</html>