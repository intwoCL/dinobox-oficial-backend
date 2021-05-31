@extends('web.cliente.app')
@section('content')
@push('stylesheet')
@endpush
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container">
  @component('web.cliente.partials._nav_button_back')
    {{-- @slot('route', 'adadsasd') --}}
    {{-- @slot('color', 'secondary') --}}
    @slot('body', "Dinobox.cl Acceso Cliente")
  @endcomponent

  <div class="container content-form">
    <div class="col-md-12">
      <div id="carouselExampleIndicators" class="carousel slide pb-4 rounded" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('dist/img/demo/uno.webp') }}" class="d-block w-100 rounded" alt="...">
          </div>
          {{-- <div class="carousel-item active">
            <img src="{{ asset('dist/img/demo/oferta.jpg') }}" class="d-block w-100" alt="...">
          </div> --}}
          <div class="carousel-item">
            <img src="{{ asset('dist/img/demo/dos.webp') }}" class="d-block w-100 rounded" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="card-deck mb-3 text-center">

      <div class="card">
        <img src="{{ asset('dist/img/demo/anuncio.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">Última orden</h5>
          <p class="card-text">COD 10000000001.</p>
          <a href="#" class="btn btn-primary">Ir al detalle</a>
        </div>
      </div>
    </div>
  </div>
</div>



@include('web.cliente.partials._footer')
@endsection
@push('extra')
@include('web.cliente.partials._bar_menu_sm')
@endpush
@push('javascript')

@endpush