@extends('web.repartidor.skeleton')
@section('app')
@include('layouts._nav')
@include('layouts.repartidor._menu')
<div class="content-wrapper" style="min-height: 1203.6px;">
  @yield('content')
</div>
@endsection
