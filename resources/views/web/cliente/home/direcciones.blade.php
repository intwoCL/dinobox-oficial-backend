@extends('web.cliente.app')
@push('stylesheet')
@endpush
@section('content')

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3">
        Mis direcciones
      </h4>

      <div class="row">
        <div class="col-md-4">
          <div class="card shadow text-center" style="height: 150px;">
            <div class="card-body">
              <div class="pt-4" data-toggle="modal" data-target="#addProduct" type="button">
                <i class="fas fa-plus fa-2x"></i>
                <p class="card-text"><strong>Nueva dirección</strong></p>
              </div>
            </div>
          </div>
        </div>
        @foreach (current_client()->direcciones as $d)
          @include('web.cliente.partials._form')
        @endforeach
      </div>
    </div>
  </div>

  @include('web.cliente.partials._footer')

</div>
@include('web.cliente.home._modal_direccion')
@endsection

@push('extra')
@include('web.cliente.partials._bar_menu_sm')
@endpush
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
  CargarComunas();

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