
@php
  function active($url){ return request()->is($url) ? 'active' : '';}
@endphp

@extends('web.votacionOnline.skeleton')
@section('app')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">{{ current_votacion_online()->votacion->nombre }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item {{ active('web/votacion/registro') }}">
          <a class="nav-link" href="{{ route('web.votacion.registro') }}">Registro
            <span class="sr-only">(current)</span>
          </a>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('web.evento.signOut') }}">Salir</a>
        </li> --}}
      </ul>
    </div>
  </div>
</nav>

@yield('content')

@endsection