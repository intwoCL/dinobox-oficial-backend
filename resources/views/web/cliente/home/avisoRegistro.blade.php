@extends('web.cliente.app')
@push('stylesheet')
<style>
    .intro-section {
      background-image: url("dist/img/dinobox-fondo.png");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 500px;
      /* padding: 75px 95px; */
      /* min-height: 100vh; */
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      flex-direction: column;
      color: #ffffff;
    }
    .abs-center {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
</style>
@endpush
@section('content')
@include('layouts._nav2')

@include('web.cliente.partials._aviso')

<footer role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="/dist/img/svg/undraw_takeout_boxes.svg" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Delivery</h6>
      <small>v 0.1.0</small>
    </div>
  </div>
</footer>

@endsection
@push('javascript')

@endpush