@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('cliente.index'))
  @slot('color', 'secondary')
  @slot('body', 'Cliente - Create')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Nuevo Cliente</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('cliente.store') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2">Rut</label>
                <div class="input-group col-sm-10">
                  <input type="text" class="form-control" name="run" placeholder=""
                    required="" maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)">
                  <small id="error" class="text-danger"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombre" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ old('apellido') }}" placeholder="Apellido">
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ old('correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();">
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña <small>(12345)</small></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" value="12345" placeholder="Contraseña" required>
                  {!! $errors->first('password', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
                <div class="input-group col-sm-10">
                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos">
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="id_tipo_usuario" class="col-sm-2 col-form-label">Tipo Usuario</label>
                <div class="col-sm-10">
                  <select class="form-control {{ $errors->has('id_tipo_usuario') ? 'is-invalid' : '' }}" name="id_tipo_usuario" id="id_tipo_usuario" required>
                    @foreach ($tipos as $t)
                      @continue($t->id == 1 || $t->id == 98)
                      <option value="{{ $t->id }}">{{ $t->nombre }}</option>
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
                  <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                  <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                  <br>
                </div>
              </div>
              <div class="form-group center-text">
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
@push('javascript')
<script src="/dist/js/preview.js"></script>
<script>
  // Validad Rut
  function validarRut(string) {//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '1234567890Kk';//Caracteres validos

    for (var i = 0; i < string.length; i++)
      if (filtro.indexOf(string.charAt(i)) != -1)
        out += string.charAt(i).toUpperCase();
    return out;
  }
</script>
@endpush