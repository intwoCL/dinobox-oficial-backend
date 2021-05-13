@extends('layouts.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('repartidor.home'))
  @slot('color', 'secondary') 
  @slot('body', 'Pedidos')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0">{{ $ordenRepartidor->orden->codigo }}</h5>
          {{ $ordenRepartidor->orden->remitente_nombre }}
          {{ $ordenRepartidor->orden->remitente_direccion }}
          {{ $ordenRepartidor->orden->getEstado() }} 
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#notificarModal">
      Cambiar estado
    </button>
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
@include('layouts._bar_menu')
@endpush
@push('javascript')

@endpush