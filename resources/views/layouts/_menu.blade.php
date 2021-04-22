@php
  function active($url){return request()->is($url) ? 'active' : '';}
  function open($url){return request()->is($url) ? 'menu-open' : '';}
  $name = '';
  $img = '';
  $modeMain = [];

  if(auth('usuario')->check()){
    $name = current_user()->present()->nombre_completo();
    $img  = current_user()->present()->getPhoto();
    // $p = current_user()->me();
    // $plataforma_evento     = $p['evento'];
    // $plataforma_votacion   = $p['votacion'];
    // $plataforma_bicicleta  = $p['bicicleta'];
    // $plataforma_tutoria    = $p['tutoria'];
    // $plataforma_formulario = $p['formulario'];
    // $plataforma_servicio   = $p['servicio'];
    // $plataforma_chat       = $p['chat'];
    // $plataforma_atencion   = $p['atencion'];
    // $plataforma_alumno     = $p['alumno'];
    // $plataforma_usuario    = $p['usuario'];

    $modeMain = session()->get('modeMain');
  }
@endphp
<aside class="main-sidebar sidebar-dark-dark elevation-4">
  <!-- Brand Logo -->
  {{-- <a href="{{ route('home.index') }}" class="brand-link bg-white"> --}}
    {{-- <span class="brand-text font-weight-light">Gestión Estudiantil</span> --}}
    {{-- <span class="brand-text">Gestión Estidiantil</span> --}}
    {{-- <img src="{{ $logo }}" alt="Sistema Edugestión Estudiantil" class="brand-image brand-text elevation-3"> --}}

  {{-- </a> --}}
  <a href="{{ route('home') }}" class="brand-link bg-info text-sm">
    <span class="brand-text font-weight-light">Panel</span>
    <span class="brand-text"><b> Administrativo</b></span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ $img }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('settings.profile') }}" class="d-block">{{ $name }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

        @if (!empty($modeMain))
        @if ($modeMain['modeMain'])
        <li class="nav-item">
          <a href="#" class="nav-link bg-danger">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              MODO MAIN
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <form action="{{ route('auth.modeMain.user') }}" method="post">
                @csrf
                <div class="nav-icon ">
                  <button class="btn btn-danger">SALIR MODO MAIN</button>
                </div>
              </form>
            </li>
          </ul>
        </li>
        <br>
        @endif
        @endif

        <li class="nav-item {{ open('home*') }}">
          <a href="/home" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>

        <li class="nav-header">Gestión</li>


        <li class="nav-item {{ open('panel/votacion*') }} {{ open('votacion*') }}">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-vote-yea"></i>
            <p>Otro elementos</p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>