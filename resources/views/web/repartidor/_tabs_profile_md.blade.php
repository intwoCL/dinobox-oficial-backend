<div class="col-md-12 d-none d-md-block d-sm-none">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link  {{ activeTab("repartidor/profile") }}" href="{{ route('web.repartidor.profile') }}">
        <i class="fas fa-user mr-2"></i>
        {{ $u->nombre }}
        {{-- Actualizar --}}
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-box mr-2"></i>
        Cambiar contraseña
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-box mr-2"></i>
        Tema
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-box mr-2"></i>
        Vehiculo
      </a>
    </li>
  </ul>
</div>