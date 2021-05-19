@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.cliente.index'))
  @slot('color', 'secondary')
  @slot('body', 'Agregar cliente')
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
          {{-- <div class="card-header">
            <h3 class="card-title">Nuevo Cliente</h3>
          </div> --}}
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.cliente.store') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2">Rut<small class="text-danger">*</small></label>
                <div class="input-group col-sm-10">
                  <input type="text" class="form-control" name="run" placeholder="Ej: 19222888K"
                    required="" maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)">
                  <small id="error" class="text-danger"></small>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre<small class="text-danger">*</small></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ old('apellido') }}" placeholder="Apellido">
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo<small class="text-danger">*</small></label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ old('correo') }}" placeholder="example@correo.cl" onkeyup="javascript:this.value=this.value.toLowerCase();">
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña<small class="text-danger">*</small> <small>(12345)</small></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" value="12345" placeholder="Contraseña" required>
                  {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
                <div class="input-group col-sm-10">
                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos">
                </div>
              </div>

              <div class="form-group row" id="data_1">
                <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento<small class="text-danger">*</small></label>
                <div class="input-group date col-sm-8">
                  <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" readonly name="birthdate" required value="{{ old('birthdate') ?? date('d-m-Y') }}">
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
                      <input class="form-check-input" type="radio" name="sexo" checked value="1">
                      Hombre
                    </label>
                  </div>
                  <div class="form-check ml-2">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="sexo" value="2">
                      Mujer
                    </label>
                  </div>
                </div>
                {!! $errors->first('sexo','<small class="form-text text-danger text-center">:message</small>') !!}
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