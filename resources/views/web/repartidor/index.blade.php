@extends('web.repartidor.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush
@section('content')
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        {{-- <i class="fa fa-people-carry mr-2"></i> --}}
        <strong>Dinobox.cl</strong>
      </a>
    </div>
  </div>
</header>

<main role="main">
  <section class="my-4 text-center">
    <div class="container">
      <h1>Bienvenid@ a Dinobox {{ current_user()->nombre }}</h1>
      {{-- <h3>{{ current_user()->isHappy() ? "FELIZ CUMPLEAÑOS" : ''}}</h3> --}}
      <p>
        <div id="typed-strings">
          <p>Sistema de gestión </p>
          <p>Gestionado en un solo lugar.</p>
        </div>
        <span id="typed"></span>
      </p>
      <img src="{{ $icon }}" width="100%" height="300px" alt="">
      <p>
        <a href="{{ route('repartidor.ordenes') }}" class="btn btn-primary btn-block btn-lg my-2">Repartir</a>
      </p>
    </div>
  </section>
</main>
@endsection
@push('javascript')
@endpush