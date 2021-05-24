@php
  function active($url){ return request()->is($url) ? 'active' : '';}
  function open($url){ return request()->is($url) ? 'menu-open' : '';}
  $name = current_user()->nombre;
  $img = current_user()->present()->getPhoto();
@endphp
<aside class="main-sidebar sidebar-dark- elevation-4">
  <a href="" class="brand-link bg-primary">
    <span class="brand-text font-weight-light">Panel</span>
    <span class="brand-text"><b> Administrativo</b></span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ $img }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{  route('repartidor.me') }}" class="d-block">{{ $name }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ open('home*') }}">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

        @include('layouts.repartidor._menu_repartidor')
      </ul>
    </nav>
  </div>
</aside>