@php
  $now = new \DateTime();
  $fecha = $now->format('d-m-Y');
  $hora = date('H:i');
@endphp
@extends('layouts.app')
@section('title', "Atención Alumno - Edugestion")
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('ordenes.index')) --}}
  @slot('color', 'dark')
  @slot('body', "Agendar hora al alumno")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Agendar hora al alumno</h3>
        </div>
        <div class="card-body">
          <div class="input-group">
            <label class="col-sm-4 col-form-label">Rut </label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese el Rut Alumno..."
              required maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)">
            <span class="input-group-append">
              <button type="button" id="sendRut" name="opcion" autofocus value="buscar" onclick="buscarAlumnos()" class="btn btn-success" onkeypress="pulsar(event)">Buscar</button>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFind">
                <i class="fa fa-search"></i>
              </button>
            </span>
            <p class="col-md-12">
              <small id="error" class="text-danger"></small>
              <small id="success" class="text-success"></small>
            </p>
          </div>
        </div>

        <form class="form-horizontal form-submit" action="" method="POST">
          @csrf
          <input type="hidden" name="id_alumno" value="" id="id_alumno">
          <input type="hidden" name="id_usuario_general" value="" id="id_usuario_general">
          <input type="hidden" name="run" value="" id="id_run" required>
          <input type="hidden" name="tipo_usuario" value="1" id="tipo_usuario" required>
          <div class="card-body py-0">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Canal</label>
              <div class="input-group col-sm-8">
                <select class="form-control" name="canal" required>
                  {{-- @foreach ($canales as $key => $value ) --}}
                    {{-- <option value="{{ $key }}">{{ $value }}</option> --}}
                  {{-- @endforeach --}}
                </select>
              </div>
            </div>

            <div class="form-group row" id="data_1">
              <label for="fecha" class="col-sm-4 col-form-label">Fecha</label>
              <div class="input-group date col-sm-8">
                <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" readonly name="fecha_agenda" id="fecha_agenda" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha', '<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
            {{-- <div class="form-group row">
              <label for="hora" class="col-sm-4 col-form-label">Hora</label>
              <div class="input-group col-sm-8">
                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                  <input type="text" class="form-control" readonly value="{{$hora}}" name="hora_agenda" id="hora_Agenda" required>
                </div>
                <div class="col-sm-12">
                  {!! $errors->first('hora', '<small class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
            </div> --}}

            <div class="form-group">
              <label for="comentario" class="col-form-label">Comentario de Entrada</label>
              <textarea class="form-control  {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" rows="3" name="comentario_entrada" id="comentario_entrada" placeholder="..." maxlength="255" onkeyup="countChars(this,255);">{{ old('descripcion') }}</textarea>
              {!! $errors->first('descripcion', '<small class="form-text text-danger">:message</small>') !!}
              <p id="limitC"></p>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" id="btnAgregar" class="btn btn-success float-right">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<modal-clientes
  post-find="{{ route('api.v0.cliente.show') }}"
></modal-clientes>
@endsection
@push('javascript')
<script src="/dist/js/validate-run.js"></script>
<script src="/vendor/intwo/countChars.js"></script>

<script>
  let showTipoUsuario = document.getElementById("showTipoUsuario");
  let showCarrera = document.getElementById("showCarrera");
  let showJornada =  document.getElementById("showJornada");

  let btnAtender = document.getElementById("btnAtender");
  let btnAgregar =  document.getElementById("btnAgregar");

  // Enter en rut
  var input = document.getElementById("rut");
  input.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("sendRut").click();
    }
  });

  // Buscar Alumno
  function buscarAlumnos() {
    const url2 = "";
    var rut = document.getElementById('rut').value;
    document.getElementById('error').innerHTML = "";
    document.getElementById('success').innerHTML = "";

    axios
      .post(url2,{rut}).then(response=> {
        let result = response.data;
        if (result.status == 200) {
          let alumno = result.alumno;
          userHandler(alumno, "alumno");
        }else{
          document.getElementById('error').innerHTML = "Alumno no Encontrado.";
          clearForm();
        }
      }).catch(er=>{
        document.getElementById('error').innerHTML = "El Sistema no Responde.";
      });
  }

  function pulsar(e) {
    if (e.keyCode === 13 && !e.shiftKey) {
      e.preventDefault();
      buscarAlumnos();
    }
  }
</script>
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

  function userHandler(cliente, direccion){
    console.log('cliente',cliente);
    console.log('direccion',direccion);
    // clearForm();

    // document.getElementById('id_cliente').value = user.nombres;
    // document.getElementById('id_direccion').value = user.correo;

    // document.getElementById('success').innerHTML = "Encontrado.";

    $('#modalComuna').modal('hide');
    $('#modalFind').modal('hide');
  };


  function clearForm(){
    document.getElementById('id_cliente').value = "";
    document.getElementById('id_direccion').value = "";
  }
</script>
@endpush
