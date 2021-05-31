@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('body', "Ordenes pendientes")
@endcomponent
<section class="content">
  <div class="row">
    @include('admin.orden._tabs_ordenes')
    <div class="col-md-12">
      <div class="card">
        @include('admin.orden._table_ordenes')
      </div>
    </div>
  </div>
</section>

{{-- <h1>{{ session('codigo') }}</h1> --}}

@include('admin.orden._modal_vincular')
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    var codigo_global = "";
    $("#tableSelect").DataTable();
    $("#tableUsuario").DataTable();

    $('#assignModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var codigo = button.data('codigo');
      codigo_global = codigo;
    });

    $('#assignModalConfirmacion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var repartidor = button.data('repartidor');
      var nombre = button.data('nombre');
      var mensaje = "<p> Seleccionar a <strong>" + nombre + "</strong> a la orden <strong>" + codigo_global + "</strong></p>";
      modal.find('#modal_text_content').html(mensaje);
      modal.find('#repartidor_modal').val(repartidor);
      modal.find('#codigo_modal').val(codigo_global);
    });
  });
</script>
@endpush