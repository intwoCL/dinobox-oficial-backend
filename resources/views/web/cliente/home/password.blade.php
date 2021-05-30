@extends('web.cliente.app')
@push('stylesheet')

  <style>
    body {
      background-color: #fafaf8;
    }
  </style>
@endpush
@section('content')

@include('web.cliente.partials._nav')

<div class="container">
  <div class="row pt-3">
    <div class="col-md-4 mb-4">
      @include('web.cliente.partials._menu')
    </div>
    <div class="col-md-8">
      <h4 class="mb-3 text-white">Mi contraseña</h4>
      <div class="card">
        <form class="form-submit" method="POST" action="{{ route('web.cliente.password.update') }}">
          @csrf
          <div class="card-body">
            <div class="form-group row">
              <div class="col-sm-6">
                <label class="col-form-label">Contraseña actual</label>
                <input type="password" class="form-control {{ $errors->has('password_actual') ? 'is-invalid' : '' }}" name="password_actual" id="password_actual" autocomplete="off" placeholder="*********" required>
                {!! $errors->first('password_actual','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label class="col-form-label">Contraseña nueva</label>
                <input type="password" class="form-control {{ $errors->has('password_nueva') ? 'is-invalid' : '' }}" name="password_nueva" id="password_nueva" autocomplete="off" placeholder="*********" required>
                {!! $errors->first('password_nueva','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label class="col-form-label">Contraseña repetir</label>
                <input type="password" class="form-control {{ $errors->has('password_nueva_repetir') ? 'is-invalid' : '' }}" name="password_nueva_repetir" id="password_nueva_repetir" autocomplete="off" placeholder="*********" required>
                {!! $errors->first('password_nueva_repetir','<small class="form-text text-danger">:message</small>') !!}
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Guardar</button>
            <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
              <h5>GUARDAR</h5>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @include('web.cliente.partials._footer')

</div>
@endsection
@push('javascript')

@endpush