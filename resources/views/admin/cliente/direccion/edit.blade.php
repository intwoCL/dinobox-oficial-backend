@extends('layouts.app')
@section('content')
@push('stylesheet')
<style>
  .dropdown-toggle::after {
      display: none;
  }
</style>
@endpush
@component('components.button._back')
  @slot('route', route('admin.cliente.direccion.index', $c->id))
  @slot('color', 'secondary')
  @slot('body', "Dirección Cliente <strong>".$c->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Direcciones</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.cliente.direccion.update',$c->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Calle</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('calle') ? 'is-invalid' : '' }}" name="calle" id="calle" autocomplete="off" value="{{ old('calle') }}" placeholder="Calle" required>
                  {!! $errors->first('calle', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" name="numero" id="numero" autocomplete="off" value="{{ old('numero') }}" placeholder="Número">
                  {!! $errors->first('numero', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Región</label>
                <div class="col-sm-10">
                  <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Comuna</label>
                <div class="col-sm-10">
                  <select class="custom-select {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
                  </select>
                </div>
                {!! $errors->first('id_comuna', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
              </div>
              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Datos adicionales</label>
                <div class="input-group col-sm-10">
                  <textarea class="form-control {{ $errors->has('dato_adicional') ? 'is-invalid' : '' }}" name="dato_adicional" id="textarea-input" rows="4" placeholder="" value="{{ old('dato_adicional') }}"></textarea>
                  {!! $errors->first('dato_adicional','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
                <div class="input-group col-sm-10">
                  <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos">
                </div>
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