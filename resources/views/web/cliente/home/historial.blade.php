@extends('web.cliente.app')
@push('stylesheet')

  <style>
    body {
      background-color: #fafaf8;
    }

    .W-5 {
      display: flex;
      position: relative;
    }
  </style>
@endpush
@section('content')

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3">Ordenes</h4>
      @include('web.cliente.partials._list')
    </div>
  </div>

  @include('web.cliente.partials._footer')
  
</div>
@endsection
@push('javascript')

@endpush