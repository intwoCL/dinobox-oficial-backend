@php
    $date = "";
@endphp
@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.usuario.index'))
  @slot('color', 'secondary')
  @slot('body', "Editar Usuario <strong>".$u->present()->nombre_completo()."</strong>")
@endcomponent
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @include('admin.usuario._tabs_usuario')
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            @include('admin.usuario._table_vehiculos')
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Vehículo</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.vehiculo.store',$u->id) }}">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Patente </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('patente') ? 'is-invalid' : '' }}" value="" name="patente" id="patente" autocomplete="off" placeholder="Ingrese patente" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  {!! $errors->first('patente', '<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Modelo </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}" value="" name="modelo" id="modelo" autocomplete="off" placeholder="Ingrese modelo" required>
                  {!! $errors->first('modelo', '<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Marca </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}" value="" name="marca" id="marca" autocomplete="off" placeholder="Ingrese marca" required>
                  {!! $errors->first('marca', '<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipo Vehículo</label>
                <div class="col-sm-10">
                  <select name="tipo" id="select1" class="form-control {{ $errors->has('tipo') ? 'is_invalid' : '' }}" required>
                    @foreach ($tipos as $key=> $value)
                      <option value="{{ $key }}">{{ $value[0] }}</option>
                    @endforeach
                  </select>
                  {!! $errors->first('tipo','<div class="invalid-feedback">:message</div>') !!}
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

  $('[data-toggle="tooltip"]').tooltip();
</script>
@endpush