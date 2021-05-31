@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('repartidor.ordenes'))
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
          @foreach ($orden->getEstados() as $key => $item)
            <span class="btn-round {{ $key <= $orden->estado ? 'bg-success' : '' }} mr-2">
              <i class="fa fa-{{ $item[1] }}"></i>
            </span>
          @endforeach
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
        {{-- <div class="list-group-item list-group-item-action">
          <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#notificarModal">
            Cambiar estado
          </button>
        </div> --}}
        <div class="card text-center">
          <div class="card-body">
            <a class="btn btn-app bg-info">
              <i class="fas fa-map-marked"></i> <strong>Mapa</strong>
            </a>
            <button class="btn btn-app bg-warning" data-toggle="modal" data-target="#notificarModal">
              <i class="fas fa-bell"></i> <strong>Notificar</strong>
            </button>
            <a class="btn btn-app bg-success">
              <i class="fas fa-comment-alt"></i> <strong>Comentario</strong>
            </a>
            <button class="btn btn-app bg-primary" data-toggle="modal" data-target="#llamarModal">
              <i class="fas fa-phone-square-alt"></i> <strong>Marcar remitente</strong>
            </button>
            <button class="btn btn-app bg-primary" data-toggle="modal" data-target="#llamarModal">
              <i class="fas fa-phone-square"></i> <strong>Marcar destinatario</strong>
            </button>


            {{-- <a class="btn btn-app bg-secondary">
              <span class="badge bg-success">300</span>
              <i class="fas fa-barcode"></i> Products
            </a> --}}
            {{-- <a class="btn btn-app bg-success">
              <span class="badge bg-purple">891</span>
              <i class="fas fa-users"></i> Users
            </a> --}}
            {{-- <a class="btn btn-app bg-danger">
              <span class="badge bg-teal">67</span>
              <i class="fas fa-inbox"></i> Orders
            </a> --}}
            {{-- <a class="btn btn-app bg-warning">
              <span class="badge bg-info">12</span>
              <i class="fas fa-envelope"></i> Inbox
            </a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="notificarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
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

<div class="modal fade" id="llamarModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelNotificacion">Llamar a {{ $orden->remitente_telefono }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> --}}
        <a href="tel:+{{ $orden->remitente_telefono }}" class="btn btn-primary btn-lg btn-block">
          <strong>Marcar</strong>
        </a>
        {{-- <a type="submit" class="btn btn-primary">Guardar</button> --}}
      </div>
    </div>
  </div>
</div>

@endsection
@push('extra')
{{-- @include('layouts.repartidor._bar_menu_orden') --}}
@endpush
@push('javascript')
@endpush