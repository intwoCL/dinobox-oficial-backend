@php
  $cantidad = current_stand()->cantidad;
  $size = $cantidad == 1 ? false : true;
@endphp
@extends('web.evento.app')
@push('stylesheet')
<link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">

@endpush
@section('content')
<div class="container py-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Inscripción de Alumnos</h3>
          <div class="col">
            <button type="button" class="btn btn-danger  float-right btn-sm" onclick="descargarPDF('tabla1','ReportePDF-alumno-{{ current_stand()->nombre }}')"> <i class="fa fa-file-pdf"></i> Descargar PDF </button>
            <button type="button" class="btn btn-success float-right btn-sm mr-2" onclick="exportarExcel('tabla1','ReporteExcel-alumno-{{ current_stand()->nombre }}')"><i class="fa fa-file-excel"></i> Descargar Excel</button>
          </div>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table id="tabla1" class="table table-head-fixed">
            <thead>
            <tr>
              <th>#</th>
              <th>Rut</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Institución</th>
              <th>Sede</th>
              @if ($size)
              <th>Cantidad</th>
              @endif
            </tr>
            </thead>
            <tbody>
            @php $count = 1; @endphp
            @foreach ($alumnos_stand as $a)
              <tr>
              <td>{{ $count++ }}</td>
              <td>{{ $a->alumno->run }}</td>
              <td>{{ $a->alumno->present()->nombre_completo() }}</td>
              <td>{{ $a->alumno->correo }}</td>
              <td>{{ $a->alumno->carrera->getName() }}</td>
              <td>{{ $a->alumno->sede->nombre }}</td>
              @if ($size)
                <th>{{ $a->contador }} de {{ $cantidad }}</th>
              @endif
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @if (count($visitas_stand)>0)
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Inscripción de Visitas</h3>
          <button type="button" class="btn btn-danger  float-right btn-sm" onclick="descargarPDF('tabla2','ReportePDF-visita-{{ current_stand()->nombre }}')"> <i class="fa fa-file-pdf"></i> Descargar PDF </button>
          <button type="button" class="btn btn-success float-right btn-sm mr-2" onclick="exportarExcel('tabla2','ReporteExcel-visita-{{ current_stand()->nombre }}')"><i class="fa fa-file-excel"></i> Descargar Excel</button>
        </div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table id="tabla2" class="table table-head-fixed">
            <thead>
            <tr>
              <th>#</th>
              <th>Rut</th>
              <th>Nombre</th>
              <th>Institución</th>
              <th>Sede</th>
              @if ($size)
              <th>Cantidad</th>
              @endif
            </tr>
            </thead>
            <tbody>
            @php $count = 1; @endphp
            @foreach ($visitas_stand as $v)
              <tr>
                <td>{{ $count++ }}</td>
                {{-- <td>{{ $v->id_visita_inscripcion }}</td> --}}
                <td>{{ $v->run }}</td>
                <td>{{ $v->nombre }}</td>
                <td>{{ $v->institución }}</td>
                <td>{{ $v->tipo_visita->nombre }}</td>
                @if ($size)
                <th>{{ $v->contador }} de {{ $cantidad }}</th>
              @endif
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
@push('javascript')
<script src="/vendor/jspdf/js/jspdf.min.js"></script>
<script src="/vendor/jspdf/js/jspdf.plugin.autotable.js"></script>
<script>
  function descargarPDF(table,nombre) {
    var doc = new jsPDF();
    doc.autoTable({html: `#${table}`});
    doc.save( nombre+'.pdf');
  }
</script>
<script src="/dist/js/excel.js"></script>
@endpush