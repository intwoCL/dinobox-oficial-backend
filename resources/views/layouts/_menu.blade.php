@php
  function active($url){return request()->is($url) ? 'active' : '';}
  function open($url){return request()->is($url) ? 'menu-open' : '';}
  $name = '';
  $img = '';
  $modeMain = [];

  if(auth('usuario')->check()){
    $name = current_user()->present()->nombre_completo();
    $img  = current_user()->present()->getPhoto();
    $p = current_user()->me();
    $plataforma_evento     = $p['evento'];
    $plataforma_votacion   = $p['votacion'];
    $plataforma_bicicleta  = $p['bicicleta'];
    $plataforma_tutoria    = $p['tutoria'];
    $plataforma_formulario = $p['formulario'];
    $plataforma_servicio   = $p['servicio'];
    $plataforma_chat       = $p['chat'];
    $plataforma_atencion   = $p['atencion'];
    $plataforma_alumno     = $p['alumno'];
    $plataforma_usuario    = $p['usuario'];

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
      @if ($plataforma_evento || $plataforma_votacion || $plataforma_atencion[0])
        <li class="nav-header">Gestión</li>
        @if ($plataforma_evento)
        <li class="nav-item {{ open('panel/evento*') }} {{ open('stand*') }} {{ open('evento*') }}">
          <a href="{{ route('panel.evento') }}" class="nav-link">
            <i class="nav-icon fas fa-award"></i>
            <p>Eventos</p>
          </a>
        </li>
        @endif
        @if ($plataforma_votacion)
        <li class="nav-item {{ open('panel/votacion*') }} {{ open('votacion*') }}">
          <a href="{{ route('panel.votacion') }}" class="nav-link">
            <i class="nav-icon fas fa-vote-yea"></i>
            <p>Votaciones</p>
          </a>
        </li>
        @endif
        @if ($plataforma_atencion[0])
          @if ($plataforma_atencion[1])
          <li class="nav-item {{ open('panel/atencion*') }} {{ open('atencion*') }} {{ open('panel/agenda*') }} {{ open('panel/especialidad*') }}">
            <a href="{{ route('panel.tomadehora') }}" class="nav-link">
              <i class="nav-icon fas fa-user-clock"></i>
              <p>Gestionar atención</p>
            </a>
          </li>
          @endif

          @if ($plataforma_atencion[2])
          <li class="nav-item {{ open('panel/admin-atencion*') }}">
            <a href="{{ route('panel.admintomadehora') }}" class="nav-link">
              <i class="nav-icon fas fa-user-clock"></i>
              <p>Reportes atención</p>
            </a>
          </li>
          @endif
        @endif
      @endif
        @if ($plataforma_tutoria[0])
          @if ($plataforma_tutoria[1])
          <li class="nav-header">Tutorias</li>
          <li class="nav-item {{ open('tutoria/calendario*') }}">
            <a href="{{ route('tutoria.tutor.calendar') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Agenda</p>
            </a>
          </li>
          <li class="nav-item {{ open('tutoria/alumnos*') }} {{ open('tutoria/alumno*') }}">
            <a href="{{ route('tutoria.tutor.index') }}" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>Tutoría</p>
            </a>
          </li>
          @endif
          @if ($plataforma_tutoria[2])
          <li class="nav-header">Tutorias - Coordinador</li>
          <li class="nav-item {{ open('panel/tutoria/reportes') }} {{ open('tutoria/reporte*') }}">
            <a href="{{ route("panel.tutoria.coordinadorReporte") }}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Reportes</p>
            </a>
          </li>
          <li class="nav-item {{ open('panel/tutoria/coordinador') }} {{ open('tutoria/coordinador*') }}">
            <a href="{{ route("panel.tutoria.coordinador") }}" class="nav-link">
              <i class="nav-icon fas fa-vote-yea"></i>
              <p>Gestionar Tutores</p>
            </a>
          </li>
          @endif
        @endif
        @if ($plataforma_bicicleta[0])
        <li class="nav-header">Estacionamiento</li>
        <li class="nav-item {{ open('bicicletas*') }} {{ open('bicicleta*') }}">
          <a href="{{ route('bicicleta.index') }}" class="nav-link">
            <i class="nav-icon fas fa-biking"></i>
            <p>Bicicletas</p>
          </a>
        </li>
        @endif
        @if ($plataforma_formulario)
        <li class="nav-header">Control</li>
        <li class="nav-item {{ open('panel/formulario*') }}">
          <a href="{{ route('panel.formulario') }}" class="nav-link">
            <i class="nav-icon fas fa-fingerprint"></i>
            <p>Formularios</p>
          </a>
        </li>
        @endif

        @if ($plataforma_servicio)
        <li class="nav-item {{ open('servicio*') }}">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-concierge-bell"></i>
            <p>Servicio</p>
          </a>
        </li>
        @endif
        {{-- sala de video llamada --}}
        @if ($plataforma_chat)
        <li class="nav-item {{ open('sala*') }}">
          <a href="{{ route('sala.index') }}" class="nav-link">
            <i class="nav-icon fab fa-chromecast"></i>
            <p>Chat</p>
          </a>
        </li>
        @endif
        {{-- Alumno --}}
        @if ($plataforma_usuario || $plataforma_alumno)
        <li class="nav-header">Usuarios</li>
        @endif
        @if ($plataforma_alumno)
        <li class="nav-item {{ open('admin/alumno*') }}">
          <a href="{{ route('admin.alumno.index') }}" class="nav-link">
            <i class="fas fa-user-graduate nav-icon"></i>
            <p>Alumnos</p>
          </a>
        </li>
        @endif
        @if ($plataforma_usuario)
        <li class="nav-item {{ open('admin/usuarioGeneral*') }}">
          <a href="{{ route('admin.usuarioGeneral.index') }}" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>Usuarios</p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</aside>