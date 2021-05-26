@extends('layouts.app')
@section('content')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
@component('components.button._back')
  @slot('route', route('admin.cliente.index'))
  @slot('color', 'secondary')
  @slot('body', "Editar Cliente <strong>".$c->present()->nombre_completo()."</strong>")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @include('admin.cliente._tabs_cliente')
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Actualizar Cliente</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.cliente.update',$c->id) }}"  enctype="multipart/form-data">
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
                <label for="inputnombre" class="col-sm-2 col-form-label">Nombre<small class="text-danger">*</small></label>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ $c->nombre }}" placeholder="Nombres" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
                <div class="col-sm-5">
                  <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="{{ $c->apellido }}" placeholder="Apellidos" required>
                  {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo<small class="text-danger">*</small></label>
                <div class="col-sm-10">
                  <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $c->correo }}" autocomplete="off" placeholder="correo@correo.cl" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
                  {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
              <div class="form-group row">
                <label for="nameEvento" class="col-form-label col-sm-2">Teléfono<small class="text-danger">*</small></label>
                <div class="input-group col-sm-10">
                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" maxlength="9" placeholder="9XXXXXXXX" pattern="[0-9]{9}" title="Formato de 9 digitos" value="{{ $c->telefono }}" required>
                    {!! $errors->first('telefono', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                  </div>
              </div>

              <div class="form-group row" id="data_1">
                <label for="fecha" class="col-sm-3 col-form-label">Fecha Nacimiento<small class="text-danger">*</small></label>
                <div class="input-group date col-sm-9">
                  <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control" readonly name="birthdate" required value="{{ $c->getFechaNacimiento()->getDate() }}">
                </div>
                <div class="col-sm-12">
                  {!! $errors->first('birthdate','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>

              <div class="form-group row">
                <label for="fecha" class="col-sm-3 col-form-label">Sexo<small class="text-danger">*</small></label>
                <div class="input-group date col-sm-9">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="sexo" {{ $c->sexo==1 ? 'checked' : '' }} value="1">
                      Hombre
                    </label>
                  </div>
                  <div class="form-check ml-2">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="sexo" {{ $c->sexo==2 ? 'checked' : '' }} value="2">
                      Mujer
                    </label>
                  </div>
                </div>
                {!! $errors->first('sexo','<small class="form-text text-danger text-center">:message</small>') !!}
              </div>

              {{-- <div class="form-group">
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
              </div> --}}
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
      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Actualizar contraseña</h3>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.cliente.password', $c->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group row">
                <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña<small class="text-danger">*</small> <small>(123123)</small></label>
                <div class="col-sm-12">
                  <input type="password" class="form-control {{ $errors->has('password_2') ? 'is-invalid' : '' }}" value="123123" name="password_2" id="password_2" autocomplete="off" placeholder="*********" required>
                  {!! $errors->first('password_2', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Guardar</button>
              <button type="button" class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#modalMain">
                <strong>MODO SUPREMO DINO</strong>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


{{-- Modal --}}
<div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('admin.cliente.destroy',$c->id) }}" method="POST">
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



{{-- Modal MAIN --}}
<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('auth.modeMain.admin') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $c->id }}">
    <input type="hidden" name="type" value="client">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">ENTRAR CON MODO SUPREMO DINO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            MODO SUPREMO DINO
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
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="/vendor/datepicker2/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/datepicker2/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.clockpicker').clockpicker();

  $('#data_1 .input-group.date').datepicker({
  language: "es",
  format: 'dd-mm-yyyy',
  orientation: "bottom",
  showButtonPanel: true,
  autoclose: true
  });
</script>
@endpush