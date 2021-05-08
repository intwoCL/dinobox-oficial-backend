<div class="col-md-12 pb-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/$c->id/edit") }}" href="{{ route('admin.cliente.edit',$c->id) }}">
        <i class="fas fa-edit mr-2"></i>
        Editar
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/$c->id/direccion") }}" href="{{ route('admin.cliente.direccion.index', $c->id) }}">
        <i class="fas fa-car mr-2"></i>
        Direcciones
      </a>
    </li>
  </ul>
</div>