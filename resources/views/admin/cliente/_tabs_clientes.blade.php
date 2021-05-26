<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/edit") }}" href="{{ route('admin.cliente.create')  }}">
        <i class="fas fa-user-plus mr-2"></i>
        Nuevo
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente") }}" href="{{ route('admin.cliente.index') }}">
        <i class="fas fa-users mr-2"></i>
        Clientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/eliminados") }}" href="{{ route('admin.cliente.indexDelete') }}">
        <i class="fas fa-users-slash mr-2"></i>
        Eliminados
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-wallet mr-2"></i>
        Ordenes
      </a>
    </li>
  </ul>
</div>