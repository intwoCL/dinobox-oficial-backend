@extends('web.repartidor.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('dist/delivery/css/index.css') }}">
@endpush
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('repartidor.home')) --}}
  {{-- @slot('color', 'secondary') --}}
  @slot('body', "Perfil")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-widget widget-user">
          <div class="widget-user-header bg-primary">
            <h3 class="widget-user-username text-right">{{ $u->present()->nombre_completo() }}</h3>
            <h5 class="widget-user-desc text-right">{{ $u->correo }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="{{ $u->present()->getPhoto() }}" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12 border-top">
                <div class="description-block">
                  {{-- <h5 class="description-header">{{ $u->present()->nombre_completo() }}</h5> --}}
                  {{-- <span class="description-text">{{ $u->correo }}</span> --}}

                  <a href="{{ route('web.repartidor.profile') }}" class="btn btn-primary btn-block btn-lg"><strong>EDITAR</strong></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">

          @forelse (current_user()->vehiculos as $v)
          <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="card-sl">
              <div class="card-image">
                <img src="{{ $v->present()->getPhoto() }}" />
              </div>
              @if ($v->favorito)
                <a class="card-action" href="#">
                  <i class="fa fa-2x fa-heart"></i>
                </a>
              @endif
              <div class="card-heading">
                {!! $v->present()->getIcon() !!} {{ $v->patente }}
              </div>
              <div class="card-text">
                <strong> {{ $v->modelo }}</strong>
              </div>
              <div class="card-button bg-white">
              </div>
              {{-- <button type="button" class="card-button btn btn-primary" data-toggle="modal" data-target="#vehiculoModal"> --}}
                {{-- VER --}}
              {{-- </button> --}}
            </div>
          </div>

          @empty
          No tienes vehiculos
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>




@endsection
@push('extra')
{{-- @include('layouts.repartidor._bar_menu_orden') --}}
@endpush
@push('javascript')

@endpush