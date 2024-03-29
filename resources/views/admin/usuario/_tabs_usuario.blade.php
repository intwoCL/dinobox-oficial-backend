<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/$u->id") }}" href="{{ route('admin.usuario.show',$u->id) }}">
        <i class="fas fa-user mr-2"></i>
        <strong>{{ $u->present()->nombre_completo() }}</strong>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/usuario/$u->id/edit") }}" href="{{ route('admin.usuario.edit',$u->id) }}">
        <i class="fas fa-edit mr-2"></i>
        Editar
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