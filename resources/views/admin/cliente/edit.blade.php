@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('cliente.index'))
  @slot('color', 'secondary')
  @slot('body', "Editar Cliente <strong>".$c->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-{{ $c->activo ? 'success' : 'danger' }}">
          <div class="card-header">
            <h3 class="card-title">Actualizar Cliente</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('cliente.update',$c->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $c->id }}">
            <input type="hidden" name="run" value="{{ $c->run }}">
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2">Rut</label>
                <div class="input-group col-sm-10">
                  <input type="text" class="form-control" placeholder="" readonly  value="{{ $c->run }}">
                  <small id="error" class="text-danger"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ $c->nombre }}" placeholder="nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $c->apellido }}" placeholder="apellido">
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $c->correo }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
                <div class="input-group col-sm-10">
                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos" value="{{ $c->telefono }}">
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="id_tipo_usuario" class="col-sm-2 col-form-label">Tipo Usuario</label>
                <div class="col-sm-10">
                  <select class="form-control {{ $errors->has('id_tipo_usuario') ? 'is-invalid' : '' }}" name="id_tipo_usuario" id="id_tipo_usuario" required>
                    @foreach ($tipos as $t)
                      @continue($t->id == 1 || $t->id == 98)
                      <option {{ $t->id == $c->id_tipo_usuario ? 'selected' : '' }}  value="{{ $t->id }}">{{ $t->nombre }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-12">
                  {!! $errors->first('id_tipo_usuario', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div> --}}

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $c->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group row text-center">
                <div id="preview"></div>
              </div>
              @if ($c->last_session)
              <div class="form-group row">
                <label for="plataforma_toma_hora" class="col-sm-4 col-form-label">Última conexión</label>
                <div class="col-sm-4">
                  {{ $c->getLastSession()->getDatetime() }}
                </div>
              </div>
              @endif
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-{{ $c->activo ? 'danger' : 'success' }}" data-toggle="modal" data-target="#modalBorrar">
                <strong>{{ $c->activo ? 'DAR DE BAJA' : 'VOLVER ACTIVAR' }}</strong>
              </button>
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
      {{-- <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('cliente.password', $c->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña <small>(123123)</small></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password_2') ? 'is-invalid' : '' }}" value="123123" name="password_2" id="password_2" autocomplete="off" placeholder="*********" required>
                  {!! $errors->first('password_2', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>

        <button type="button" class="btn btn-{{ $c->activo ? 'danger' : 'success' }} mt-2 mb-4" data-toggle="modal" data-target="#modalBorrar">
          <strong>{{ $c->activo ? 'DAR DE BAJA' : 'VOLVER ACTIVAR' }}</strong>
        </button>

        <button type="button" class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalMain">
          <strong>MODO MAIN</strong>
        </button>
      </div> --}}
    </div>
  </div>
</section>


{{-- Modal --}}
<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('cliente.destroy',$c->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_usuario" value="{{ $c->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">{{ $c->activo ? 'ELIMINAR' : 'ACTIVAR' }} USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            ¿Seguro en {{ $c->activo ? 'dar de baja' : 'activar' }} a {{ $c->nombre }}?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-{{ $c->activo ? 'danger' : 'success' }}">{{ $c->activo ? 'Dar de baja' : 'Activar' }}</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush