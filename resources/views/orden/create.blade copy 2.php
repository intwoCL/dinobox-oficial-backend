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
        @foreach ($errors->all() as $error)
        <span class="badge badge-primary">{{ $error }}</span>
        @endforeach
        <form class="form-horizontal form-submit" action="{{ route('orden.store') }}" method="POST">
          @csrf
          <input type="hidden" name="id_cliente" value="" id="id_cliente" required>
          <div class="card-body">
            <h5><strong>Datos Remitente:</strong></h5>
            {{-- <strong>Datos remitente</strong> --}}

            <div class="form-group row" id="data_1">
              <label for="fecha" class="col-sm-2 col-form-label">Fecha Entrega<small class="text-danger">*</small></label>
              <div class="input-group date col-sm-10">
                <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control" readonly name="fecha_entrega" id="fecha_entrega" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha_entrega','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>

            {{-- <div class="form-group row">
              <label for="fecha" class="col-sm-3 col-form-label">Fecha Entrega<small class="text-danger">*</small></label>
              <div class="input-group date col-sm-5">
                <input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega" required value="{{ $fecha }}">
              </div>
              <div class="col-sm-12">
                {!! $errors->first('fecha_entrega','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div> --}}

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre(s)<small class="text-danger">*</small></label>
              <div class="input-group col-sm-10">
                <input type="text" class="form-control {{ $errors->has('remitente_nombre') ? 'is-invalid' : '' }}" aria-label="Recipient's username" name="remitente_nombre" id="remitente_nombre" autocomplete="off" value="{{ old('remitente_nombre') }}" aria-describedby="button-addon2" placeholder="Nombre" required>

                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" id="button-addon2" data-toggle="modal" data-target="#modalFind">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
              <span class="col-md-12">
                <small id="error" class="text-danger"></small>
                <small id="success" class="text-success"></small>
              </span>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label class=" col-form-label">Región<small class="text-danger">*</small></label>
                <div class="input-group">
                  <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="col-form-label">Comuna<small class="text-danger">*</small></label>
                <div class="input-group">
                  <select class="custom-select {{ $errors->has('remitente_id_comuna') ? 'is-invalid' : '' }}" name='remitente_id_comuna' id="select_comuna">
                  </select>
                </div>
                {!! $errors->first('remitente_id_comuna','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label>Dirección<small class="text-danger">*</small></label>
                <input type="text" class="form-control {{ $errors->has('remitente_direccion') ? 'is-invalid' : '' }}" name="remitente_direccion" id="remitente_direccion" autocomplete="off" value="{{ old('remitente_direccion') }}" placeholder="Dirección" required>
                {!! $errors->first('remitente_direccion','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-md-6">
                <label>Número<small class="text-danger">*</small></label>
                <input type="text" class="form-control {{ $errors->has('remitente_numero') ? 'is-invalid' : '' }}" name="remitente_numero" id="remitente_numero" autocomplete="off" value="{{ old('remitente_numero') }}" placeholder="1234" required>
                {!! $errors->first('remitente_numero','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label>Correo<small class="text-danger">*</small></label>
                <input type="mail" class="form-control {{ $errors->has('remitente_correo') ? 'is-invalid' : '' }}" name="remitente_correo" id="remitente_correo" value="{{ old('remitente_correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                {!! $errors->first('remitente_correo', '<small class="form-text text-danger">:message</small>') !!}
              </div>
              <div class="col-md-6">
                <label>Teléfono<small class="text-danger">*</small></label>
                <input type="tel" class="form-control" name="remitente_telefono" id="remitente_telefono" autocomplete="off" maxlength="9" placeholder="Ingrese teléfono aqui..." value="{{ old('remitente_telefono') }}" required>
                {!! $errors->first('remitente_telefono','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>

            <hr>
            <h6><strong>Datos Destinatario:</strong></h6>
            <br>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre(s)<small class="text-danger">*</small></label>
              <div class="input-group col-sm-10">
                <input type="text" class="form-control {{ $errors->has('destinatario_nombre') ? 'is-invalid' : '' }}" name="destinatario_nombre" id="destinatario_nombre" autocomplete="off" value="{{ old('destinatario_nombre') }}" placeholder="Nombre" required>
              </div>
              <div class="col-sm-12">
                {!! $errors->first('destinatario_nombre','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label class=" col-form-label">Región<small class="text-danger">*</small></label>
                <div class="input-group">
                  <select class="custom-select" id="select_region2" name="region" onChange="CargarComunas2()">
                  </select>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="" class="col-form-label">Comuna<small class="text-danger">*</small></label>
                <div class="input-group">
                  <select class="custom-select {{ $errors->has('destinatario_id_comuna') ? 'is-invalid' : '' }}" name='destinatario_id_comuna' id="select_comuna2">
                  </select>
                </div>
                {!! $errors->first('destinatario_id_comuna','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label>Dirección<small class="text-danger">*</small></label>
                <input type="text" class="form-control {{ $errors->has('destinatario_direccion') ? 'is-invalid' : '' }}" name="destinatario_direccion" id="destinatario_direccion" autocomplete="off" value="{{ old('destinatario_direccion') }}" placeholder="Dirección" required>
                {!! $errors->first('destinatario_direccion','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
              <div class="col-md-6">
                <label>Número/piso<small class="text-danger">*</small></label>
                <input type="text" class="form-control {{ $errors->has('destinatario_numero') ? 'is-invalid' : '' }}" name="destinatario_numero" id="destinatario_numero" autocomplete="off" value="{{ old('destinatario_numero') }}" placeholder="1234" required>
                {!! $errors->first('destinatario_numero','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Correo<small class="text-danger">*</small></label>
                <input type="mail" class="form-control {{ $errors->has('destinatario_correo') ? 'is-invalid' : '' }}" name="destinatario_correo" id="destinatario_correo" value="{{ old('destinatario_correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Teléfono<small class="text-danger">*</small></label>
                <input type="tel" class="form-control" name="destinatario_telefono" id="destinatario_telefono" autocomplete="off" maxlength="9" placeholder="Ingrese teléfono aqui..." required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Precio</label>
              <div class="input-group col-sm-10">
                <input type="tel" class="form-control" name="precio" id="precio" autocomplete="off" maxlength="9" placeholder="0" required>
              </div>
              {!! $errors->first('precio', '<small class="form-text text-danger">:message</small>') !!}
              <p id="limitC"></p>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tipo de envio</label>
              <div class="input-group col-sm-10">
                <select class="custom-select" id="tipo_envio" name="tipo_envio">
                  @foreach ($tiposEnvios as $key => $value)
                  @continue(!$value[2])
                  <option value="{{ $key }}">{{ $value[0] }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="comentario" class="col-form-label">Mensaje</label>
              <textarea class="form-control  {{ $errors->has('mensaje') ? 'is-invalid' : '' }}" rows="3" name="mensaje" id="mensaje" placeholder="..." maxlength="255" onkeyup="countChars(this,255);">{{ old('mensaje') }}</textarea>
              {!! $errors->first('mensaje', '<small class="form-text text-danger">:message</small>') !!}
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

    document.getElementById('remitente_nombre').value = cliente.nombres;
    document.getElementById('id_cliente').value = cliente.id;
    if (direccion) {
      document.getElementById('remitente_direccion').value = direccion.calle + ' ' + direccion.numero;
      document.getElementById('remitente_correo').value = cliente.correo;
      document.getElementById("select_region").value = direccion.id_region;
      CargarComunaR(direccion.id_comuna);
    }

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
  //Mejorar sección con Vue
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

  //Remitente
  CargarRegiones('select_region')
  CargarComunas();

  //Destinatario
  CargarRegiones2('select_region2')
  CargarComunas2();

  //Remitente
  function CargarRegiones(selectId){
    var select = $('#'+selectId);
    select.find('option').remove();
    $.each(regiones, function(key,value) {
        select.append('<option value=' + value.id_region + '>' + value.name + '</option>');
    });
  }

  function CargarComunaR(id){
    var select = $('#select_comuna');
    select.find('option').remove();

    var id_r = document.getElementById("select_region").value;
    var coms = comunas.filter( c => c.id_region==id_r);

    $.each(coms, function(key,value) {
        if (value.id == id) {
          select.append('<option selected value=' + value.id + '>' + value.name + '</option>');
        } else {
          select.append('<option value=' + value.id + '>' + value.name + '</option>');
        }
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

  //Destinatario
  function CargarRegiones2(selectId){
    var select = $('#'+selectId);
    select.find('option').remove();
    $.each(regiones, function(key,value) {
        select.append('<option value=' + value.id_region + '>' + value.name + '</option>');
    });
  }
  function CargarComunas2(){
    var select = $('#select_comuna2');
    select.find('option').remove();

    var id_r = document.getElementById("select_region2").value;
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
