{{-- <nav class="navbar navbar-expand-lg navbar-light bg-white  d-none d-sm-block d-md-none d-flex">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Dinobox</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Links
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <i class="fas fa-circle-user"></i>
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top d-none d-sm-block d-md-none d-flex">
  @component('web.cliente.partials._nav_button_back')
    @slot('route', 'adadsasd')
    @slot('color', 'secondary')
    @slot('body', "Editar Cliente <strong>Estado</strong>")
  @endcomponent
  {{-- <a class="navbar-brand" href="#">Dinobox</a> --}}
</nav>