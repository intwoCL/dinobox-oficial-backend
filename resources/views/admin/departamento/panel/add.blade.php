@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.departamentousuario.create',$d->id))
  @slot('color', 'secondary')
  @slot('body', "Departamento - User - $d->nombre")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-widget widget-user-2">
          <div class="widget-user-header bg-info">
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
        <div class="card card-info">
          <div class="card-header bg-info">
            <h3 class="card-title"></h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.departamentousuario.store') }}">
            @csrf
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
                        <option value="{{ $key }}">{{ $value }}</option>
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
                      <option value="{{ $key }}">{{ $value }}</option>
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
                      <option value="{{ $key }}">{{ $value }}</option>
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
                      <option value="{{ $key }}">{{ $value }}</option>
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
                      <option value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif

              {{-- <div class="form-group row">
                <label for="inputTipoUsuario" class="col-sm-4 col-form-label">Chat</label>
                <div class="col-sm-4">
                  <select name="plataforma_sala_video" id="plataforma_sala_video" class="form-control">
                    @foreach ($permisos as $key => $value)
                      @php
                        if ($key==2) {
                          continue;
                        }
                      @endphp
                      <option value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
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
                      <option value="{{ $key }}" title="{{ $value }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @endif

              {{-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="administrador_dep" name="administrador_dep" value="1">
                  <label for="administrador_dep" class="custom-control-label">Administrador</label>
                </div>
              </div> --}}
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
