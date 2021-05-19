@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Ajuste y Pefil de Usuario</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item mr-2">
            <a class="nav-link active border border-primary border-bottom" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="true">Mi perfil</a>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link border border-primary border-bottom" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Contraseña</a>
          </li>
          <li class="nav-item">
            <a class="nav-link border border-primary border-bottom" id="pills-theme-tab" data-toggle="pill" href="#pills-theme" role="tab" aria-controls="pills-theme" aria-selected="false">Tema</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Actualizar Usuario</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('settings.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" value="{{ $u->username }}" readonly placeholder="Nombre de usuario" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="inputNombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ $u->nombre }}" placeholder="nombre" required>
                          {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                        </div>
                        <div class="col-sm-5">
                          <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $u->apellido }}" placeholder="apellido" required>
                          {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $u->correo }}" placeholder="example@correo.cl" required>
                          {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                        <div class="input-group">
                          <img src="{{ $u->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                          <br>
                        </div>
                      </div>
                      <div class="form-group row center-text">
                        <div id="preview"></div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Actualizar contraseña</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('settings.profile.password') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña actual</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control {{ $errors->has('password_actual') ? 'is-invalid' : '' }}" name="password_actual" id="password_actual" autocomplete="off" placeholder="*********" required>
                          {!! $errors->first('password_actual','<small class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña nueva</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control {{ $errors->has('password_nueva') ? 'is-invalid' : '' }}" name="password_nueva" id="password_nueva" autocomplete="off" placeholder="*********" required>
                          {!! $errors->first('password_nueva','<small class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña repetir</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control {{ $errors->has('password_nueva_repetir') ? 'is-invalid' : '' }}" name="password_nueva_repetir" id="password_nueva_repetir" autocomplete="off" placeholder="*********" required>
                          {!! $errors->first('password_nueva_repetir','<small class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-theme" role="tabpanel" aria-labelledby="pills-theme-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Cambiar Tema</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('settings.profile.theme') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="form-check form-group">
                        <input type="checkbox" {{ current_user()->getConfigDarkMode() ? 'checked' : '' }} class="form-check-input" id="checkDarkMode" name="checkDarkMode">
                        <label class="form-check-label" for="checkDarkMode">DarkMode</label>
                      </div>

                      <div class="selector form-group" hidden id='theme-system-selector'>
                        <label>Select</label>
                        <select class="form-control">
                          <option value='bootstrap' selected>Bootstrap 4</option>
                          <option value='standard'>unthemed</option>
                        </select>
                      </div>
                      <div class="selector form-group" data-theme-system="bootstrap">
                        <label>Seleccionar tema</label>
                        <select class="form-control" name="theme">
                          @foreach ($themes as $value => $key)
                            <option value='{{ $value }}' {{ $value == $u->config_theme ? 'selected' : '' }}>{{ $key }}</option>
                          @endforeach
                        </select>
                        <span id='loading' style='display:none'>Cargando tema...</span>
                      </div>

                      {{-- <div class="form-group row">
                        <label class="col-form-label col-md-6">Color primario</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-md-6">Color secundario</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-md-6">Color success</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-md-6">Color danger</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-md-6">Color warning</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-md-6">Color info</label>
                        <div class="input-group col-md-6">
                          <input type="color" class="form-control">
                        </div>
                      </div> --}}

                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src='/dist/js/theme-chooser.js'></script>
<script>
  initThemeChooser();
</script>
@php
  $t = "user";
  if ($errors->has('password_actual') || $errors->has('password_nueva') || $errors->has('password_nueva_repetir') ) {
    $t = "password";
  }
@endphp
<script>
  $('#pills-tab a[href="#pills-{{ empty(session('tabs')) ? $t : session('tabs') }}"]').tab('show');
</script>
<script src="/dist/js/preview.js"></script>
@endpush