@extends('web.repartidor.app')
@push('stylesheet')
@endpush
@section('content')
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>📦 Dinobox.cl 🦖</strong>
      </a>
    </div>
  </div>
</header>

<main role="main">
  <section class="my-4 text-center">
    <div class="container">
      <h1>Bienveni<em><strong>Rawr</strong></em> <br> {{ current_user()->nombre }}</h1>
      {{-- <h3>{{ current_user()->isHappy() ? "FELIZ CUMPLEAÑOS" : ''}}</h3> --}}
      <div class="mb-2">
        <img src="{{ $icon }}" width="100%" height="300px" alt="">
      </div>

      <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#habilitarModal">
          <strong>INICIA TU RUTA</strong>
        </button>
      </div>
    </div>
  </section>

  <div class="modal fade" id="habilitarModal" tabindex="-2" role="dialog" aria-labelledby="labelhabilitarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelNotificacion">Selecciona tu vehiculo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body justify-content-center">
          <div class="row">

            @forelse (current_user()->vehiculos as $v)
            <div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-2">
              <div class="card-sl">
                <div class="card-image">
                  <img src="{{ $v->present()->getPhoto() }}" />
                </div>
                @if ($v->favorito)
                  <a class="card-action" href="#">
                    <i class="fa fa-2x fa-heart"></i>
                  </a>
                @endif
                <div class="card-heading">
                  {!! $v->present()->getIcon() !!} {{ $v->patente }}
                </div>
                <div class="card-text">
                  <strong> {{ $v->modelo }}</strong>
                </div>
                <button type="button" class="card-button btn btn-primary" data-toggle="modal" data-target="#vehiculoModal">
                  <strong>ENCENDER</strong>
                </button>
              </div>
            </div>

            @empty
            No tienes vehiculos
            @endforelse
          </div>
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