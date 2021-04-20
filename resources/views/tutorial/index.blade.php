@php
  if(auth('usuario')->check()){
    $p = current_user()->me();
    $plataforma_evento     = $p['evento'];
    $plataforma_votacion   = $p['votacion'];
    $plataforma_bicicleta  = $p['bicicleta'];
    $plataforma_tutoria    = $p['tutoria'];
    $plataforma_formulario = $p['formulario'];
    $plataforma_servicio   = $p['servicio'];
    $plataforma_chat       = $p['chat'];
    $plataforma_atencion   = $p['atencion'];
    $plataforma_alumno     = $p['alumno'];
    $plataforma_usuario    = $p['usuario'];

    $modeMain = session()->get('modeMain');
  }
@endphp

@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
  .tutorial-youtube {
    background-color: black;
    background: linear-gradient(90deg, #2eaac0 0%, #bdb4b2 100%);
  }
</style>

@endpush
@section('content')

{{-- <section class="tutorial-youtube">
  <div class="container">
    <div class="row">
      <div class="col-md-12 p-4">
        <h1>Tutoriales</h1>
      </div>
    </div>
  </div>
</section> --}}


<header>
  {{-- <div class="collapse tutorial-youtube" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
          <img src="/dist/img/svg/undraw_online_video.svg" alt="" width="300px">
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
  </div> --}}
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <i class="fa fa-video mr-2"></i>
        <strong>Tutoriales</strong>
      </a>
      {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
    </div>
  </div>
</header>

<main role="main">
  <section class="my-4 text-center">
    <div class="container animate__animated animate__zoomIn">
      <h1>Academia Edugestion</h1>
      <p class="lead text-muted">Aprende con nosotros cada módulo diseñado especialmente para ti <strong>{{ current_user()->nombre }}</strong>.</p>
      <img src="/dist/img/svg/undraw_online_video.svg" alt="" width="400px">
      <p>
        {{-- <a href="#" class="btn btn-primary my-2">Main call to action</a> --}}
        {{-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> --}}
      </p>
    </div>
  </section>

  <div class="album py-5 ">
    <div class="container ">
      @if ($plataforma_tutoria[0])
      <div class="row">
        <div class="col-md-12 mb-2">
          <h1 class="text-center">Tutoría - Tutores</h1>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <iframe width="100%" height="225" src="https://www.youtube.com/embed/j9rBKk2tDGk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="card-body">
              <h4>Soy tutor. ¿Cómo registro mis bitácoras?</h4>
              <p class="card-text">{{ current_user()->nombre }} en 10 min aprendes todo lo necesario para gestionar tus bitácoras.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> --}}
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                </div>
                <small class="text-muted">Leonardo</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      @if ($plataforma_atencion[0])
      <div class="row">
        <div class="col-md-12 mb-2">
          <h1 class="text-center">Atención - Registro Agenda</h1>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <iframe width="100%" height="225" src="https://www.youtube.com/embed/qk7USrT7vjw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <div class="card-body">
              <h4>Tutorial express</h4>
              <p class="card-text">En 5 minutos {{ current_user()->nombre }} aprenderás como crear tus registros de atención.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> --}}
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                </div>
                <small class="text-muted">Leonardo</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <iframe width="100%" height="225" src="https://www.youtube.com/embed/5qnQUkpKOwU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <div class="card-body">
              <h4>Búsqueda Avanzada</h4>
              <p class="card-text">Aprende a usar la búsqueda avanzada para buscar <strong>Alumnos</strong> o <strong>Usuarios</strong> del sistema más rápido.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> --}}
                  {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                </div>
                <small class="text-muted">Leonardo</small>
              </div>
            </div>
          </div>
        </div>

        {{-- <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      @endif

    </div>
  </div>
</main>
@endsection
@push('javascript')

@endpush