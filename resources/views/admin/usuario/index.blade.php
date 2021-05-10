@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('body', "Usuarios")
@endcomponent
<section class="content">
  <div class="row">
    @include('admin.usuario._tabs_usuarios')
    <div class="col-md-12">
      <div class="card">
        {{-- <div class="card-header">
          <a href="{{ route('admin.usuario.create') }}" class="btn btn-success float-right btn-sm">
            Nuevo
          </a>
        </div> --}}
        @include('admin.usuario._table_usuarios')
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