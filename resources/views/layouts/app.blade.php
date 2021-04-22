@extends('layouts.skeleton')
@section('app')
@include('layouts._nav')
{{-- @if (auth('usuario')->check())
  @include('layouts._menu')
@else --}}
  @include('layouts._menu_admin')
{{-- @endif --}}

<div class="content-wrapper" style="min-height: 1203.6px;">
  @yield('content')
</div>

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Versión</b> 0.1.0
  </div>
  <strong>Delivery 2021</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
@endsection
