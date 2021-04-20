@php
  function active($url){ return request()->is($url) ? 'active' : '';}
  function open($url){ return request()->is($url) ? 'menu-open' : '';}
  $name = auth('admin')->user()->nombre;
@endphp
<aside class="main-sidebar sidebar-dark-dark elevation-4">
  <a href="" class="brand-link bg-danger">
    <span class="brand-text font-weight-light">Panel</span>
    <span class="brand-text"><b> Administrativo</b></span>
  </a>
  <div class="sidebar">
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
      {{-- <div class="info"> --}}
        {{-- <a href="/perfil" class="brand-text"><b>{{ $name }}</b></a> --}}
      {{-- </div> --}}
    {{-- </div> --}}
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item {{ open('admin/home*') }}">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

        <li class="nav-header">Administración</li>
        <li class="nav-item {{ open('admin/usuario') }}{{ open('admin/usuario/*') }}">
          <a href="{{ route('admin.usuario.index') }}" class="nav-link">
            <i class="fas fa-house-user nav-icon"></i>
            <p>Colaboradores</p>
          </a>
        </li>

        <li class="nav-item {{ open('admin/departamento*') }}">
          <a href="{{route('admin.departamento.index')}}" class="nav-link">
            <i class="fas fa-network-wired nav-icon"></i>
            <p>Departamentos</p>
          </a>
        </li>

        <li class="nav-item {{ open('admin/sistema*') }}">
          <a href="{{route('admin.sistema')}}" class="nav-link">
            <i class="fas fa-cogs nav-icon"></i>
            <p>Configuración</p>
          </a>
        </li>
        <li class="nav-item {{ open('admin/utils*') }}{{ open('admin/reportes/consulta*') }}">
          <a href="{{route('admin.utils.index')}}" class="nav-link">
            <i class="fas fa-th-large nav-icon"></i>
            <p>Utils</p>
          </a>
        </li>
        <li class="nav-header">Usuarios</li>
        <li class="nav-item {{ open('admin/alumno*') }}">
          <a href="{{ route('admin.alumno.index') }}" class="nav-link">
            <i class="fas fa-user-graduate nav-icon"></i>
            <p>Alumnos</p>
          </a>
        </li>
        <li class="nav-item {{ open('admin/usuarioGeneral*') }}">
          <a href="{{ route('admin.usuarioGeneral.index') }}" class="nav-link">
            <i class="far fa-user nav-icon"></i>
            <p>Usuarios</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>