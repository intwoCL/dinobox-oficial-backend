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
      <div class="col-md-5">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('web.repartidor.profile.password') }}" >
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña actual</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password_actual') ? 'is-invalid' : '' }}" name="password_actual" id="password_actual" autocomplete="off" placeholder="*********" required>
                  {!! $errors->first('password_actual','<small class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña nueva</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password_nueva') ? 'is-invalid' : '' }}" name="password_nueva" id="password_nueva" autocomplete="off" placeholder="*********" required>
                  {!! $errors->first('password_nueva','<small class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña repetir</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password_nueva_repetir') ? 'is-invalid' : '' }}" name="password_nueva_repetir" id="password_nueva_repetir" autocomplete="off" placeholder="*********" required>
                  {!! $errors->first('password_nueva_repetir','<small class="form-text text-danger">:message</small>') !!}
                </div>
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