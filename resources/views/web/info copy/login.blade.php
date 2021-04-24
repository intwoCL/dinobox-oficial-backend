@extends('web.evento.skeleton')
@push('stylesheet')
<link rel="stylesheet" href="/dist/css/tres.css">
@endpush
@section('app')
<main class="d-flex align-items-center min-vh-100">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-6">
          <img src="/dist/img/ticket.jpg" alt="login" class="login-card-img">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            {{-- <div class="brand-wrapper">
              <img src="assets/images/logo.svg" alt="logo" class="logo">
            </div> --}}
            <p class="login-card-description">INGRESO</p>
            <form action="{{ route('web.evento.login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email" >CÓDIGO DE EVENTO</label>
                <input type="text" name="code" id="code" class="form-control text-uppercase" maxlength="10" placeholder="Ingrese el código del evento" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">INGRESAR</button>
              </div>
              {{-- <a href="#!" class="forgot-password-link">Forgot password?</a> --}}
              {{-- <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> --}}
              {{-- <nav class="login-card-footer-nav">
                <a href="#!">Terminos y uso.</a>
              </nav> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection