@php
  $now = new \DateTime();
  $fecha = $now->format('d-m-Y');
  $hora = date('H:i');
@endphp
@extends('layouts.app')
@section('title', "Ordenes - Edugestion")
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('ordenes.index'))
  @slot('color', 'dark')
  @slot('body', "Generar Orden")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Generar Orden</h3>
        </div>
        <form class="form-horizontal form-submit" action="{{ route('ordenes.store') }}" method="POST">
          @csrf
          <input type="hidden" name="id_alumno" value="" id="id_alumno">
          <input type="hidden" name="id_usuario_general" value="" id="id_usuario_general">
          <input type="hidden" name="run" value="" id="id_run" required>
          <input type="hidden" name="tipo_usuario" value="1" id="tipo_usuario" required>
          <div class="card-body py-0">

            {{-- <div class="form-group row">
              <label class="col-sm-4 col-form-label">Canal</label>
              <div class="input-group col-sm-8">
                <select class="form-control" name="canal" required> --}}

                  {{-- @foreach ($canales as $key => $value ) --}}
                    {{-- <option value="{{ $key }}">{{ $value }}</option> --}}
                  {{-- @endforeach --}}

                {{-- </select>
              </div>
            </div> --}}
            <div class="card-body">
              <div class="input-group">
                <label class="col-sm-4 col-form-label">Rut del Remitente</label>
                <input type="text" class="form-control" id="rut" name="rut_remitente" placeholder="Ingrese el Rut Alumno..."
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

            <div class="form-group row" id="data_1">
              <label for="fecha" class="col-sm-4 col-form-label">Fecha de emisión</label>
              <div class="input-group date col-sm-8">
                <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" readonly name="fecha_emision" id="fecha_agenda" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha', '<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">Nombre del Remitente</label>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre_remitente" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombre" required>
                {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido_remitente" id="apellido" autocomplete="off" value="{{ old('apellido') }}" placeholder="Apellido">
                {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email del Remitente</label>
              <div class="col-sm-10">
                <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="email_remitente" id="email" value="{{ old('correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();">
                {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="nameEvento" class="col-form-label col-sm-2">Teléfono del Remitente</label>
              <div class="input-group col-sm-10">
                  <input type="tel" class="form-control" name="telefono_remitente" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos">
              </div>
            </div>



            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">Dirección del Remitente</label>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('calle') ? 'is-invalid' : '' }}" name="calle_remitente" id="calle" autocomplete="off" value="{{ old('calle') }}" placeholder="Calle" required>
                {!! $errors->first('calle', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" name="numero_remitente" id="numero" autocomplete="off" value="{{ old('numero') }}" placeholder="Número">
                {!! $errors->first('numero', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            {{-- <div class="form-group row">
              <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Región</label>
              <div class="col-sm-10">
                <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
                </select>
              </div>
            </div> --}}
            {{-- <div class="form-group row">
              <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Comuna</label>
              <div class="col-sm-10">
                <select class="custom-select {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
                </select>
              </div>
              {!! $errors->first('id_comuna', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
            </div> --}}

            <hr>
            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">Nombre del Destinatario</label>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre_destinatario" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombre" required>
                {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido_destinatario" id="apellido" autocomplete="off" value="{{ old('apellido') }}" placeholder="Apellido">
                {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">Dirección del Destinatario</label>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('calle') ? 'is-invalid' : '' }}" name="calle_destinatario" id="calle" autocomplete="off" value="{{ old('calle') }}" placeholder="Calle" required>
                {!! $errors->first('calle', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" name="numero_destinatario" id="numero" autocomplete="off" value="{{ old('numero') }}" placeholder="Número">
                {!! $errors->first('numero', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row" id="data_1">
              <label for="fecha" class="col-sm-4 col-form-label">Fecha de entrega</label>
              <div class="input-group date col-sm-8">
                <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" readonly name="fecha_entrega" id="fecha_agenda" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha', '<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="nameEvento" class="col-form-label col-sm-2">Precio de Envió</label>
              <div class="input-group col-sm-10">
                  <input type="number" class="form-control" name="precio_envio" id="precio" autocomplete="off" maxlength="9" placeholder="Ingrese su precio">
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
              <label for="comentario" class="col-form-label">Comentario o Mensaje de entrega</label>
              <textarea class="form-control  {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" rows="3" name="mensaje" id="comentario_entrada" placeholder="..." maxlength="255" onkeyup="countChars(this,255);">{{ old('descripcion') }}</textarea>
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
<script>
  var comunas = [
    @foreach ($comunas as $c)
      {'name':'{{ $c->nombre }}','id':'{{ $c->id }}','id_region':'{{ $c->id_region}}'},
    @endforeach
  ];
  var regiones = [
    @foreach ($regions as $r)
      {'name':'{{ $r->nombre }}','id_region':'{{ $r->id }}'},
    @endforeach
  ];

  CargarRegiones('select_region')
  CargarComunas();

  function CargarRegiones(selectId){
    var select = $('#'+selectId);
    select.find('option').remove();
    $.each(regiones, function(key,value) {
        select.append('<option value=' + value.id_region + '>' + value.name + '</option>');
    });
  }
  function CargarComunas(){
    var select = $('#select_comuna');
    select.find('option').remove();

    var id_r = document.getElementById("select_region").value;
    var coms = comunas.filter( c => c.id_region==id_r);

    $.each(coms, function(key,value) {
        select.append('<option value=' + value.id + '>' + value.name + '</option>');
    });
  }
  function CargarComunasEdit(){
    var select = $('#select_comuna_edit');
    select.find('option').remove();
    var id_r = document.getElementById("select_region_edit").value;
    var coms = comunas.filter( c => c.id_region==id_r);
    $.each(coms, function(key,value) {
        select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
    });
  }
</script>
@endpush
