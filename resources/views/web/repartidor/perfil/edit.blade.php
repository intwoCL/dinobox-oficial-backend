@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('web.repartidor.me'))
  {{-- @slot('color', 'secondary') --}}
  @slot('body', "Perfil")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @include('web.repartidor.perfil._tabs_profile_md')
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Actualizar Usuario</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('web.repartidor.profile.update') }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              {{-- <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" value="{{ $u->username }}" readonly placeholder="Nombre de usuario" required>
                </div>
              </div> --}}
              {{-- <hr> --}}
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                {{-- <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $u->correo }}" placeholder="example@correo.cl" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div> --}}
                {{-- <div class="col-sm-10"> --}}
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" disabled id="email" value="{{ $u->correo }}" placeholder="example@correo.cl">
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                {{-- </div> --}}
              </div>

              <div class="form-group row">
                <div class="col-xs-6 col-md-6">
                  <label for="nombre"class="col-sm-5 col-form-label">Nombre<small class="text-danger">*</small></label>
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" id="nombre" placeholder="Nombre" value="{{ $u->nombre }}" name="nombre" autocomplete="new-names">
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>

                <div class="col-xs-6 col-md-6">
                  <label for="apellido" class="col-sm-5 col-form-label">Apellido<small class="text-danger">*</small></label>
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" id="apellido" placeholder="Apellido" value="{{ $u->apellido }}" name="apellido" autocomplete="new-surnames">
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}

                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $u->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group row center-text">
                <div id="preview"></div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>




@endsection
@push('extra')
@include('web.repartidor.perfil._bar_profile_sm')
@endpush
@push('javascript')

@endpush