<div class="col-md-12 pb-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("orden/edit") }}" href="{{ route('ordenes.create')  }}">
        <i class="fas fa-box-open mr-2"></i></i>
        Nueva Orden
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("orden/cliente") }}" href="{{ route('ordenes.index') }}">
        <i class="fas fa-box mr-2"></i></i>
        Orden
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link {{ activeTab("admin/cliente/eliminados") }}" href="{{ route('admin.cliente.indexDelete') }}">
        <i class="fas fa-users-slash mr-2"></i>
        Eliminados
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-wallet mr-2"></i>
        Historico
      </a>
    </li> --}}
  </ul>
</div>