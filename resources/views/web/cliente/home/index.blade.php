@extends('web.cliente.app')
@section('content')
@push('stylesheet')
@endpush

<div class="container">
  @component('web.cliente.partials._nav_button_back')
    {{-- @slot('route', 'adadsasd') --}}
    {{-- @slot('color', 'secondary') --}}
    @slot('body', "Dinobox.cl Acceso Cliente")
  @endcomponent


  <div class="row pt-3">
    <div class="col-md-8 content-form">
      {{-- <h4 class="mb-3 text-white">Mi perfil</h4> --}}
      <div class="card shadow rounded">
        <a href="{{ route('web.cliente.perfil') }}" class="list-group-item list-group-item-action {{ activeTab('web/cliente/perfil') }}">
          <div class="fas fa-user-circle fa-fw mr-2" aria-hidden="true"></div>
          Editar mi perfil
        </a>
      </div>
    </div>
  </div>
  @include('web.cliente.partials._footer')
</div>
@endsection
@push('javascript')

@endpush