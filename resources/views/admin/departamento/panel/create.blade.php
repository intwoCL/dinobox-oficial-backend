@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('admin.departamento.show',$d->id))
  @slot('color', 'secondary')
  @slot('body', "Departamento - Panel <u>$d->nombre</u>")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de usuarios en el departamento</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="tableSelect" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre de Usuario</th>
              <th>Correo</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $u)
                <tr>
                  <td>{{ $u->present()->nombre_completo() }}</td>
                  <td>{{ $u->correo }}</td>
                  <td>
                    <a href="{{ route('admin.departamentousuario.assign', [$d->id, $u->id]) }}" class="btn btn-success btn-block btn"></i> Seleccionar</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush