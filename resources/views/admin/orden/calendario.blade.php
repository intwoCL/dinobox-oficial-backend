@extends('layouts.app')
@section('title', $e->usuario->present()->nombre_completo()." - Atención - Edugestion")
@push('stylesheet')
<link href='/vendor/fullcalendar-v4.4.0/core/main.css' rel='stylesheet' />
<link href='/vendor/fullcalendar-v4.4.0/bootstrap/main.css' rel='stylesheet' />
<link href='/vendor/fullcalendar-v4.4.0/timegrid/main.css' rel='stylesheet' />
<link href='/vendor/fullcalendar-v4.4.0/daygrid/main.css' rel='stylesheet' />
<link href='/vendor/fullcalendar-v4.4.0/list/main.css' rel='stylesheet' />
@endpush
@section('content')
@component('components.button._back')
  {{-- @slot('route', route('tomadehora.index',$e->id_departamento)) --}}
  {{-- @slot('color', 'dark') --}}
  @slot('body', 'Agenda')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="sticky-top mb-3">
          <div class="card">
            <div class="card-header">
              {{--no aparece el nombre --}}
              <h4 class="card-title"><strong>{{ $e->usuario->present()->nombre_completo() }}</strong>&nbsp;&nbsp;<small>({{ $e->especialidad }})</small></h4>
            </div>
            <div class="card-body">

              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.create',$e->codigo) }}">
                    <i class="fas fa-calendar-alt text-primary mr-2"></i>
                    Agendar hora alumno
                  </a>
                </li>
                @if ($e->getConfigRegistrarVisita() == 1)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.create2',$e->codigo) }}">
                    <i class="fas fa-calendar-alt text-primary mr-2"></i>
                    Agendar hora visita
                  </a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.historial',$e->codigo) }}">
                    <i class="fas fa-list-alt text-danger mr-2"></i>
                    Historial
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.pendientes',$e->codigo) }}">
                    <i class="fas fa-calendar-week text-primary mr-2"></i>
                    Listado
                  </a>
                </li>
              </ul>


            @if ($e->id_usuario == auth('usuario')->user()->id)
              <hr>
              <p class="text-center"><strong>Panel</strong></p>

              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('especialidad.edit',$e->codigo) }}">
                    <i class="fas fa-calendar-alt text-primary mr-2"></i>
                    Actualizar especialidad
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('especialidad.motivos',$e->codigo) }}">
                    <i class="fas fa-th-list text-primary mr-2"></i>
                    Motivos
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.compartir',$e->codigo) }}">
                    <i class="fas fa-user-friends text-primary mr-2"></i>Colaboradores
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tomadehora.agenda.reportes',$e->codigo) }}">
                    <i class="fas fa-list-alt text-primary mr-2"></i>
                    Reportes
                  </a>
                </li>
              </ul>
            @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-body p-0">
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src='/vendor/fullcalendar-v4.4.0/core/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/interaction/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/bootstrap/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/daygrid/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/timegrid/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/list/main.js'></script>
<script src='/vendor/fullcalendar-v4.4.0/bundle/locales-all.js'></script>
<script>
$(function () {
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid','list'],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      navLinks: true, // can click day/week names to navigate views
      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      //Random default events
      events    : @json($calendario),
    });
    calendar.setOption('locale', 'es');
    calendar.render();
  })
</script>
@endpush