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

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}

.container {
    margin-top: 100px;
    margin-bottom: 50px
}
</style>
@endpush
@section('content')
@include('layouts._nav2')
@include('web.cliente.partials._buscarCodigo')

  @include('web.cliente.partials._orden')

{{-- @include('web.cliente.partials._indexFooter') --}}
@endsection
@push('javascript')

@endpush