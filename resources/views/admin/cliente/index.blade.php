@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('body', "Listado de Clientes")
@endcomponent
<section class="content">
  <div class="row">
    @include('admin.cliente._tabs_clientes')
    <div class="col-md-12">
      <div class="card">
        {{-- <div class="card-header"> --}}
          {{-- <h3 class="card-title">Lista de Usuarios</h3> --}}
          {{-- <a href="{{ route('admin.cliente.indexDelete') }}" class="btn btn-dark float-left btn-sm">
            Clientes eliminados
          </a> --}}
          {{-- @if ($permiso_editar) --}}
          {{-- <a href="{{ route('admin.cliente.create') }}" class="btn btn-success float-right btn-sm">
            Nuevo
          </a> --}}
          {{-- @endif --}}
        {{-- </div> --}}
        @include('admin.cliente._table_clientes')
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