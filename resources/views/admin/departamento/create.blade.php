@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.departamento.index'))
  @slot('color', 'secondary')
  @slot('body', 'Departamento - Create')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Formulario de Departamento</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.departamento.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputNombres" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" autocomplete="off" name="nombre" value="{{ old('nombre') }}" id="inputNombres" placeholder="Nombre departamento" required>
                  {!! $errors->first('nombre','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea name="descripcion" id="descripcion" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" cols="10" rows="2">{{ old('descripcion') }}</textarea>
                  {!! $errors->first('descripcion','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <hr>
              <div class="form-group text-center">
                <strong><u>Acceso de plataformas</u></strong>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Eventos</label>
                <div class="col-sm-8">
                  <select name="plataforma_evento" id="plataforma_evento" class="form-control {{ $errors->has('plataforma_evento') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_evento','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Votación</label>
                <div class="col-sm-8">
                  <select name="plataforma_votacion" id="plataforma_votacion" class="form-control {{ $errors->has('plataforma_votacion') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_votacion','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Bicicleta</label>
                <div class="col-sm-8">
                  <select name="plataforma_bicicleta" id="plataforma_bicicleta" class="form-control  {{ $errors->has('plataforma_bicicleta') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_bicicleta','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Tutorias</label>
                <div class="col-sm-8">
                  <select name="plataforma_tutoria" id="plataforma_tutoria" class="form-control  {{ $errors->has('plataforma_tutoria') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_tutoria','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Atención</label>
                <div class="col-sm-8">
                  <select name="plataforma_atencion" id="plataforma_atencion" class="form-control  {{ $errors->has('plataforma_atencion') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_atencion','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Formulario</label>
                <div class="col-sm-8">
                  <select name="plataforma_formulario" id="plataforma_formulario" class="form-control  {{ $errors->has('plataforma_formulario') ? 'is-invalid' : '' }}" required>
                    @foreach ($state as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_formulario','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group text-center">
                <div id="preview"></div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                  <br>
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
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush