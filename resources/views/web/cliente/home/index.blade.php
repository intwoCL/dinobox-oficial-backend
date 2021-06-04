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

  <div class="container py-3">
    <div class="title h1 text-center">Horizontal cards - Bootstrap 4</div>
    <!-- Card Start -->
    <div class="card">
      <div class="row ">

        <div class="col-md-7 px-3">
          <div class="card-block px-6">
            <h4 class="card-title">Horizontal Card with Carousel - Bootstrap 4 </h4>
            <p class="card-text">
              The Carousel code can be replaced with an img src, no problem. The added CSS brings shadow to the card and some adjustments to the prev/next buttons and the indicators is rounded now. As in Bootstrap 3
            </p>
            <p class="card-text">Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images</p>
            <br>
            <a href="#" class="mt-auto btn btn-primary  ">Read More</a>
          </div>
        </div>
        <!-- Carousel start -->
        <div class="col-md-5">
          <div id="CarouselTest" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
              <li data-target="#CarouselTest" data-slide-to="1"></li>
              <li data-target="#CarouselTest" data-slide-to="2"></li>

            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block" src="https://picsum.photos/450/300?image=1072" alt="">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="https://picsum.photos/450/300?image=855" alt="">
              </div>
              <div class="carousel-item">
                <img class="d-block" src="https://picsum.photos/450/300?image=355" alt="">
              </div>
              <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
              <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
            </div>
          </div>
        </div>
        <!-- End of carousel -->
      </div>
    </div>
    <!-- End of card -->

  </div>

  <div class="container">
    <div class="card float-left">
      <div class="row ">

        <div class="col-sm-7">
          <div class="card-block">
            <!--           <h4 class="card-title">Small card</h4> -->
            <p>Wetgple text to build your own card.</p>
            <p>Change around the content for awsomenes</p>
            <a href="#" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>

        <div class="col-sm-5">
          <img class="d-block w-100" src="https://picsum.photos/150?image=380" alt="">
        </div>
      </div>
    </div>


      <div class="card float-right">
        <div class="row">
          <div class="col-sm-5">
            <img class="d-block w-100" src="https://picsum.photos/150?image=641" alt="">
          </div>
          <div class="col-sm-7">
            <div class="card-block">
              <!--           <h4 class="card-title">Small card</h4> -->
              <p>Copy paste the HTML and CSS.</p>
              <p>Change around the content for awsomenes</p>
              <br>
              <a href="#" class="btn btn-primary btn-sm float-right">Read More</a>
            </div>
          </div>

        </div>
      </div>
    </div>

   <br>
  <br>

</div>



@include('web.cliente.partials._footer')
@endsection
@push('extra')
@include('web.cliente.partials._bar_menu_sm')
@endpush
@push('javascript')

@endpush