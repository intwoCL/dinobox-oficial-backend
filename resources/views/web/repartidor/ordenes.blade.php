@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('repartidor.home'))
  @slot('color', 'secondary')
  @slot('body', "Orden <strong>$orden->codigo</strong>")
@endcomponent
<section class="content">
  <div class="container">
    <div class="row pb-2">
      <div class="col-md-12">
        <div class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $orden->codigo }}</h5>
            {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
            <small class="text-muted">{{ $orden->getFecha()->getDate() }}</small>
          </div>
          <div class="row">
            <div class="col-md-12">
              asdasd
            </div>
            <div class="col-md-12">
              <p>
                <strong>Mensaje:</strong>{{ $orden->mensaje }}
              </p>
            </div>
          </div>
          {{-- <small class="text-muted">And some muted small print.</small> --}}
          <h6>
            <span class="badge badge-primary">{{ $orden->getEstado() }}</span>
          </h6>
          {{-- <small></small> --}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">
              <i class="fas fa-house-user mr-2"></i>
              Retiro
            </h5>
            {{-- <small class="text-muted">{{ $orden->getFecha()->getDate() }}</small> --}}
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>
                <strong>Dirección:</strong> {{ $orden->getRemitenteDireccion() }}
                <br>
                <strong>Comuna:</strong> {{ $orden->remitenteComuna->nombre }}
              </p>
            </div>
            {{-- <div class="col-md-12">
              asdasd
            </div> --}}
          </div>
          {{-- <small class="text-muted">And some muted small print.</small> --}}
          {{-- <small class="text-muted">{{ $orden->getEstado() }}</small> --}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">
              <i class="fas fa-truck mr-2"></i>
              Despacho
            </h5>
            {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
            {{-- <small class="text-muted">{{ $orden->getFecha()->getDate() }}</small> --}}
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>
                <strong>Dirección:</strong> {{ $orden->getDestinatarioDireccion() }}
                <br>
                <strong>Comuna:</strong> {{ $orden->destinatarioComuna->nombre }}
              </p>
            </div>
            {{-- <div class="col-md-12">
              asdasd
            </div> --}}
          </div>
          {{-- <small class="text-muted">{{ $orden->getEstado() }}</small> --}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="list-group-item list-group-item-action">
          <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#notificarModal">
            Cambiar estado
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="notificarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelNotificacion">Cambiar en transito a retiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('repartidor.ordenUpdate', $ordenRepartidor->orden->codigo)}}" method="POST">
        @method("PUT")
        @csrf
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
@push('extra')
@include('layouts.repartidor._bar_menu_orden')
@endpush
@push('javascript')

@endpush