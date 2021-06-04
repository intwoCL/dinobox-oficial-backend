<nav class="navbar fixed-bottom navbar-dark d-none d-sm-block d-md-none d-flex justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 62px !important;">
  <a class="navbar-brand pl-3 pr-2" href="{{ route('web.repartidor.profile') }}" title="Retirar">
    <i class="fa fa-user {{ activeBarMenu('repartidor/home')}}"></i>
  </a>
  <a class="navbar-brand pl-5 pr-2" href="{{ route('web.repartidor.profile.password') }}" title="Despacho">
    <i class="fa fa-lock"></i>
  </a>
  <a class="navbar-brand pl-5 pr-3" href="{{ route('web.repartidor.profile.theme') }}" title="Historial">
    <i class="fa fa-user-edit"></i>
  </a>
</nav>