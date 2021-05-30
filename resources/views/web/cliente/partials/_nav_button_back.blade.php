<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top d-none d-sm-block d-md-none d-flex">
  <h4>
    @if (!empty($route))
      <a href="{{ $route }}" class="text-{{ $color ?? 'dark' }}" class="mr-4">
        <i class="fas fa- fa-chevron-circle-left"></i>
      </a>
    @endif
    <i class="{{ $icon ?? '' }}"></i> {!! $body !!}
  </h4>
</nav>
{{--
@component('web.cliente.partials._nav_button_back')
@slot('route', 'adadsasd')
@slot('color', 'secondary')
@slot('body', "Editar Cliente <strong>Estado</strong>")
@endcomponent --}}
{{-- <a class="navbar-brand" href="#">Dinobox</a> --}}