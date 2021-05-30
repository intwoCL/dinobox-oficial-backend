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
      background-image: url("{{ asset($sistema->present()->getImagenFondo()) }}");
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
  <style>
    @keyframes move_wave {
      0% {
          transform: translateX(0) translateZ(0) scaleY(1)
      }
      50% {
          transform: translateX(-25%) translateZ(0) scaleY(0.55)
      }
      100% {
          transform: translateX(-50%) translateZ(0) scaleY(1)
      }
    }
    .waveWrapper {
      overflow: hidden;
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      margin: auto;
    }
    .waveWrapperInner {
      position: absolute;
      width: 100%;
      overflow: hidden;
      height: 100%;
      filter: blur(.4px);
      -webkit-filter: blur(.5px);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      /* background-image: linear-gradient(to top, #f3f3f3 1%, #696868 40%); */
      background-image: url("{{ asset(current_sistema()->present()->getImagenFondo()) }}");
    }
    .bgTop {
      z-index: -3;
      opacity: 0.5;
    }
    .bgMiddle {
      z-index: -1;
      opacity: 0.75;
    }
    .bgBottom {
      z-index: -4;
    }
    .wave {
      position: absolute;
      left: 0;
      width: 200%;
      height: 100%;
      background-repeat: repeat no-repeat;
      background-position: 0 bottom;
      transform-origin: center bottom;
    }
    .waveTop {
      background-size: 50% 100px;
    }
    .waveAnimation .waveTop {
    animation: move-wave 3s;
      -webkit-animation: move-wave 3s;
      -webkit-animation-delay: 1s;
      animation-delay: 1s;
    }
    .waveMiddle {
      background-size: 50% 120px;
    }
    .waveAnimation .waveMiddle {
      animation: move_wave 10s linear infinite;
    }
    .waveBottom {
      background-size: 50% 100px;
    }
    .waveAnimation .waveBottom {
      animation: move_wave 15s linear infinite;
    }
  </style>
  @stack('stylesheet')
</head>
<body>

  <div class="waveWrapper waveAnimation">
    <div class="waveWrapperInner bgTop">
      <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
    </div>
    <div class="waveWrapperInner bgMiddle">
      <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
    </div>
    <div class="waveWrapperInner bgBottom">
      <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 d-none d-md-block d-sm-none">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          Mi cuenta
        </h4>
        <div class="card card-widget widget-user-2">
          <div class="card-body">

          </div>
        </div>
      </div>
      <div class="col-md-6 content-form">
        <h4 class="mb-3 text-white">Mi perfil</h4>
        <div class="card shadow rounded">
          <form class="form-submit" action="{{ route('web.cliente.perfil.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="run">RUT</label>
                  <input type="text" class="form-control" id="run" placeholder="Ej: 19222888K" value="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-xs-6 col-md-6">
                  <label for="nombre">Nombre<small class="text-danger">*</small></label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="" name="nombre" autocomplete="new-names">
                </div>

                <div class="col-xs-6 col-md-6">
                  <label for="apellido">Apellido<small class="text-danger">*</small></label>
                  <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="" name="apellido" autocomplete="new-surnames">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="correo">E-mail</label>
                  {{-- <input type="mail" class="form-control"  id="correo" placeholder="Ingresa tu email" value="{{ $cliente->correo }}" name="correo" autocomplete="new-email" disabled> --}}
                  <input type="text" class="form-control" value="">
                </div>
                <div class="col-md-6">
                  <label for="telefono">Teléfono de contacto</label>
                  <input type="text" class="form-control" id="telefono" placeholder="Ej: 977374733" value="" name="telefono" autocomplete="new-telephone">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Registrar</button>
              <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
                <h5>REGISTRAR</h5>
              </button>
            </div>
          </form>
        </div>
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
            <a class="d-flex justify-content-center" href="{{ route('cliente.register') }}"><small>¿Aún no te has registrado? Hazlo ahora</small></a>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>