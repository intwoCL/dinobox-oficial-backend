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

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    /* background: #FF5722 */
    background:#0F860C;
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 60px;
    height: 60px;
    line-height: 70px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

.btn-warning {
    color: #ffffff;
    background-color: #403df5;
    border-color: #403df5;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #031161;
    border-color: #031161;
    border-radius: 1px
}
</style>
@endpush
@section('content')
@include('layouts._nav2')
@include('web.cliente.partials._buscarCodigo')

@if ($orden->getCategoria() == 'Local')
  @include('web.cliente.partials._seguimiento')    
@else

@endif

{{-- @include('web.cliente.partials._indexFooter') --}}
@endsection
@push('javascript')

@endpush