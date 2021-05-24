<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab("orden/$orden->codigo") }}" href="{{ route('orden.show',$orden->codigo) }}">
        <i class="fas fa-box mr-2"></i>
        Orden: <strong>{{ $orden->codigo }}</strong>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('orden.create') }}">
        <i class="fa fa-route mr-2"></i> Seguimiento
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link {{ activeTab("ordenes/asignados*") }}" href="{{ route('ordenes.index.asignados', date('Y-m-d')) }}">
        <i class="fas fa-box mr-2"></i> Asignados
      </a>
    </li> --}}
  </ul>
</div>