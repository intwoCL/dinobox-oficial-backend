<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/$c->id/edit") }}" href="{{ route('admin.cliente.edit',$c->id) }}">
        <i class="fas fa-edit mr-2"></i>
        Editar
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/$c->id/direccion") }}" href="{{ route('admin.cliente.direccion.index', $c->id) }}">
        <i class="fas fa-map-marked mr-2"></i>
        Direcciones
      </a>
    </li>
    @if (activeTab("admin/cliente/$c->id/direccion*"))
    <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/$c->id/direccion/create") }}" href="{{ route('admin.cliente.direccion.create', $c->id) }}">
        <i class="fas fa-plus mr-2"></i>
        Nueva dirección
      </a>
    </li>
    @endif

    {{-- <li class="nav-item">
      <div class="btn-group dropright nav-link {{ activeTab("admin/cliente/$c->id/direccion*") }}">
        <span type="button" class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-map-marked mr-2"></i>
          Direcciones
        </span>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.cliente.direccion.index', $c->id) }}">
            Direcciones
          </a>
          <a class="dropdown-item" href="{{ route('admin.cliente.direccion.create', $c->id) }}">
            Nueva dirección
          </a>
        </div>
      </div>
    </li> --}}
  </ul>
</div>