@extends('web.cliente.app')
@push('stylesheet')

@endpush
@section('content')

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3">
        <strong>Ordenes</strong>
      </h4>
      @include('web.cliente.home._table_ordenes')
    </div>
  </div>

  @include('web.cliente.partials._footer')

</div>
@endsection
@push('javascript')

@endpush