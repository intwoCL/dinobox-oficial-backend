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

@include('web.cliente.partials._indexFooter')

@endsection
@push('javascript')

@endpush