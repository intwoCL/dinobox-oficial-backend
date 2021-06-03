@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('body', 'Ordenes de hoy')
@endcomponent
<section class="content">
  <div class="container">
    <div class="row pb-3">
      @foreach ($ordenes as $or)
      @php
        $orden = $or->orden;
      @endphp
      <div class="col-md-12">
        <a href="{{ route('web.repartidor.ordenShow',$orden->codigo) }}" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <div class="row">
              <div class="col-12">
                <h5 class="mb-1">
                  N° <strong>{{ $orden->codigo }}</strong>
                </h5>
              </div>
            </div>


            {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
            {{-- <small class="text-muted">{{ $or->orden->getFecha()->getDate() }}</small> --}}
            <h5 class="mb-1">
              <span class="badge badge-pill badge-primary">
                <strong>{{ $orden->getEstado() }}</strong>
              </span>
            </h5>
          </div>
          {{-- <p class="mb-1">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus corporis, odit suscipit error ipsam nisi blanditiis dolorem, neque quos repudiandae, cumque iste libero. Aspernatur omnis ad dignissimos nostrum quo incidunt!
          </p> --}}
          {{-- <small class="text-muted">And some muted small print.</small> --}}
          <div class="row">
            <div class="col-6">
              <strong>Dirección:</strong> {{ $orden->getRemitenteDireccion() }}
              <br>
              <strong>Comuna:</strong> {{ $orden->remitenteComuna->nombre }}
            </div>
            <div class="col-6">
              <strong>Dirección:</strong> {{ $orden->getDestinatarioDireccion() }}
              <br>
              <strong>Comuna:</strong> {{ $orden->destinatarioComuna->nombre }}
            </div>
          </div>

          <div class="pt-2 mt-2">
            @foreach ($orden->getEstados() as $key => $item)
              <span class="btn-round {{ $key <= $orden->estado ? 'bg-success' : '' }} mr-2">
                <i class="fa fa-{{ $item[1] }}"></i>
              </span>
            @endforeach
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@push('extra')
@include('layouts.repartidor._bar_menu')
@endpush
@push('javascript')

@endpush