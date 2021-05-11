@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('body', "Ordenes")
@endcomponent
<section class="content">
  <div class="row">
    @include('orden._tabs_orden')
    <div class="col-md-12">
      <div class="card">
        @include('orden._table_ordenes')
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