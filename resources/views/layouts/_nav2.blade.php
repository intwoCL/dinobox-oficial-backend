<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark tutorial-youtube">
  <button class="navbar-toggler p-0 border-0 mr-2" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand mr-auto mr-lg-4 ml-lg-4" href="#">
    INTWO-Delivery
    {{-- Insertar imagen --}}
  </a>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Buscar orden <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Notifications</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Switch account</a>
      </li> --}}
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Usuario</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> --}}
    </ul>
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
    <div class="form-inline my-2 my-lg-0 mr-4">
      {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> --}}
      <a href="{{ route('auth.usuario') }}" class="btn btn-primary btn-sm my-2 my-sm-0">Iniciar sesión</a>
    </div>
    <div class="form-inline my-2 my-lg-0 mr-4">
      {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> --}}
      <a href="{{ route('cliente.login') }}" class="btn btn-primary btn-sm my-2 my-sm-0">Login cliente</a>
    </div>
    <form action="{{ route('cliente.logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary btn-sm my-2 my-sm-0">Cerrar sesión</button>
    </form>
  </div>
</nav>