@php
  $now = new \DateTime();
  $fecha = $now->format('d-m-Y');
  $hora = date('H:i');
@endphp
@extends('layouts.app')
@section('title', "Orden - Delivery")
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('ordenes.index.pendientes'))
  @slot('color', 'dark')
  @slot('body', "Generar Orden")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Orden</h3>
        </div>
        <div class="card-body">
          <h6><strong>Datos Remitente:</strong></h6>
          <br>
          <div class="input-group">
            <label class="col-sm-4 col-form-label">Encontrar usuario</label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder=""
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

        <form class="form-horizontal form-submit" action="{{ route('orden.store') }}" method="POST">
          @csrf
          <input type="hidden" name="id_alumno" value="" id="id_alumno">
          <input type="hidden" name="id_usuario_general" value="" id="id_usuario_general">
          <input type="hidden" name="run" value="" id="id_run" required>
          <input type="hidden" name="tipo_usuario" value="1" id="tipo_usuario" required>
          <div class="card-body py-0">
            
            {{-- <div class="form-group row">
              <label class="col-sm-4 col-form-label">Canal</label>
              <div class="input-group col-sm-8">
                <select class="form-control" name="canal" required>
                  @foreach ($canales as $key => $value )
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            </div> --}}

            <div class="form-group row" id="data_1">
              <label for="fecha" class="col-sm-4 col-form-label">Fecha Entrega</label>
              <div class="input-group date col-sm-8">
                <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" readonly name="fecha_entrega" id="fecha_entrega" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha_entrega', '<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre Remitente</label>
                <input type="text" class="form-control {{ $errors->has('nombre_remitente') ? 'is-invalid' : '' }}" name="nombre_remitente" id="nombre_remitente" autocomplete="off" value="{{ old('nombre_remitente') }}" placeholder="Nombre" required>
                {!! $errors->first('nombre_remitente', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Apellido Remitente</label>
                <input type="text" class="form-control {{ $errors->has('apellido_remitente') ? 'is-invalid' : '' }}" name="apellido_remitente" id="apellido_remitente" autocomplete="off" value="{{ old('apellido_remitente') }}" placeholder="Apellido">
                {!! $errors->first('apellido_remitente', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Calle Remitente</label>
                <input type="text" class="form-control {{ $errors->has('calle_remitente') ? 'is-invalid' : '' }}" name="calle_remitente" id="calle_remitente" autocomplete="off" value="{{ old('calle_remitente') }}" placeholder="Calle" required>
                {!! $errors->first('calle_remitente', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Numero Remitente</label>
                <input type="text" class="form-control {{ $errors->has('numero_remitente') ? 'is-invalid' : '' }}" name="numero_remitente" id="numero_remitente" autocomplete="off" value="{{ old('numero_remitente') }}" placeholder="Número">
                {!! $errors->first('numero_remitente', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Correo Remitente</label>
                <input type="mail" class="form-control {{ $errors->has('email_remitente') ? 'is-invalid' : '' }}" name="email_remitente" id="email" value="{{ old('email_remitente') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Teléfono Remitente</label>
                <input type="tel" class="form-control" name="telefono_remitente" id="telefono_remitente" autocomplete="off" maxlength="9" placeholder="Ingrese teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos">
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

            <hr>
            <h6><strong>Datos Destinatario:</strong></h6>
            <br>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre Destinatario</label>
                <input type="text" class="form-control {{ $errors->has('nombre_destinatario') ? 'is-invalid' : '' }}" name="nombre_destinatario" id="nombre_destinatario" autocomplete="off" value="{{ old('nombre_destinatario') }}" placeholder="Nombre" required>
                {!! $errors->first('nombre_destinatario', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Apellido Destinatario</label>
                <input type="text" class="form-control {{ $errors->has('apellido_destinatario') ? 'is-invalid' : '' }}" name="apellido_destinatario" id="apellido_destinatario" autocomplete="off" value="{{ old('apellido_destinatario') }}" placeholder="Apellido">
                {!! $errors->first('apellido_destinatario', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Calle Destinatario</label>
                <input type="text" class="form-control {{ $errors->has('calle_destinatario') ? 'is-invalid' : '' }}" name="calle_destinatario" id="calle_destinatario" autocomplete="off" value="{{ old('calle_destinatario') }}" placeholder="Calle" required>
                {!! $errors->first('calle_destinatario', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Numero Destinatario</label>
                <input type="text" class="form-control {{ $errors->has('numero_destinatario') ? 'is-invalid' : '' }}" name="numero_destinatario" id="numero_destinatario" autocomplete="off" value="{{ old('numero_destinatario') }}" placeholder="Número">
                {!! $errors->first('numero_destinatario', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group">
              <label for="comentario" class="col-form-label">Mensaje</label>
              <textarea class="form-control  {{ $errors->has('mensaje') ? 'is-invalid' : '' }}" rows="3" name="mensaje" id="mensaje" placeholder="..." maxlength="255" onkeyup="countChars(this,255);">{{ old('mensaje') }}</textarea>
              {!! $errors->first('mensaje', '<small class="form-text text-danger">:message</small>') !!}
              <p id="limitC"></p>
            </div>

            <div class="form-group">
              <label for="inputAddress">Precio envió</label>
              <input type="tel" class="form-control" name="precio" id="precio" autocomplete="off" maxlength="9" placeholder="0">
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
