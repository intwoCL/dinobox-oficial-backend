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
      <div class="col-md-12">
        <a href="{{ route('repartidor.ordenShow',$or->orden->codigo) }}" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $or->orden->codigo }}</h5>
            {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
            <small class="text-muted">{{ $or->orden->getFecha()->getDate() }}</small>
          </div>
          <p class="mb-1">

            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus corporis, odit suscipit error ipsam nisi blanditiis dolorem, neque quos repudiandae, cumque iste libero. Aspernatur omnis ad dignissimos nostrum quo incidunt!
          </p>
          {{-- <small class="text-muted">And some muted small print.</small> --}}
          <small class="text-muted">{{ $or->orden->getEstado() }}</small>
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