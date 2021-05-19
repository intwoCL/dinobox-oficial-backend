<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Administrador - Edugestion')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    body {
      background-color: #fff;
      font-family: 'Karla', sans-serif;
    }

    .intro-section {
      background-image: url("{{ $sistema->present()->getImagenFondo() }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      padding: 75px 95px;
      min-height: 100vh;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      flex-direction: column;
      color: #ffffff;
    }
    .login-btn {
      padding: 17px 40px 16px 41px;
      border-radius: 4px;
      background-color: #f0004f;
      font-size: 17px;
      font-weight: bold;
      color: #fff;
      line-height: 20px;
    }

    .login-btn:hover {
      border: 1px solid #f0004f;
      background-color: transparent;
      color: #f0004f;
    }

    .btn-primary {
      color: {{ $sistema->getPrimaryColorText() }}  !important;
      background-color: {{ $sistema->getPrimaryColor() }} !important;
      border-color: {{ $sistema->getPrimaryColor() }} !important;
      box-shadow: none;
    }
    .spinner {
      display: none;
    }
  </style>
  <link rel="stylesheet" href="/dist/css/login.css">
  @stack('stylesheet')
</head>
<body class="{{ $sistema->getLoginOscuro() ? 'bg-dark' : '' }}">
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 intro-section d-none d-sm-block">
          <div class="brand-wrapper">
            <img src="{{ $sistema->present()->getImagenLogo() }}" alt="" height="100" class="logo">

            <h1 class="intro-title">{{ $sistema->titulo ?? '' }}</h1>
          </div>
          <div class="intro-content-wrapper">
            {{-- <h1 class="intro-title">Sistema Edugestión Academica</h1> --}}
            <p class="intro-text"></p>
          </div>
          <div class="intro-section-footer">
            <p></p>
          </div>
        </div>
        <div class="col-sm-4 form-section">
          <div class="login-wrapper">
            <div class="col-md-12 text-center d-md-none d-lg-block">
              <img src="{{ $sistema->present()->getImagenLogo() }}" height="100" alt="" class="logo">
            </div>
            <h2 class="login-title text-center {{ $sistema->getLoginOscuro() ? 'text-white' : '' }}">Acceso</h2>
            <form action="{{ route('cliente.login') }}" method="POST" class="form-prevent">
              @csrf
              <div class="form-group">
                <label for="correo" class="sr-only">Correo</label>
                <input type="text" name="correo" id="correo" autofocus class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" placeholder="Correo" value="{{ old('correo') }}" required>
                {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="form-group mb-3">
                <label for="password" class="sr-only">Contraseña</label>
                <input type="password" name="password" autocomplete="off" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Contraseña" required>
                {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              @if (session('info'))
              <div class="form-group text-center">
                <small class=" text-danger">{{ session('info') }}</small>
              </div>
              @endif
              <div class="d-flex justify-content-between align-items-center mb-5">
                <button type="submit" class="btn btn-block btn-primary button-prevent">
                  <i class="spinner fa fa-spinner fa-spin"></i>
                  INICIAR
                </button>
              </div>
              <a href="{{ route('cliente.register') }}"><small>¿Aún no te has registrado? Hazlo ahora</small></a>
            </form>
            @if (helper_integration_gmail())
            <div class="social-auth-links text-center mb-3">
              <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
                <i class="fab fa-google mr-2"></i> Sign in using Google+
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>