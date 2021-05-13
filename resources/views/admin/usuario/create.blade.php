@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.usuario.index'))
  @slot('color', 'secondary')
  @slot('body', 'Nuevo Usuario')
@endcomponent
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Nuevo Usuario</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.usuario.store') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2">Rut</label>
                <div class="input-group col-sm-10">
                  <input type="text" class="form-control" name="run" placeholder="Ej: 19222888K"
                    required="" maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)">
                  <small id="error" class="text-danger"></small>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ old('apellido') }}" placeholder="Apellido" required>
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" id="username" autocomplete="off" value="{{ old('username') }}" placeholder="Nombre de usuario" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('username', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña <small>(12345)</small></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" value="12345" placeholder="Contraseña" required>
                  {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ old('correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row" id="data_1">
                <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
                <div class="input-group date col-sm-8">
                  <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" readonly name="birthdate" required value="{{ old('birthdate') ?? date('d-m-Y') }}">
                </div>
                <div class="col-sm-12">
                  {!! $errors->first('birthdate','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group center-text">
                <div id="preview"></div>
              </div>

              <hr>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Rol</label>
                <div class="col-sm-8">
                  <select name="rol" id="rol" class="form-control" required>
                    @foreach ($roles as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
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
</section>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
<script src="/dist/js/validate-run.js"></script>
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="/vendor/datepicker2/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/datepicker2/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.clockpicker').clockpicker();

  $('#data_1 .input-group.date').datepicker({
  language: "es",
  format: 'dd-mm-yyyy',
  orientation: "bottom",
  showButtonPanel: true,
  autoclose: true
  });
</script>
@endpush