@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Perfil - Actualizar usuario</h1>
      </div>
    </div>
  </div>
</section>
@component('components.button._back')
  @slot('route', route('admin.cliente.index'))
  @slot('color', 'secondary')
  @slot('body', "Editar Cliente <strong>".$c->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Actualizar Usuario</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('usuario.auth.update') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" value="{{ $u->username }}" readonly placeholder="Nombre de usuario" required>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombres</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ $u->nombre }}" placeholder="nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $u->apellido }}" placeholder="apellido" required>
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $u->correo }}" placeholder="example@correo.cl" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Imagen <small>(Opcional)</small></label>
                <div class="input-group">
                  <img src="{{ $u->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
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
      <div class="col-md-5">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('usuario.auth.password') }}"  enctype="multipart/form-data">
            @csrf
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
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Cambiar Tema</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('usuario.auth.theme') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="selector form-group" hidden id='theme-system-selector'>
                <label>Select</label>
                <select class="form-control">
                  <option value='bootstrap' selected>Bootstrap 4</option>
                  <option value='standard'>unthemed</option>
                </select>
                </div>

                <div class="selector form-group" data-theme-system="bootstrap">
                <label>Seleccionar tema</label>
                <select class="form-control" name="theme">
                  <option value='default' selected>Sistema Edugestión</option>
                  {{-- <option value='me-dark'>new Dark</option> --}}
                  <option value='cerulean'>Cerulean</option>
                  <option value='cosmo'>Cosmo</option>
                  <option value='cyborg'>Cyborg</option>
                  <option value='darkly'>Darkly</option>
                  <option value='flatly'>Flatly</option>
                  <option value='journal'>Journal</option>
                  <option value='litera'>Litera</option>
                  <option value='lumen'>Lumen</option>
                  <option value='lux'>Lux</option>
                  <option value='materia'>Materia</option>
                  <option value='minty'>Minty</option>
                  <option value='pulse'>Pulse</option>
                  <option value='sandstone'>Sandstone</option>
                  <option value='simplex'>Simplex</option>
                  <option value='sketchy'>Sketchy</option>
                  <option value='slate'>Slate</option>
                  <option value='solar'>Solar</option>
                  <option value='spacelab'>Spacelab</option>
                  <option value='superhero'>Superhero</option>
                  <option value='united'>United</option>
                  <option value='yeti'>Yeti</option>
                </select>
                </div>
            </div>
            <span id='loading' style='display:none'>Cargando tema...</span>
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
<script src='/js/theme-chooser.js'></script>
<script>
  initThemeChooser();
</script>
<script src="/js/preview.js"></script>
@endpush