@extends('web.cliente.app')
@section('content')
@include('layouts._nav2')
@component('components.button._back')
  @slot('route', route('user.index'))
  @slot('color', 'secondary')
  @slot('body', "Editar Usuario <strong>".$users->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-{{ $users->activo ? 'success' : 'danger' }}">
          <div class="card-header">
            <h3 class="card-title">Actualizar Usuario</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('user.update',$users->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="Nombre" id="nombre" autocomplete="off" value="{{ $users->nombre }}" placeholder="nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $users->apellido }}" placeholder="Apellido" required>
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" id="username" autocomplete="off" value="{{ $users->username }}" placeholder="Nombre de usuario" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('username', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $users->correo }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group">
                <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $users->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
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

              @if ($users->last_session)
              <div class="form-group row">
                <label for="plataforma_toma_hora" class="col-sm-4 col-form-label">Última conexión</label>
                <div class="col-sm-4">
                  {{ $users->getLastSession()->getDatetime() }}
                </div>
              </div>
              @endif
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="">
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

      </div>
    </div>
  </div>
</section>


{{-- Modal --}}
<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('admin.usuario.destroy',$users->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_usuario" value="{{ $users->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">{{ $users->activo ? 'ELIMINAR' : 'ACTIVAR' }} USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            ¿Seguro en {{ $users->activo ? 'dar de baja' : 'activar' }} a {{ $users->present()->nombre_completo() }}?
          </p>

            @if ($users->activo)
            <p>
              El usuario ya no podrá iniciar sesión y las actividades/registros realizados por {{ $users->present()->nombre_completo() }} permanecerán en el sistema y se podrán visualizar.
            </p>
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-{{ $users->activo ? 'danger' : 'success' }}">{{ $users->activo ? 'Dar de baja' : 'Activar' }}</button>
        </div>
      </div>
    </div>
  </form>
</div>

{{-- Modal MAIN --}}
<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('auth.modeMain.admin') }}" method="POST">
    @csrf
    <input type="hidden" name="id_usuario" value="{{ $users->id }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">ENTRAR CON MODO MAIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            MODO ADMIN
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">ENTRAR</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@push('javascript')
<script src="/dist/js/preview.js"></script>
@endpush