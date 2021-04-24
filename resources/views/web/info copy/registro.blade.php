@extends('web.evento.app')
@push('stylesheet')
<title>@yield('title', 'Registro evento - Edugestion')</title>
<link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@if (current_stand()->inscribir_alumno)
<form-evento
  photo="{{ current_stand()->present()->getPhoto() }}"
  :current-stand="{{ current_stand() }}"
  :current-evento="{{current_stand()->evento }}"
  post-search="{{ route('web.evento.api.search') }}"
  post-register="{{ route('web.evento.api.register.alumno') }}"
  ></form-evento>
@endif

@if (count(current_stand()->inscritosActive)>0)
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de alumnos inscritos</h3>
        </div>
        <div class="card-body table-responsive">
        <table id="tableinscritos" class="table  table-hover table-sm">
          <thead>
          <tr>
            <th>Run</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach (current_stand()->inscritosActive as $ins)
            <tr>
              <td>{{ $ins->alumno->run }}</td>
              <td>{{ $ins->alumno->present()->nombre_completo() }}</td>
              <td>{{ $ins->alumno->carrera->getName() }}</td>
              <td>
                <form action="{{ route('web.evento.api.register.alumno') }}" method="post">
                  @csrf
                  <input type="hidden" name="format" value="html">
                  <input type="hidden" name="rut" value="{{ $ins->run }}">
                  <input type="hidden" name="id" value="{{ $ins->id_alumno }}">
                  <button type="submit" class="btn btn-xs btn-info">REGISTRAR</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

@if (count(current_stand()->inscritosVisitaActive)>0)
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de visitas inscritas</h3>
        </div>
        <div class="card-body table-responsive">
        <table id="tableinscritos" class="table  table-hover table-sm">
          <thead>
          <tr>
            <th>Run</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach (current_stand()->inscritosVisitaActive as $ins)
            <tr>
              <td>{{ $ins->run }}</td>
              <td>{{ $ins->nombre }}</td>
              <td>{{ $ins->correo }}</td>
              <td>
                <form action="{{ route('web.evento.visitas') }}" method="post">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="view" value="registro">
                  <input type="hidden" name="rut" value="{{ $ins->run }}">
                  <input type="hidden" name="id" value="{{ $ins->id }}">
                  <button type="submit" class="btn btn-xs btn-info">REGISTRAR</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endif


@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableinscritos").DataTable();
  });
</script>
@endpush