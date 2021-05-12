@extends('layouts.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('admin.cliente.index'))
  @slot('color', 'secondary') --}}
  @slot('body', 'Pedidos')
@endcomponent

{{-- <ol class="list-group list-group-numbered">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Cras justo odio
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Cras justo odio
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Cras justo odio
    </div>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
</ol> --}}

<div class="list-group">
  @foreach ($ordenes as $or)
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{ $or->orden->codigo }}</h5>
      {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Some placeholder content in a paragraph.</p>
    <small class="text-muted">And some muted small print.</small>
  </a>
  @endforeach
</div>

@endsection
@push('extra')
@include('layouts._bar_menu')
@endpush
@push('javascript')

@endpush