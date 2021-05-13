<div class="col-md-12 pb-3">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('orden.create') }}">
        <i class="fa fa-plus-circle mr-2"></i> Nueva orden
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("ordenes") }}" href="{{ route('ordenes.index.pendientes') }}">
        <i class="fas fa-box mr-2"></i> Pendientes
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab("ordenes/asignados", date('Y-m-d') ) }}" href="{{ route('ordenes.index.asignados', date('Y-m-d')) }}">
        <i class="fas fa-box mr-2"></i> Asignados
      </a>
    </li>
  </ul>
</div>