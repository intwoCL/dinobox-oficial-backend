@extends('web.cliente.app')
@push('stylesheet')

@endpush
@section('content')

@include('web.cliente.partials._nav')
<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      @component('components.button._back2')
        @slot('route', route('web.cliente.historial'))
        @slot('color', 'secondary')
        @slot('body', 'Seguimiento')
      @endcomponent
        @include('web.cliente.partials._orden')
        @include('web.cliente.partials._orden2')
    </div>
  </div>
  @include('web.cliente.partials._footer')
</div>
@endsection
@push('javascript')
@endpush