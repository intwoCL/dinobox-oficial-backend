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
            <h2 class="login-title text-center {{ $sistema->getLoginOscuro() ? 'text-white' : '' }}">Registro</h2>
            <form action="{{ route('cliente.register.store') }}" method="POST" class="form-prevent">
              @csrf
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2"></label>
                <div class="input-group col-sm-12">
                  <input type="text" class="form-control" name="run" placeholder="Run"
                    required="" maxlength="9" min="8" autocomplete="new-run" autofocus onkeyup="this.value = validarRut(this.value)" value="{{ old('run') }}">
                    {!! $errors->first('run', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                  <small id="error" class="text-danger"></small>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputnombre" class="col-form-label"></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="new-names" value="{{ old('nombre') }}" placeholder="Nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="new-surnames" value="{{ old('apellido') }}" placeholder="Apellido">
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-0 col-form-label">Correo</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ old('correo') }}" placeholder="example@correo.cl" onkeyup="javascript:this.value=this.value.toLowerCase();" autocomplete="new-email">
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-12">
                  <input type="password" name="password" autocomplete="new-password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Contraseña" required>
                  {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-0"></label>
                <div class="input-group col-sm-12">
                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="new-telehphone" maxlength="9" placeholder="Teléfono" pattern="[0-9]{9}" title="Formato de 9 digitos">
                </div>
              </div>
              {{-- <div class="form-group">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" autofocus class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Usuario" value="{{ old('username') }}" required>
                {!! $errors->first('username', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div> --}}
              {{-- <div class="form-group mb-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" autocomplete="off" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Contraseña" required>
                {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div> --}}
              @if (session('info'))
              <div class="form-group text-center">
                <small class=" text-danger">{{ session('info') }}</small>
              </div>
              @endif
              <div class="d-flex justify-content-between align-items-center mb-5">
                <button type="submit" class="btn btn-block btn-primary button-prevent">
                  <i class="spinner fa fa-spinner fa-spin"></i>
                  REGISTRARSE
                </button>
              </div>
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
  <script src="/dist/js/validate-run.js"></script>
</body>
</html>