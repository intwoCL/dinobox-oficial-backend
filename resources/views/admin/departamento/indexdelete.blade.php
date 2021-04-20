@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('admin.departamento.index'))
  @slot('color', 'secondary')
  @slot('body', 'Departamentos <strong>Eliminados</strong>')
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body table-responsive">
          @include('admin.departamento._table_departamentos')
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