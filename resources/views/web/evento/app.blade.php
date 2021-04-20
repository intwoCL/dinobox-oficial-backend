
@php
  function active($url){ return request()->is($url) ? 'active' : '';}
@endphp

@extends('web.evento.skeleton')
@section('app')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">{{ current_stand()->evento->nombre }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ active('web/evento/registro') }}">
          <a class="nav-link" href="{{ route('web.evento.registro') }}">Registro
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @if (current_stand()->inscribir_visita)
        <li class="nav-item {{ active('web/evento/visita') }}">
          <a class="nav-link" href="{{ route('web.evento.visita') }}">Registro Visita</a>
        </li>
          @if (current_stand()->cantidad > 1)
          <li class="nav-item {{ active('web/evento/visitas') }}">
            <a class="nav-link" href="{{ route('web.evento.visitas') }}">Visitas</a>
          </li>
          @endif
        @endif
        @if (current_stand()->view_reportes)
        <li class="nav-item {{ active('web/evento/reporte') }}">
          <a class="nav-link" href="{{ route('web.evento.reporte') }}">Reportes</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('web.evento.signOut') }}">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@yield('content')

@endsection