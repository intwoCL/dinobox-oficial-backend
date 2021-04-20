@extends('layouts.app')
@section('content')
@component('components.button._back')
@if ($d->activo)
  @slot('route', route('admin.departamento.index'))
  @slot('body', "Departamento <strong>$d->nombre</strong - Actualizar")
@else
  @slot('route', route('admin.departamento.indexDelete'))
  @slot('body', "Departamento <strong>$d->nombre</strong> - Actualizar/Activar usuario")
@endif
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Formulario de Departamento</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.departamento.update',$d->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputNombres" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" autocomplete="off" name="nombre" value="{{ $d->nombre }}" id="nombre" placeholder="Nombre departamento">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-4 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <textarea name="descripcion" id="descripcion" class="form-control" cols="10" rows="2">{{ $d->descripcion }}</textarea>
                </div>
              </div>
              <hr>
              <div class="form-group text-center">
                <strong><u>Acceso de plataformas</u></strong>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Eventos</label>
                <div class="col-sm-8">
                  <select name="plataforma_evento" id="plataforma_evento" class="form-control">
                  @foreach ($state as $key => $value)
                    <option {{ $key==$d->plataforma_evento ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Votación</label>
                <div class="col-sm-8">
                  <select name="plataforma_votacion" id="plataforma_votacion" class="form-control">
                  @foreach ($state as $key => $value)
                    <option {{ $key==$d->plataforma_votacion ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Bicicleta</label>
                <div class="col-sm-8">
                  <select name="plataforma_bicicleta" id="plataforma_bicicleta" class="form-control">
                  @foreach ($state as $key => $value)
                    <option {{ $key==$d->plataforma_bicicleta ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Tutorias</label>
                <div class="col-sm-8">
                  <select name="plataforma_tutoria" id="plataforma_tutoria" class="form-control" required>
                    @foreach ($state as $key => $value)
                      <option {{ $key==$d->plataforma_tutoria ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_bicicleta','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Atención</label>
                <div class="col-sm-8">
                  <select name="plataforma_atencion" id="plataforma_atencion" class="form-control" required>
                    @foreach ($state as $key => $value)
                      <option {{ $key==$d->plataforma_atencion ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_bicicleta','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Formulario</label>
                <div class="col-sm-8">
                  <select name="plataforma_formulario" id="plataforma_formulario" class="form-control" required>
                    @foreach ($state as $key => $value)
                      <option {{ $key==$d->plataforma_formulario ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-6">
                  {!! $errors->first('plataforma_formulario','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $d->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
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
              <button type="button" class="btn btn-{{ $d->activo ? 'danger' : 'success' }}" data-toggle="modal"     data-target="#modalBorrar">
                <strong>{{ $d->activo ? 'DAR DE BAJA' : 'VOLVER ACTIVAR' }}</strong>
              </button>
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Modal --}}
<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('admin.departamento.destroy',$d->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_departamento" value="{{ $d->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">{{ $d->activo ? 'ELIMINAR' : 'ACTIVAR' }} DEPARTAMENTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            ¿Seguro en {{ $d->activo ? 'dar de baja' : 'activar' }} {{ $d->nombre }}?
          </p>
            @if ($d->activo)
            <p>Los usuarios inscrito ya no lo visualizarán</p>
            @endif
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-{{ $d->activo ? 'danger' : 'success' }}">{{ $d->activo ? 'Dar de baja' : 'Activar' }}</button>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush