@extends('web.home.layouts.skeleton')
@section('app')
@include('web.home.layouts._nav_index')
@include('web.home._form_buscar_orden')
@yield('content')

@endsection