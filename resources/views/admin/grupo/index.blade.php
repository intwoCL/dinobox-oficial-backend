@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('body', "Listado de Grupo")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        @include('admin.grupo._table_grupo')
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-dark">
        <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.grupo.store') }}"  enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">Nombre<small class="text-danger">*</small></label>
              <div class="col-sm-5">
                <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombres" required>
                {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>

            <div class="form-group row">
              <label for="f1" class="col-form-label col-sm-2">Imagen <small>(Opcional)</small></label>
              <div class="input-group col-sm-10">
                <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                <br>
              </div>
              {!! $errors->first('image','<small class="form-text text-danger text-center">:message</small>') !!}
            </div>
            <div class="form-group center-text">
              <div id="preview"></div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable({
      stateSave: true,
    });

  });
</script>
@endpush