@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendor/input/css/amsify.suggestags.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('admin.utils.index'))
  @slot('color', 'primary')
  @slot('body', "Consultas Query")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">Lista de Departamentos</h3>
        </div> --}}
        <div class="card-body table-responsive">
          <table id="example1" class="table table-hover table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($consultas as $c)
              <tr>
                <td>
                  <a href="{{ route('admin.reportes.consulta.show',$c->id) }}">{{ $c->id }}</a>
                </td>
                <td>{{ $c->nombre }}</td>
                <td>{{ $c->descripcion }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-info">
        {{-- <div class="card-header bg-info">
          <h3 class="card-title">Formulario Query</h3>
        </div> --}}
        <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.reportes.consulta.store') }}">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="inputNombres" class="col-sm-3 col-form-label">Nombre</label>
              <div class="col-sm-9">
                <input type="text" class="form-control {{ $errors->has('nombre_consulta') ? 'is-invalid' : '' }}" autocomplete="off" name="nombre_consulta" value="{{ old('nombre_consulta') }}" id="inputNombres" placeholder="Nombre departamento" required>
                {!! $errors->first('nombre_consulta','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-12 col-form-label">Descripción</label>
              <div class="col-sm-12">
                <textarea name="descripcion" id="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" cols="10" rows="2" required>{{ old('descripcion') }}</textarea>
                {!! $errors->first('descripcion','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNombres" class="col-sm-12 col-form-label">Tags <small>(Separar por ,)</small></label>
              <div class="col-sm-12">
                <input type="text" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags" value="{{ old('tags') }}" id="tags" placeholder="" required>
                {!! $errors->first('tags','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>
            </div>
          </div>
          <div class="card-footer">
            {{-- <a href="{{ route('departamento.index') }}" class="btn btn-danger">Volver</a> --}}
            <button type="submit" class="btn btn-success float-right">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<!-- Amsify Plugin -->
<script type="text/javascript" src="/vendor/input/js/jquery.amsify.suggestags.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    });
  });

  $('input[name="tags"]').amsifySuggestags({
    type : 'amsify',
    suggestions: [
      @foreach ($tags as $t)
      '{{ $t->nombre }}',
      @endforeach
    ],
    whiteList: false
  });
</script>

@endpush