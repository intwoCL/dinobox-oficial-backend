@extends('web.cliente.app')
@push('stylesheet')

  <style>
    body {
      background-color: #fafaf8;
    }
  </style>
@endpush
@section('content')

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3">Mis direcciones</h4>

      <button class="btn btn-sm btn-primary"
        data-toggle="modal"
        data-target="#addProduct"
        >Añadir dirección
      </button>
      <br><br>
      @include('web.cliente.partials._modal_add_direction')

      @foreach (current_client()->direcciones as $d)
      
      @include('web.cliente.partials._form')

      @endforeach

    </div>
  </div>

  @include('web.cliente.partials._footer')
  
</div>
@endsection
@push('javascript')
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