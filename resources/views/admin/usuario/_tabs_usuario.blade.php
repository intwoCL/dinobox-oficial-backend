<div class="col-md-12 pb-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/$u->id/edit") }}" href="{{ route('admin.usuario.edit',$u->id) }}">
        <i class="fas fa-edit mr-2"></i>
        Perfil
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/$u->id/vehiculo") }}" href="{{ route('admin.vehiculo.index',$u->id) }}">
        <i class="fas fa-car mr-2"></i>
        Vehiculos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-wallet mr-2"></i>
        Historico
      </a>
    </li>
  </ul>
</div>