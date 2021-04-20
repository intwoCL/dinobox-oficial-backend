@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sala de vídeo</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Formulario</li>
          </ol>
        </div> --}}
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div id="meet"></div>
      </div>
    </div>
  </section>
@endsection
@push('javascript')


<script src = 'https://meet.jit.si/external_api.js'> </script>

  {{-- Configuracion --}}
    @if (current_user()->id == $sala->id_usuario)
    <script>
      var interfaceConfig = {

        TOOLBAR_BUTTONS: [
            'microphone',
            'camera',
            'closedcaptions',
            'desktop',
            'fullscreen',
            'fodeviceselection',
            'hangup',                //SAlir
            'profile',
            // 'info',               //ver el link
            'chat',
            'recording',             //grabar
            'livestreaming',      //admin lo puede hacer
            'etherpad',
            // 'sharedvideo',        //admin lo puede hacer
            'settings',
            'raisehand',              //manito
            'videoquality',           //calidad de video
            'filmstrip',
            'invite',
            'feedback',
            'stats',
            'shortcuts',
            'tileview',
            'videobackgroundblur',
            'download',
            'help',
            'mute-everyone',    //administrador
            'e2ee'
        ],

        SETTINGS_SECTIONS: [
          'devices',
          'language',
          'moderator',
          'profile',
          // 'calendar'
        ],
        SHOW_CHROME_EXTENSION_BANNER: false
      };
    </script>
    @else
    <script>
      var interfaceConfig = {

        TOOLBAR_BUTTONS: [
            'microphone',
            'camera',
            'closedcaptions',
            'desktop',
            'fullscreen',
            'fodeviceselection',
            'hangup',                //SAlir
            'profile',
            // 'info',               //ver el link
            'chat',
            // 'recording',             //grabar
            // 'livestreaming',      //admin lo puede hacer
            'etherpad',
            // 'sharedvideo',        //admin lo puede hacer
            // 'settings',
            'raisehand',              //manito
            'videoquality',           //calidad de video
            'filmstrip',
            // 'invite',
            'feedback',
            // 'stats',
            'shortcuts',
            'tileview',
            'videobackgroundblur',
            // 'download',
            // 'help',
            // 'mute-everyone',    //administrador
            'e2ee'
        ],

        SETTINGS_SECTIONS: [
          'devices',
          'language',
          'moderator',
          'profile',
          // 'calendar'
        ],
        // MOBILE_APP_PROMO: false, // no android
        SHOW_CHROME_EXTENSION_BANNER: false
      };
    </script>
  @endif

  <script>
    const domain = 'meet.jit.si';
    const options = {
      roomName: '{{ $sala->name_room() }}',
      width: '100%',
      height: 500,
      parentNode: document.querySelector('#meet'),
      userInfo: {
        email: "{{ current_user()->correo }}",
        displayName: "{{ current_user()->nombre }}",
      },
      noSsl: true,
      interfaceConfigOverwrite: interfaceConfig,
    };
    const api = new JitsiMeetExternalAPI(domain, options);
  </script>
@endpush