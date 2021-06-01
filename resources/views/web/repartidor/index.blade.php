@extends('web.repartidor.app')
@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@endpush
@section('content')
{{-- @component('components.button._back')
  @slot('body', 'Ordenes de hoy')
@endcomponent --}}


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
      {{-- <p> --}}

        <button type="button" class="btn btn-primary btn-block btn-lg my-2" data-toggle="modal" data-target="#habilitarModal">
          <strong>EN RUTA</strong>
        </button>
      {{-- </p> --}}
    </div>
  </section>


  <div class="modal fade" id="habilitarModal" tabindex="-2" role="dialog" aria-labelledby="labelhabilitarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelNotificacion">Seleccionar vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          @forelse (current_user()->vehiculos as $v)
            <button class="btn btn-app bg-primary" data-toggle="modal" data-target="#vehiculoModal">
              @if ($v->favorito)
                <span class="badge bg-white">
                  <i class="fas fa-star text-warning"></i>
                </span>
              @endif
              {!! $v->present()->getIcon() !!}
              <strong> {{ $v->patente }}</strong>
              <strong> {{ $v->modelo }}</strong>
            </button>
          @empty
            No tienes vehiculos
          @endforelse
      </div>
    </div>
  </div>


  {{-- <div class="modal" id="vehiculoModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelNotificacion">Seleccionar vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <form action="" method="POST">
            @method("PUT")
            @csrf
            <div class="media">
              <div class="media-body">
                <h5 class="mt-0">Activar recorrido</h5>
                <p>Iniciaras el recorrido con #nombre , patente #asdad, tus clientes podran ver al auto que vienes a repartir para ellos.</p>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block ">ACTIVAR RECORRIDO</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
</main>
@endsection
@push('javascript')
<script>
  $(function () {
    $('#habilitarModal').on('show.bs.modal', function (event) {
      console.log('ABIERTO uno');

      // var button = $(event.relatedTarget);
      // var recipient = button.data('whatever');
      // var modal = $(this);
      // modal.find('.modal-title').text('New message to ' + recipient);
      // modal.find('.modal-body input').val(recipient);
    });

    $('#vehiculoModal').on('show.bs.modal', function (event) {
      console.log('ABIERTO');
      // $('#habilitarModal').modal('hide');
      // $('#vehiculoModal').modal('show');
        // $('#modalFind').modal('hide');
      // var button = $(event.relatedTarget);
      // var recipient = button.data('whatever');
      // var modal = $(this);
      // modal.find('.modal-title').text('New message to ' + recipient);
      // modal.find('.modal-body input').val(recipient);
    });

  });
</script>
@endpush