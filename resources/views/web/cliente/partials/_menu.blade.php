<h4 class="d-flex justify-content-between align-items-center mb-3">
  <span class="text-muted">Mi cuenta</span>
  <span class="badge badge-secondary badge-pill"></span>
</h4>
<div class="card card-widget widget-user-2">
  <div class="widget-user-header">
    <div class="widget-user-image">
      <img class="img-circle elevation-2"  src="/dist/img/dinobox-icon1.png"  alt="User Avatar">
    </div>
    <h3 class="widget-user-username">{{ current_client()->nombre . ' ' .current_client()->apellido}}</h3>
    <h5 class="widget-user-desc">{{ current_client()->correo }}</h5>
  </div>
  <div class="card-body ">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('profile.cliente') }}" class="nav-link">
          <div class="fas fa-user-circle mr-2"></div>
          Perfil
          {{-- <span class="float-right badge bg-primary">31</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profile.password') }}" class="nav-link">
          <div class="fas fa-lock mr-2"></div>
          Contraseña
          {{-- <span class="float-right badge bg-success">12</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profile.direcciones') }}" class="nav-link">
          <i class="fas fa-home mr-2"></i>
          Direcciones
          {{-- <span class="float-right badge bg-info">5</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profile.historial') }}" class="nav-link">
          <div class="fas fa-history mr-2"></div>
          Ordenes
          {{-- <span class="float-right badge bg-success">12</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profile.historial') }}" class="nav-link">
          <div class="fas fa-search mr-2"></div>
          Seguimiento de mis Ordenes
          {{-- <span class="float-right badge bg-success">12</span> --}}
        </a>
      </li>
      <br>

      <li class="nav-item">
        <form action="{{ route('cliente.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            Cerrar sesión
          </button>
        </form>

        @include('layouts._menu_main_cliente')
      </li>
    </ul>
  </div>
</div>

{{-- <form class="card p-2">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Promo code">
    <div class="input-group-append">
      <button type="submit" class="btn btn-secondary">Redeem</button>
    </div>
  </div>
</form> --}}