<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("ordenes/pendientes") }}" href="{{ route('ordenes.index.pendientes') }}">
        <i class="fas fa-box mr-2"></i> Pendientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('orden.create') }}">
        <i class="fa fa-plus-circle mr-2"></i> Nueva orden
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("ordenes/asignados*") }}" href="{{ route('ordenes.index.asignados', date('Y-m-d')) }}">
        <i class="fas fa-box mr-2"></i> Asignados
      </a>
    </li>
  </ul>
</div>