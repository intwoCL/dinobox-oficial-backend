@include('layouts._menu_main')
<li class="nav-header">Gestión</li>
<li class="nav-item {{ open('orden*') }}">
  <a href="{{ route('ordenes.index.pendientes') }}" class="nav-link">
    <i class="fas fa-boxes nav-icon"></i>
    <p>Orden</p>
  </a>
</li>

<li class="nav-header">Administración</li>

<li class="nav-item {{ open('admin/sistema*') }}">
  <a href="{{ route('admin.sistema.index') }}" class="nav-link">
    <i class="fas fa-cogs nav-icon"></i>
    <p>Configuración</p>
  </a>
</li>

<li class="nav-item {{ open('admin/usuario') }}{{ open('admin/usuario/*') }}">
  <a href="{{ route('admin.usuario.index') }}" class="nav-link">
    <i class="fas fa-user-circle nav-icon"></i>
    <p>Usuarios</p>
  </a>
</li>

<li class="nav-item {{ open('admin/repartidores') }}">
  <a href="{{ route('admin.repartidor.index') }}" class="nav-link">
    <i class="fas fa-people-carry nav-icon"></i>
    <p>Repartidor</p>
  </a>
</li>

<li class="nav-item {{ open('admin/cliente') }}{{ open('admin/cliente/*') }}">
  <a href="{{ route('admin.cliente.index') }}" class="nav-link">
    <i class="fas fa-users nav-icon"></i>
    <p>Clientes</p>
  </a>
</li>