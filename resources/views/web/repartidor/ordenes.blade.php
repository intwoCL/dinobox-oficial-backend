@extends('web.repartidor.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('body', 'Ordenes de hoy')
@endcomponent
<section class="content">
  <div class="container">
    <button type="button" class="btn btn-primary rounded-circle" data-toggle="modal" data-target="#qrModal">
      <i class="fa fa-search"></i>
    </button>
    <div class="row pb-3">
      @foreach ($ordenes as $or)
      @php
        $orden = $or->orden;
      @endphp
      <div class="col-md-12">
        <a href="{{ route('web.repartidor.ordenShow',$orden->codigo) }}" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <div class="row">
              <div class="col-12">
                <h5 class="mb-1">
                  N° <strong>{{ $orden->codigo }}</strong>
                </h5>
              </div>
            </div>


            {{-- <h5 class="mb-1">{{ $or->orden->getFecha()->getDate() }}</h5> --}}
            {{-- <small class="text-muted">{{ $or->orden->getFecha()->getDate() }}</small> --}}
            <h5 class="mb-1">
              <span class="badge badge-pill badge-primary">
                <strong>{{ $orden->getEstado() }}</strong>
              </span>
            </h5>
          </div>
          {{-- <p class="mb-1">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus corporis, odit suscipit error ipsam nisi blanditiis dolorem, neque quos repudiandae, cumque iste libero. Aspernatur omnis ad dignissimos nostrum quo incidunt!
          </p> --}}
          {{-- <small class="text-muted">And some muted small print.</small> --}}
          <div class="row">
            <div class="col-6">
              <strong>Dirección:</strong> {{ $orden->getRemitenteDireccion() }}
              <br>
              <strong>Comuna:</strong> {{ $orden->remitenteComuna->nombre }}
            </div>
            <div class="col-6">
              <strong>Dirección:</strong> {{ $orden->getDestinatarioDireccion() }}
              <br>
              <strong>Comuna:</strong> {{ $orden->destinatarioComuna->nombre }}
            </div>
          </div>

          <div class="pt-2 mt-2">
            @foreach ($orden->getEstados() as $key => $item)
              <span class="btn-round {{ $key <= $orden->estado ? 'bg-success' : '' }} mr-2">
                <i class="fa fa-{{ $item[1] }}"></i>
              </span>
            @endforeach
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">Buscar código</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <section class="container" id="demo-content">
              <a class="btn btn-primary btn-sm mb-2" id="startButton"><i class="fas fa-camera"></i></a>
              <a class="btn btn-primary btn-sm mb-2" id="resetButton">Reset</a>


            <div class="col-md-12">
              <video id="video" width="100%" style="border: 1px solid gray"></video>
            </div>

            <div class="col-md-12">
              <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Change video source:</label>
                <select class="form-control" id="sourceSelect" style="max-width:400px">
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div style="display: table">
                <label for="decoding-style"> Decoding Style:</label>
                <select class="form-control" id="decoding-style" size="1">
                  <option value="once">Decode once</option>
                  <option value="continuously">Decode continuously</option>
                </select>
              </div>
            </div>

            <label>Result:</label>
            <pre><code id="result"></code></pre>
          </section>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

@endsection
@push('extra')
@include('layouts.repartidor._bar_menu')
@endpush
@push('javascript')
<script type="text/javascript" src="{{ asset('vendor/zxing/js/index.js') }}"></script>
<script type="text/javascript">
  function decodeOnce(codeReader, selectedDeviceId) {
    codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
      console.log(result)
      document.getElementById('result').textContent = result.text
    }).catch((err) => {
      console.error(err)
      document.getElementById('result').textContent = err
    })
  }

  function decodeContinuously(codeReader, selectedDeviceId) {
    codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'video', (result, err) => {
      if (result) {
        // properly decoded qr code
        console.log('Found QR code!', result)
        document.getElementById('result').textContent = result.text
      }

      if (err) {
        // As long as this error belongs into one of the following categories
        // the code reader is going to continue as excepted. Any other error
        // will stop the decoding loop.
        //
        // Excepted Exceptions:
        //
        //  - NotFoundException
        //  - ChecksumException
        //  - FormatException

        if (err instanceof ZXing.NotFoundException) {
          console.log('No QR code found.')
        }

        if (err instanceof ZXing.ChecksumException) {
          console.log('A code was found, but it\'s read value was not valid.')
        }

        if (err instanceof ZXing.FormatException) {
          console.log('A code was found, but it was in a invalid format.')
        }
      }
    })
  }

  window.addEventListener('load', function () {
    let selectedDeviceId;
    const codeReader = new ZXing.BrowserQRCodeReader();
    // console.log('ZXing code reader initialized');

    codeReader.getVideoInputDevices();
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId;
        if (videoInputDevices.length >= 1) {
          videoInputDevices.forEach((element) => {
            const sourceOption = document.createElement('option');
            sourceOption.text = element.label;
            sourceOption.value = element.deviceId;
            sourceSelect.appendChild(sourceOption);
          })

          sourceSelect.onchange = () => {
            selectedDeviceId = sourceSelect.value;
          };

          const sourceSelectPanel = document.getElementById('sourceSelectPanel');
          sourceSelectPanel.style.display = 'block';
        }

        document.getElementById('startButton').addEventListener('click', () => {

          const decodingStyle = document.getElementById('decoding-style').value;
          if (decodingStyle == "once") {
            decodeOnce(codeReader, selectedDeviceId);
          } else {
            decodeContinuously(codeReader, selectedDeviceId);
          }
          // console.log(`Started decode from camera with id ${selectedDeviceId}`);
        })

        document.getElementById('resetButton').addEventListener('click', () => {
          codeReader.reset();
          document.getElementById('result').value = '';
          console.log('Reset.')
        })

      })
      .catch((err) => {
        console.error(err)
      })
  })
</script>
@endpush