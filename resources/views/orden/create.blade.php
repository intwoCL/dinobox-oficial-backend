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
  <style>
    .circlen {
      border-radius: 0.8em;
      -moz-border-radius: 0.8em;
      -webkit-border-radius: 0.8em;
      color: #ffffff;
      display: inline-block;
      font-weight: bold;
      line-height: 1.6em;
      margin-right: 15px;
      text-align: center;
      width: 1.6em;
    }

  </style>
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('ordenes.index.pendientes'))
  @slot('color', 'dark')
  @slot('body', "Generar Orden")
@endcomponent


<section class="content">
  <div class="row">
    @include('orden._form2')
    <div class="col-md-6">
      @include('components.maps._map3')
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
    document.getElementById('remitente_telefono').value = cliente.telefono;
    document.getElementById('id_cliente').value = cliente.id;
    if (direccion != null) {
      document.getElementById('remitente_direccion').value = direccion.calle;
      document.getElementById('remitente_numero').value = direccion.numero;
      document.getElementById('remitente_correo').value = cliente.correo;
      document.getElementById("select_region").value = direccion.id_region;

      CargarComunaR(direccion.id_comuna);
    } else {
      document.getElementById('remitente_direccion').value = '';
      document.getElementById('remitente_numero').value = '';
      document.getElementById('remitente_correo').value = '';
      document.getElementById("select_region").value = 1000;
    }

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
