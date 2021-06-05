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
        @if (empty($ca))
        <button type="button" class="card-button btn btn-primary" data-toggle="modal" data-target="#iniciarModal">
          <strong>INICIAR RECORRIDO</strong>
        </button>
        @else
        <button type="button" class="card-button btn btn-danger" data-toggle="modal" data-target="#terminarModal">
          <strong>TERMINAR RECORRIDO</strong>
        </button>
        @endif
      </div>
    </div>
  </section>


{{-- VEHICULOS --}}
<div class="modal fade" id="iniciarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelNotificacion">
          <i class="fas fa-truck mr-2"></i>
          ¿Con cuál vehículo repartirás hoy?
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
              <button type="button" class="card-button btn btn-primary" data-id="{{ $v->id }}" data-patente="{{ $v->patente }}" data-modelo="{{ $v->modelo }}" data-toggle="modal" data-target="#notificarModal">
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
</div>

{{-- ACEPTACIÓN --}}
<div class="modal" id="notificarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelNotificacion">Confimación de vehículo seleccionado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-submit" action="{{ route('web.repartidor.iniciarRecorrido') }}" method="POST">
        @csrf
        <input type="hidden" name="id_vehiculo" id="id_vehiculo_modal" value="">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <h5>
                Hey <strong>{{ current_user()->nombre }}</strong>!
                Iniciarás el recorrido <span id="modelo_modal"></span>, patente <strong><span id="patente_modal"></span></strong>.
              </h5>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block "><strong>ACTIVAR RECORRIDO</strong></button>
        </div>
      </form>
    </div>
  </div>
</div>


{{-- TERMINAR --}}
<div class="modal" id="terminarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelNotificacion">Confimación de termino de ruta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-submit" action="{{ route('web.repartidor.terminarRecorrido') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <h5>
                Vas a finalizar tu recorrido
              </h5>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block "><strong>TERMINAR RECORRIDO</strong></button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
@push('javascript')
<script>

  $('#notificarModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modelo = button.data('modelo');
    var patente = button.data('patente');
    var id = button.data('id');
    var modal = $(this);
    modal.find('#id_vehiculo_modal').val(id);
    modal.find('#modelo_modal').text(modelo);
    modal.find('#patente_modal').text(patente);
    $('#iniciarModal').modal('hide');
  });

  $('#notificarModal').on('hidden.bs.modal', function (event) {
    $('#iniciarModal').modal('show');
  });
</script>
@endpush