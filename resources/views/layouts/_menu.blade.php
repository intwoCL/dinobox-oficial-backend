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
        <a href="{{ route('settings.profile') }}" class="d-block">{{ $name }}</a>
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

        <li class="nav-header">Administración</li>

        <li class="nav-item {{ open('admin/departamento*') }}">
          <a href="" class="nav-link">
            <i class="fas fa-boxes nav-icon"></i>
            <p>Orden</p>
          </a>
        </li>

        <li class="nav-item {{ open('admin/departamento*') }}">
          <a href="" class="nav-link">
            <i class="fas fa-chart-bar nav-icon"></i>
            <p>Reportes</p>
          </a>
        </li>

        <li class="nav-item {{ open('admin/sistema*') }}">
          <a href="" class="nav-link">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Configuración</p>
          </a>
        </li>
        <li class="nav-item {{ open('admin/utils*') }}{{ open('admin/reportes/consulta*') }}">
          <a href="" class="nav-link">
            <i class="fas fa-th-large nav-icon"></i>
            <p>Utils</p>
          </a>
        </li>
        <li class="nav-header">Usuarios</li>
        <li class="nav-item {{ open('admin/usuario') }}{{ open('admin/usuario/*') }}">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>Usuarios</p>
          </a>
        </li>
        <li class="nav-header">Clientes</li>
        <li class="nav-item {{ open('admin/cliente') }}{{ open('admin/cliente/*') }}">
          <a href="{{ route('cliente.index') }}" class="nav-link">
            <i class="fas fa-id-card"></i>
            <p>Clientes</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>