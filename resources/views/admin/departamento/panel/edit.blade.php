@push('stylesheet')
@extends('layouts.app')
@section('content')
@component('components.button._back')
  @if ($du->activo)
    @slot('route', route('admin.departamento.show',$d->id))
    @slot('body', "Departamento <strong>$d->nombre</strong> - Actualizar usuario")
  @else
    @slot('route', route('admin.departamentousuario.usersDelete',$d->id))
    @slot('body', "Departamento <strong>$d->nombre</strong> - Actualizar/Activar usuario")
  @endif
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-widget widget-user-2">
          <div class="widget-user-header bg-dark">
            <div class="widget-user-image">
            <img class="img-circle elevation-1" src="{{ $u->present()->getPhoto() }}" width="100%" alt="{{ $u->nombre }}">
            </div>
            <h3 class="widget-user-username">{{ $u->present()->nombre_completo() }}</h3>
            <h5 class="widget-user-desc">{{ $u->correo }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.departamentousuario.update',$du->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_departamento" value="{{ $d->id }}">
            <input type="hidden" name="id_usuario" value="{{ $u->id }}">
            <div class="card-body">
              <p>Permisos asociados a la cuenta. </p>
              <hr>
              @if ($d->plataforma_evento==1)
                <div class="form-group row">
                  <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Evento</label>
                  <div class="col-sm-4">
                    <select name="plataforma_evento" id="plataforma_evento" class="form-control">
                      @foreach ($permisos as $key => $value)
                      <option {{ $key==$du->permiso_evento ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              @endif
              @if ($d->plataforma_votacion==1)
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Votación</label>
                <div class="col-sm-4">
                  <select name="plataforma_votacion" id="plataforma_votacion" class="form-control">
                    @foreach ($permisos as $key => $value)
                    <option {{ $key==$du->permiso_votacion ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif
              @if ($d->plataforma_bicicleta==1)
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Bicicleta</label>
                <div class="col-sm-4">
                  <select name="plataforma_bicicleta" id="plataforma_bicicleta" class="form-control">
                    @foreach ($permisosBicicletas as $key => $value)
                    <option {{ $key==$du->permiso_bicicleta ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif
              @if ($d->plataforma_tutoria==1)
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Tutoría</label>
                <div class="col-sm-4">
                  <select name="plataforma_tutoria" id="plataforma_tutoria" class="form-control">
                    @foreach ($permisosTutorias as $key => $value)
                    <option {{ $key==$du->permiso_tutoria ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif

              @if ($d->plataforma_formulario==1)
              <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Formulario</label>
                <div class="col-sm-4">
                  <select name="plataforma_formulario" id="plataforma_formulario" class="form-control">
                    @foreach ($permisosFormulario as $key => $value)
                      <option {{ $key==$du->permiso_formulario ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif

              {{-- <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">CHAT</label>
                <div class="col-sm-4">
                  <select name="plataforma_sala_video" id="plataforma_sala_video" class="form-control">
                    @foreach ($permisos as $key => $value)
                      <option {{ $key==$du->permiso_sala_video ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div> --}}
              @if ($d->plataforma_atencion==1)
              <div class="form-group row">
                <label for="plataforma_toma_hora" class="col-sm-4 col-form-label">Atención</label>
                <div class="col-sm-4">
                  <select name="plataforma_toma_hora" id="plataforma_toma_hora" class="form-control">
                    @foreach ($permisosAtencion as $key => $value)
                      <option {{ $key==$du->permiso_toma_hora ? 'selected' : ''}} value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-{{ $du->activo ? 'danger' : 'success' }}" data-toggle="modal"     data-target="#modalBorrar">
                <strong>{{ $du->activo ? 'DAR DE BAJA' : 'VOLVER ACTIVAR' }}</strong>
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
  <form action="{{ route('admin.departamentousuario.destroy',$du->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_departamento_usuario" value="{{ $du->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">{{ $du->activo ? 'ELIMINAR' : 'ACTIVAR' }} USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            ¿Seguro en {{ $du->activo ? 'dar de baja' : 'activar' }} a {{ $du->usuario->present()->nombre_completo() }}?
          </p>
            @if ($du->activo)
            <p>
              El usuario no podrá ver este departamento
            </p>
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-{{ $d->activo ? 'danger' : 'success' }}">{{ $du->activo ? 'Dar de baja' : 'Activar' }}</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
