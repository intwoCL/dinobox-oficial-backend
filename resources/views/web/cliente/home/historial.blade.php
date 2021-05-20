@extends('web.cliente.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">

  <style>
    body {
      background-color: #fafaf8;
    }
  </style>
@endpush
@section('content')

@include('web.cliente.home._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.home._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3">Historial de movimientos</h4>
      @include('web.cliente.home._list')
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
@endsection
@push('javascript')

@endpush