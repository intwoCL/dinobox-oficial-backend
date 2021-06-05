@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('web.repartidor.ordenShow',$orden->codigo))
  @slot('color', 'secondary')
  @slot('body', "Retiro orden <strong>$orden->codigo</strong>")
@endcomponent
<section class="content">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="list-group-item list-group-item-action" data-toggle="modal" data-target="#infoModal">
          <div class="d-flex w-100 justify-content-between pb-2">
            {{-- <h4 class="mb-1">
              <span class="badge badge-primary">{{ $orden->getEstado() }}</span>
            </h4> --}}
            <small class="text-muted">{{ $orden->getFecha()->getDate() }}</small>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>{{ $orden->remitente_nombre }}</p>
              <p>{{ $orden->remitente_direccion . ' ' . $orden->remitente_numero }}</p>
              <p>{{ $orden->remitenteComuna->nombre }}</p>
            </div>
            <div class="col-md-12">
              <p>
                <strong>Mensaje:</strong>{{ $orden->mensaje }}
              </p>
            </div>
          </div>
        </div>
      </div>
      @if ($orden->estado == 30)

      <div class="col-md-12">
        <div class="list-group-item border border-primary">
          <form class="form-submit" action="{{ route('web.repartidor.formulario.retiro',$orden->codigo) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="or" value="{{ $ordenRepartidor->id }}">

            <div class="form-group row">
              <div class="input-group">
                <div class="col-form-label col-sm-2 col-md-2"><strong>¿Es el usuario?</strong></div>
                <label class="switch">
                  <input type="checkbox" name="checkbox_user" id="checkbox_user" class="success" onclick="checkUser()">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div id="checkbox_user_text" class="hidden">
              <div class="form-group row">
                <label for="f1" class="col-form-label col-sm-2">Rut<small class="text-danger">*</small></label>
                <div class="input-group col-sm-5">
                  <input type="text" id="run_orden" class="form-control" name="run" placeholder="Ej: 19222888K"
                    required="" maxlength="9" min="8" value="{{ $orden->recepcion_remitente_rut }}" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)">
                  <small id="error" class="text-danger"></small>
                </div>
                {!! $errors->first('run','<small id="run" class="form-text text-danger text-center">:message</small>') !!}
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre y Apellido<small class="text-danger">*</small></label>
                <div class="col-sm-5">
                  <input type="text" id="nombre_orden" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="{{ old('nombre') }}" placeholder="Nombres" required>
                  {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputnombre" class="col-sm-2 col-form-label">
                Foto orden recepcionada<small class="text-danger">*</small>
              </label>
              <div class="file-upload col-sm-5">
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' name="image" onchange="readURL(this);" accept="image/*" required/>
                  <div class="drag-text">
                    <h3>
                      <i class="fas fa-camera text-primary"></i>
                    </h3>
                  </div>
                </div>
                <div class="file-upload-content image-upload-wrap">
                  <img class="file-upload-image" src="#" alt="your image" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="btn btn-danger">
                      <small>ELIMINAR</small>
                      {{-- <span class="image-title">Uploaded Image</span> --}}
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <button type="button" {{ $orden->estado == 30 ? '' : 'disabled' }} class="btn btn-success btn-lg btn-block py-3" data-toggle="modal" data-target="#infoModal">
                <strong>GUARDAR</strong>
              </button>
            </div>

            {{-- [ MODAL SUBMIT ] --}}
            <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="labelNotificacion" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="labelNotificacion">ENVIAR FORMULARIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      <strong>ENVIAR</strong>
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
      @else
      <div class="col-md-12">
        <div class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between pb-2">
            <small class="text-muted">{{ $orden->getFecha()->getDate() }}</small>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>{{ $orden->recepcion_remitente_run }}</p>
              <p>{{ $orden->recepcion_remitente_nombre }}</p>
            </div>
            <div class="col-md-12">
              <img class="img-thumbnail" width="100%" height="100px" src="{{ asset($orden->present()->getImagenRemitente()) }}" alt="">
            </div>
          </div>
        </div>
      </div>

      @endif

    </div>
  </div>
</section>

@endsection
@push('extra')
{{-- @include('layouts.repartidor._bar_menu_orden') --}}
@endpush
@push('javascript')
<script src="/dist/js/validate-run.js"></script>
<script>
  function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      // $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.image-upload-wrap').show();
  $('.file-upload-content').hide();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});

function checkUser() {
  var checkUser = document.getElementById("checkbox_user");
  var formulario = document.getElementById("checkbox_user_text");
  var runOrden = document.getElementById("run_orden");
  var nombreOrden = document.getElementById("nombre_orden");

  if (checkUser.checked == true){
    formulario.style.display = "none";
    runOrden.removeAttribute("required");
    nombreOrden.removeAttribute("required");
  } else {
    formulario.style.display = "block";
    runOrden.setAttribute("required",true);
    nombreOrden.setAttribute("required",true);
  }
}
</script>

@endpush