@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Ajuste y Pefil de Cliente</h1>
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
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Actualizar Cliente</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('profile.cliente') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="f1" class="col-form-label col-sm-2">Run</label>
                        <div class="input-group col-sm-10">
                          <input type="text" class="form-control" placeholder="" readonly  value="{{ $c->run }}">
                          <small id="error" class="text-danger"></small>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ $c->nombre }}" placeholder="Nombre" required>
                          {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                        </div>
                        <div class="col-sm-5">
                          <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $c->apellido }}" placeholder="Apellido">
                          {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="form-group col-md-6">
                          <label>Correo</label>
                          <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="correo" value="{{ $c->correo }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                          {!! $errors->first('correo', '<small class="form-text text-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-md-6">
                          <label>Teléfono</label>
                          <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese teléfono aqui..." value="{{ $c->telefono }}" required>
                          {!! $errors->first('telefono','<small class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row" id="data_1">
                        <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
                        <div class="input-group date col-sm-8">
                          <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
                          <input type="text" class="form-control" readonly name="birthdate" required value="{{ $c->getFechaNacimiento()->getDate() }}">
                        </div>
                        <div class="col-sm-12">
                          {!! $errors->first('birthdate','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fecha" class="col-sm-4 col-form-label">Sexo<small class="text-danger">*</small></label>
                        <div class="input-group date col-sm-8">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="sexo" {{ $c->sexo==1 ? 'checked' : '' }} value="1">
                              Hombre
                            </label>
                          </div>
                          <div class="form-check ml-2">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="sexo" {{ $c->sexo==2 ? 'checked' : '' }} value="2">
                              Mujer
                            </label>
                          </div>
                        </div>
                        {!! $errors->first('sexo','<small class="form-text text-danger text-center">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                        <div class="input-group">
                          <img src="{{ $c->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
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
                        <label for="inputUsername" class="col-sm-12 col-form-label">Repetir contraseña</label>
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
  $t = "client";
  if ($errors->has('password_actual') || $errors->has('password_nueva') || $errors->has('password_nueva_repetir') ) {
    $t = "password";
  }
@endphp
<script>
  $('#pills-tab a[href="#pills-{{ empty(session('tabs')) ? $t : session('tabs') }}"]').tab('show');
</script>
<script src="/dist/js/preview.js"></script>
@endpush