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

    .register-page {
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

    .login-box-msg {
      color: black;
    }

  </style>
  <link rel="stylesheet" href="/dist/css/login.css">
  @stack('stylesheet')
</head>
<body class="register-page {{ $sistema->getLoginOscuro() ? 'bg-dark' : '' }}">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('root') }}" class="h1">
          <img src="{{ $sistema->present()->getImagenLogo() }}" height="100" alt="" class="logo">
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><strong>Registro de cliente</strong></p>
        <form action="{{ route('cliente.register.store') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="text" class="form-control" name="run" placeholder="Ej: 19222888K"
                required="" maxlength="9" min="8" autocomplete="new-run" autofocus onkeyup="this.value = validarRut(this.value)" value="{{ old('run') }}">
                {!! $errors->first('run', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              <small id="error" class="text-danger"></small>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre"
                required="" autocomplete="new-names" autofocus value="{{ old('nombre') }}">
                {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                <small id="error" class="text-danger"></small>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="text" class="form-control" name="apellido" placeholder="Apellido"
                required="" autocomplete="new-surnames" autofocus value="{{ old('apellido') }}">
                {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                <small id="error" class="text-danger"></small>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="mail" class="form-control" name="correo" placeholder="Correo"
                required="" autocomplete="new-email" autofocus value="{{ old('correo') }}">
                {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                <small id="error" class="text-danger"></small>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="password" class="form-control" name="password" placeholder="Contraseña"
                required="" autocomplete="new-password" autofocus value="{{ old('password') }}">
                {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                <small id="error" class="text-danger"></small>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group col-12">
              <input type="number" class="form-control" name="telefono" placeholder="Teléfono"
                required="" autocomplete="new-telephone" autofocus value="{{ old('telefono') }}">
                {!! $errors->first('telefono', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                <small id="error" class="text-danger"></small>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="submit" class="btn btn-block btn-primary button-prevent">
              <i class="spinner fa fa-spinner fa-spin"></i>
              REGISTRARSE
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="/dist/js/validate-run.js"></script>
</body>
</html>