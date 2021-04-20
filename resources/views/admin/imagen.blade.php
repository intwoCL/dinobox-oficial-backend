@extends('layouts.app')
@section('content')
@push('stylesheet')
  <link rel="stylesheet" href="https://fengyuanchen.github.io/cropper.js/css/cropper.css">

  <style>
    .label {
      cursor: pointer;
    }

    .img-container img {
      max-width: 100%;
    }

    .dropzone {
      background: #f4f6f9;
      border-radius: 3px;
      border: 2px dashed rgb(0, 135, 247);
      border-image: none;
      max-width: 100%;
      /* max-height: 40px; */
      margin-left: auto;
      margin-right: auto;
    }

    .centrado{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255,255,255, 0.5);
      border-radius: 4px;
      padding: 5px;
    }

    .button-camera{
      position: absolute;
      top: 20%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255,255,255, 0.5);
      border-radius: 4px;
      padding: 5px;
    }
    .fondo-grey{
      background: rgba(255,255,255, 0.5);
    }

  </style>
@endpush
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
          <form class="form-horizontal form-submit" method="POST" action="{{ route('imagen.subir','departamento') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="fotoOriginal" id="fotoOriginal">
            <input type="text" name="foto" id="foto">
            <div class="card-body">
              <div class="form-group text-center dropzone" id="dropzone">
                <label class="label pt-2" data-toggle="tooltip" title="Agregar imagen">
                  <img id="avatar" src="https://avatars0.githubusercontent.com/u/3456749?s=400" alt="avatar" width="200" height="200">
                  <div class="centrado">
                    <i class="fa fa-edit" class="p-2"></i>
                    Upload Imagen
                  </div>
                </label>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Subir imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body fondo-grey">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item mr-2">
            <a class="nav-link active border border-dark border-bottom" id="pills-form-tab" data-toggle="pill" href="#pills-form" role="tab" aria-controls="pills-form" aria-selected="true">
              <i class="fa fa-image mr-2"></i> Subir Imagen
            </a>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link border border-dark border-bottom" id="pills-camera-tab" data-toggle="pill" href="#pills-camera" role="tab" aria-controls="pills-camera" aria-selected="false">
              <i class="fa fa-camera mr-2"></i> Camara
            </a>
          </li>
          {{-- Oculto --}}
          {{-- <li class="nav-item mr-2">
            <a class="nav-link border border-dark border-bottom" id="pills-url-tab" data-toggle="pill" href="#pills-url" role="tab" aria-controls="pills-url" aria-selected="false">
              <i class="fa fa-globe mr-2"></i> Web Address
            </a>
          </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-form" role="tabpanel" aria-labelledby="pills-form-tab">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group text-center dropzone" id="dropzone">
                  <label class="label pt-2" data-toggle="tooltip" title="Agregar imagen">
                    <img id="avatar2" src="https://avatars0.githubusercontent.com/u/3456749?s=400" alt="avatar2" width="200" height="200">
                    <input type="file" class="sr-only" id="input" name="input" accept="image/*">
                    <div class="centrado">
                      <i class="fa fa-edit" class="p-2"></i>
                      Upload Imagen
                    </div>
                  </label>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" id="buttonCrop">
                    <i class="fa fa-crop-alt"></i>
                    Recortar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-camera" role="tabpanel" aria-labelledby="pills-camera-tab">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-12 col-form-label dropzone text-center">
                    <video id="video" width="100%" height="480" autoplay></video>
                    <button id="snap" class="button-camera"><i class="fa fa-camera mr-2"></i>Tomar foto</button>
                  </div>
                  <canvas id="canvas" hidden width="640" height="480"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-url" role="tabpanel" aria-labelledby="pills-url-tab">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputnombre" class="col-sm-12 col-form-label">Public URL</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="url_link" id="url_link" autocomplete="off" placeholder="https://www.example.com/imagen.jpg" >
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary" onclick="searchURL()"><i class="fa fa-arrow-right"></i></button>
                    </span>
                    <div class="invalid-feedback">
                      Error al cargar la imagen
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-12 dropzone col-form-label text-center">
                    <img id="avatar3" src="https://avatars0.githubusercontent.com/u/3456749?s=400" alt="avatar" width="200" height="200">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary" id="save">Guardar</button> --}}
      </div>
    </div>
  </div>
</div>


{{-- Modal Crop --}}
<div class="modal fade" id="modalCrop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Recortar imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="crop">Finalizar recorte</button>
      </div>
    </div>
  </div>
</div>


@endsection
@push('javascript')
<script src="https://fengyuanchen.github.io/cropper.js/js/cropper.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', function () {

    // Parte uno
    var avatar = document.getElementById('avatar');

    var dropzone = document.getElementById('dropzone');
    var $modal = $('#modal');

    // Modal
    var input = document.getElementById('input');
    var foto = document.getElementById('foto');
    var fotoOriginal = document.getElementById('fotoOriginal');


    var avatar2 = document.getElementById('avatar2');

    // Modal crop
    var image = document.getElementById('image');
    var buttonCrop = document.getElementById('buttonCrop');

    var $modalCrop = $('#modalCrop');
    var cropper;

    // URL
    var avatar3 = document.getElementById('avatar3');


    $('[data-toggle="tooltip"]').tooltip();

    dropzone.addEventListener('click', function(e) {
      $modal.modal('show');
    });

    input.addEventListener('change', function (e) {
      var files = e.target.files;

      var done = function (url) {
        image.src = url;
        $modalCrop.modal('show');
      };

      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    buttonCrop.addEventListener('click', function (e) {
      $modalCrop.modal('show');
    });

    $modalCrop.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
        dragMode: 'move',
        aspectRatio: 1,
        viewMode: 3,
      });
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    document.getElementById('crop').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;

      $modalCrop.modal('hide');

      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: 400,
          height: 400,
        });
        initialAvatarURL = avatar.src;
        var ImgToDataURL = canvas.toDataURL();
        fotoOriginal.value = ImgToDataURL;
        avatar.src = ImgToDataURL;
        avatar2.src = ImgToDataURL;
        foto.value = ImgToDataURL;
      }
    });
  });

</script>

{{--
//Es es para las url
<script>
  function isBase64(encodedString) {
    var regexBase64 = /^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$/;
    return regexBase64.test(encodedString);   // return TRUE if its base64 string.
  }

  function isValidHttpUrl(string) {
    let url;
    try { url = new URL(string);} catch (_) { return false; }
    return url.protocol === "http:" || url.protocol === "https:";
  }

  function searchURL(){
    let url_link = document.getElementById('url_link');
    $("#url_link").removeClass("is-invalid");
    // console
    if(url_link.value){
      if(isBase64(url_link.value)){
        avatar3.src = url_link.value;
      }else{
        if(isValidHttpUrl(url_link.value)){

          let config = {
            responseType: 'arraybuffer',
            headers: {
              // "Content-Type": "application/json",
              'Access-Control-Allow-Origin': '*',
            }
          };

          axios
            .get(url_link.value, config)
            .then(response => {
              console.log(response);

              let base64 = btoa(
                new Uint8Array(response.data).reduce(
                  (data, byte) => data + String.fromCharCode(byte),
                  '',
                ),
              );

              base64 = "data:;base64," + base64;
              avatar3.src = base64;
              avatar2.src = base64;
              avatar.src = base64;
              foto.value = base64;
              image.src = base64;

            }).catch(e => {
              console.log(e);
              $("#url_link").addClass("is-invalid");
            });
        }else{
          $("#url_link").addClass("is-invalid");
        }
      }
    }else{
      $("#url_link").addClass("is-invalid");
    }
  }
</script> --}}
<script>
    document.getElementById('pills-form-tab').addEventListener('click', function(e) {
      navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(mediaStream => {
          const stream = mediaStream;
          const tracks = stream.getTracks();
          tracks[0].stop();
          tracks.forEach(track => track.stop())
        })
    });

    document.getElementById('pills-camera-tab').addEventListener('click', function(e) {
      // Grab elements, create settings, etc.
      var video = document.getElementById('video');
      // Get access to the camera!
      if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
          //video.src = window.URL.createObjectURL(stream);
          video.srcObject = stream;
          video.play();
        });
      }

      /* Legacy code below: getUserMedia
      else if(navigator.getUserMedia) { // Standard
          navigator.getUserMedia({ video: true }, function(stream) {
              video.src = stream;
              video.play();
          }, errBack);
      } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
          navigator.webkitGetUserMedia({ video: true }, function(stream){
              video.src = window.webkitURL.createObjectURL(stream);
              video.play();
          }, errBack);
      } else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
          navigator.mozGetUserMedia({ video: true }, function(stream){
              video.srcObject = stream;
              video.play();
          }, errBack);
      }
      */

      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      var video = document.getElementById('video');

      // Trigger photo take
      document.getElementById("snap").addEventListener("click", function() {
        console.log('Foto');
        context.drawImage(video, 0, 0, 640, 480);

        var ImgToDataURL = canvas.toDataURL();
        avatar.src = ImgToDataURL;
        avatar2.src = ImgToDataURL;
        foto.value = ImgToDataURL;
        fotoOriginal.value = ImgToDataURL;
        image.src = ImgToDataURL;

        $('#pills-form-tab').click();
      });
  });
</script>
@endpush
