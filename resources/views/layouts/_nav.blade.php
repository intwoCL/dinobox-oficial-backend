<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/home" class="nav-link"><i class="fa fa-home"></i> Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('settings.profile') }}" class="nav-link">Perfil</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link bg-primary" data-toggle="dropdown" href="#">
        <i class="far fa-tool"></i> Configuración
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
        <div class="dropdown-divider"></div>
        <a href="{{ route('settings.profile') }}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Perfil
          {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
        </a>
          {{-- <a href="{{ route('tutorial.index') }}" class="dropdown-item">
            <i class="fab fa-youtube text-danger mr-2"></i> Tutorial
            <span class="badge badge-primary mr-3">NEW!!</span>
          </a> --}}

        <div class="dropdown-divider"></div>
        <form action="{{ route('auth.user.logout') }}" method="POST">
          @csrf
          <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Salir</button>
        </form>
      </div>
    </li>
  </ul>
</nav>