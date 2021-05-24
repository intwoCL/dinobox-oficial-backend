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
        <div class="card-header">
          <div class="row">
            {{-- <h3 class="card-title">Different Styles</h3> --}}
            <div class="col-md-3">
              <form action="{{ route('ordenes.getDateFecha') }}" method="POST">
                @csrf
                <div class="input-group input-group-sm">
                  <input type="date" name="fecha" class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">IR</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
        @include('orden._table_ordenes_asignadas')
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