<h4 class="d-flex justify-content-between align-items-center mb-3">
  Mi cuenta
</h4>
<div class="card card-widget widget-user-2">
  <div class="widget-user-header">
    <div class="widget-user-image">
      <img class="img-circle elevation-2"  src="/dist/img/dinobox-icon1.png"  alt="User Avatar">
    </div>
    <h3 class="widget-user-username">{{ current_client()->nombre . ' ' .current_client()->apellido}}</h3>
    <h5 class="widget-user-desc">{{ current_client()->correo }}</h5>
  </div>
  <div class="card-body">
    <div class="list-group">
      <a href="{{ route('profile.cliente') }}" class="list-group-item list-group-item-action {{ activeTab('profile/cliente') }}">
        <div class="fas fa-user-circle fa-fw mr-2" aria-hidden="true"></div>
        Perfil
      </a>
      <a href="{{ route('profile.password') }}" class="list-group-item list-group-item-action {{ activeTab('profile/password') }}">
        <div class="fas fa-user-lock fa-fw mr-2" aria-hidden="true"></div>
        Contraseña
      </a>
      <a href="{{ route('profile.direcciones') }}" class="list-group-item list-group-item-action {{ activeTab('profile/direcciones*') }}">
        <div class="fas fa-home fa-fw mr-2" aria-hidden="true"></div>
        Direcciones
      </a>
      <a href="{{ route('profile.historial') }}" class="list-group-item list-group-item-action {{ activeTab('profile/historial') }}{{ activeTab('profile/seguimiento*') }}">
        <div class="fas fa-history fa-fw mr-2" aria-hidden="true"></div>
        Ordenes
      </a>
    </div>
    <ul class="nav flex-column">

      <li class="nav-item">
        <form action="{{ route('cliente.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            Cerrar sesión
          </button>
        </form>

      </li>
      @include('layouts._menu_main_cliente')
    </ul>
  </div>
</div>