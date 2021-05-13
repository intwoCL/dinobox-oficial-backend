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
    @include('orden._tabs_ordenes')
    <div class="col-md-12">
      <div class="card">
        @include('orden._table_ordenes')
      </div>
    </div>
  </div>
</section>


@include('orden._modal_vincular')
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();

    $('#assignModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var id = button.data('alumno');
      var url = "123123";
      modal.find('.modal-title').text('¿Desea asignar el alumno?');
      modal.find('.modal-body input').val(id);
      modal.find('#formAssign').attr('action',url);
    });
  });
</script>
@endpush