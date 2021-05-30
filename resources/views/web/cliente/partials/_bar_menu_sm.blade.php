<nav class="navbar text-sm fixed-bottom navbar-dark bg-primary d-none d-sm-block d-md-none d-flex justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 70px !important;">
  <a class="navbar-brand pl-3 pr-2 text-center" href="{{ route('web.cliente.cliente') }}" title="Perfil">
    <i class="fa fa-user-circle {{ activeBarMenu('repartidor/home')}}"></i>
    {{-- <small class="">
      Perfil
    </small> --}}
  </a>
  <a class="navbar-brand pl-5 pr-2 text-center" href="{{ route('web.cliente.direcciones') }}" title="Direcciones">
    <i class="fa fa-lock"></i>
    {{-- <div> --}}
      {{-- <small>Direcciones</small> --}}
    {{-- </div> --}}
  </a>
  <a class="navbar-brand pl-5 pr-3  text-center" href="" title="Historial">
    <i class="fa fa-history"></i>
    {{-- <div> --}}

      {{-- <small>Ordenes</small> --}}
    {{-- </div> --}}
    {{-- <small>Cancel Reservation</small> --}}
  </a>

  {{-- <button class='btn' style='background-color:transparent;'>
    <div style='text-align:center;'><i class="fa fa-times"></i></div>
      Cancel Reservation
  </button>
    <button class='btn' style='background-color:transparent;'>
    <div style='text-align:center;'><i class="fa fa-times"></i></div>
      Cancel Reservation
  </button> --}}
</nav>