@extends('web.cliente.app')
@section('content')
@push('stylesheet')
  <style>
    body {
      background-color: #fafaf8;
    }
  </style>
@endpush

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      @component('components.button._back2')
        @slot('route', route('profile.direcciones'))
        @slot('color', 'secondary')
        @slot('body', 'Editar dirección')
      @endcomponent
      <div class="card">
        <div class="card-body">
          @include('web.cliente.partials._direccionEdit')
        </div>
      </div>
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
  
  //Modal Create
  CargarRegiones('select_region')
  // CargarComunas();
  document.getElementById("select_region").value = {{ $d->comuna->id_region}};
  CargarComunaR({{ $d->id_comuna }});

  //Create
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
</script>
@endpush