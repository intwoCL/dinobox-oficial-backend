<nav class="navbar fixed-bottom navbar-dark bg-primary d-none d-sm-block d-md-none d-flex justify-content-center" style="position: fixed; bottom: 0px;left: 0px; height: 62px !important;">
  {{-- <div class="navbar-brand pl-3 pr-3" href="" title="Retirar" data-widget="pushmenu">
    <i class="fas fa-bars"></i>
  </div> --}}
  <a class="navbar-brand pl-3 pr-2" href="{{ route('web.repartidor.home') }}" title="Retirar">
    <i class="fa fa-house-user {{ activeBarMenu('repartidor/home')  }}"></i>
  </a>
  <a class="navbar-brand pl-5 pr-2" href="" title="Despacho">
    <i class="fa fa-truck"></i>
  </a>
  <a class="navbar-brand pl-5 pr-3" href="" title="Codigo orden" data-toggle="modal" data-target="#qrModal">
    <i class="fa fa-qrcode"></i>
  </a>
</nav>