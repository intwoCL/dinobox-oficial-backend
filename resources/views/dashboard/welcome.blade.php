@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    .blocks {
      background: linear-gradient(90deg, #efd5ff 0%, #515ada 100%);
    }

    .blocks2{
      background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%);
    }
    .tutorial-youtube {
      background-color: black;
      background: linear-gradient(90deg, #2eaac0 0%, #bdb4b2 100%);
    }
    .typed-cursor {
      opacity: 1;
      -webkit-animation: blink 0.7s infinite;
      -moz-animation: blink 0.7s infinite;
      animation: blink 0.7s infinite;
    }
    @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }
    @-webkit-keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }
    @-moz-keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }

    #typed {
      display: inline;
    }

  </style>
@endpush
@section('content')
<header>
  <div class="collapse tutorial-youtube" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Acerca de</h4>
          <p class="text-muted">Texto .</p>
          <img src="/dist/img/svg/undraw_processing.svg" alt="" width="300px">
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between py-2">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <i class="fa fa-video mr-2"></i>
        <strong>Edugestion.cl</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">
  <section class="my-4 text-center">
    <div class="container animate__animated animate__lightSpeedInLeft">
      <h1>Bienvenid@ a Delivery {{ current_user()->nombre }}</h1>
      {{-- <h3>{{ current_user()->isHappy() ? "FELIZ CUMPLEAÑOS" : ''}}</h3> --}}
      <p>
        <div id="typed-strings">
          <p>Creando soluciones <strong>sencillas</strong>.</p>
          <p>Gestionado en un solo lugar.</p>
        </div>
        <span id="typed"></span>
      </p>
      {{-- <img src="{!! $icon !!}" id="svg" alt="" width="400px" class="py-2"> --}}
      {!! $icon !!}
      {{-- <p class="lead text-muted py-4">
        <em>

        </em> -
        <strong>Ingvar Kamprad</strong>
      </p> --}}
      {{-- <p> --}}
        {{-- <a href="#" class="btn btn-primary my-2">Main call to action</a> --}}
        {{-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> --}}
      {{-- </p> --}}
    </div>
  </section>
</main>

@endsection
@push('javascript')
@endpush