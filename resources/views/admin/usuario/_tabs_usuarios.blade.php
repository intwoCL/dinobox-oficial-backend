<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.usuario.create') }}">
        <i class="fa fa-user-plus mr-2"></i> Nuevo Usuario
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/repartidores") }}" href="{{ route('admin.repartidor.index') }}">
        <i class="fas fa-truck mr-2"></i> Repartidores
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario") }}" href="{{ route('admin.usuario.index') }}">
        <i class="fa fa-user mr-2"></i> Usuarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/eliminados") }}" href="{{ route('admin.usuario.indexDelete') }}">
        <i class="fa fa-users-slash mr-2"></i> Usuarios eliminados
      </a>
    </li>
  </ul>
</div>