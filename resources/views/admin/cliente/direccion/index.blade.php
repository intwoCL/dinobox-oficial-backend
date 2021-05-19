@extends('layouts.app')
@section('content')
@push('stylesheet')

@endpush
@component('components.button._back')
  @slot('route', route('admin.cliente.index'))
  @slot('color', 'secondary')
  @slot('body', "Dirección Cliente <strong>".$c->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
    <i class="fa fa-heart"></i>
</button> --}}

  <div class="container-fluid">
    <div class="row">
      @include('admin.cliente._tabs_cliente')

      {{-- <div class="col-md-12"> --}}
        {{-- <div class="col-md-2">
          <ul class="list-group">
            <li class="list-group-item active" aria-current="true">An active item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item">And a fifth one</li>
          </ul>
        </div>
        <div class="col-md-10">
          @foreach ($c->direcciones as $d)
            <div class="col-md-4">
              <div class="card shadow-sm">
                <div class="card-header">
                  <i class="fas fa-map-marker-alt mr-2"></i>
                  {{ $d->comuna->nombre }}

                  <i class="fas fa-star text-warning mr-2"></i>

                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $d->getDireccion() }}</h5>
                  <p class="card-text">{{ $d->getDireccion() }}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                  <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                </div>
              </div>
            </div>
          @endforeach
        </div> --}}

        {{-- <div class="card"> --}}
          {{-- <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">Listado de clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
          </div> --}}
          <div class="card-body">
            <div class="text-center row">
              @foreach ($c->direcciones as $d)
                <div class="col-md-3">
                  @include('admin.cliente.direccion._card_comuna')
                </div>
              @endforeach
            </div>
          </div>
        {{-- </div> --}}
      {{-- </div> --}}
    </div>
  </div>




</section>
@endsection
@push('javascript')

@endpush