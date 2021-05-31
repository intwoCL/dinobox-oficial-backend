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
    @include('admin.orden._form2')
    <div class="col-md-6">
      {{-- @include('components.maps._map') --}}
    </div>
    {{-- <div class="col-md-6">
      <div class="d-none d-lg-block">
        <img width="100%" style="pointer-events: none;" src="{!! $icon !!}" alt="">
      </div>
    </div> --}}
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
  $(function () {

    $('.clockpicker').clockpicker();
    $('#data_1 .input-group.date').datepicker({
      language: "es",
      format: 'dd-mm-yyyy',
      orientation: "bottom",
      showButtonPanel: true,
      autoclose: true
    });
    $('[data-toggle="tooltip"]').tooltip();
  });

  document.getElementById("text_cliente_rawr").style.display = "none";

  function userHandler(cliente, direccion){
    console.log('cliente',cliente);
    console.log('direccion',direccion);
    // clearForm();

    document.getElementById('remitente_nombre').value = cliente.nombres;
    document.getElementById('remitente_nombre').setAttribute('readonly', true);
    document.getElementById('remitente_correo').value = cliente.coreo;

    document.getElementById('remitente_telefono').value = cliente.telefono;
    // document.getElementById('remitente_telefono').setAttribute('readonly', true);

    document.getElementById('text_c_r').innerHTML = cliente.id;
    document.getElementById("text_cliente_rawr").style.display = "block";
    document.getElementById('id_cliente_rawr').value = cliente.id;

    if (direccion != null) {
      document.getElementById('id_direccion_rawr').value = direccion.id;

      document.getElementById('remitente_direccion').value = direccion.calle;
      document.getElementById('remitente_numero').value = direccion.numero;
      document.getElementById('remitente_correo').value = cliente.correo;
      // document.getElementById('remitente_correo').setAttribute('readonly', true);

      document.getElementById("select_region").value = direccion.id_region;

      CargarComunaR(direccion.id_comuna);
    } else {
      // document.getElementById("text_cliente_rawr").style.display = "none";
      document.getElementById('id_cliente_rawr').value = '';
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
  CargarRegiones('select_region');
  CargarComunas();

  //Destinatario
  CargarRegiones2('select_region2');
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
</script>
@endpush
