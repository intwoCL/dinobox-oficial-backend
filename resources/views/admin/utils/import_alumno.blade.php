@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('admin.utils.index'))
  @slot('color', 'secondary')
  @slot('body', 'Subir alumnos')
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Importar alumnos</h3>
            <a href="/template/TEMPLATE_ALUMNO.xlsx" class="btn btn-primary float-right btn-sm">Descargar template</a>
          </div>
          <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.utils.import.alumnos') }}"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="hf-rut">SUBIR ARCHIVO</label>
                <div class="col-sm-8">
                  <input type="file" name="document" accept="" required/>
                </div>
              </div>
              <div class="form-group row">
                <label for="type" class="col-sm-4 col-form-label">ACCIÓN</label>
                <div class="col-sm-8">
                  <select name="type" id="type" class="form-control" required>
                    <option value="ADD">AGREGAR</option>
                    <option value="UPDATE">ACTUALIZAR</option>
                    <option value="DELETE">ELIMINAR</option>
                  </select>
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="format" class="col-sm-4 col-form-label">Formato</label>
                <div class="col-sm-8">
                  <select name="format" id="format" class="form-control" required>
                    <option value="excel">EXCEL</option>
                    <option value="excel" selected>CSV</option>
                  </select>
                </div>
              </div> --}}
              {{--
              <div class="form-group row">
                <label for="delimitador" class="col-sm-4 col-form-label">Delimitador CSV</label>
                <div class="col-sm-8">
                  <select name="delimitador" id="delimitador" class="form-control" required>
                    <option value=";">;</option>
                    <option value=",">,</option>
                    <option value=":">:</option>
                  </select>
                </div>
              </div> --}}

              {{-- <div class="form-group row">
                <label class="col-sm-4 col-form-label">Codificación</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control" readonly value="UTF-8"/>
                </div>
              </div> --}}
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Subir</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <p>Instrucciones: Este agregará a los nuevos alumnos en casa si existe notificará el usuario con problema</p>
            <ul>
              <li><strong>RUN</strong> sin puntos ni guion con K mayuscula</li>
              {{-- <li></li> --}}
              {{-- <li>asd</li> --}}
              {{-- <li>asd</li> --}}
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
  @if (sizeOf($alumnosExcel) > 0)
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body table-responsive">
          <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
            <thead>
            <tr>
              <th>STATUS</th>
              <th>RUN</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>CORREO</th>
              <th>TELEFONO</th>
              <th>JORNADA</th>
              <th>SEDE</th>
              <th>CARRERA</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($alumnosExcel as $run => $alumno)
              <tr>
                <td>
                  @if ($alumno['status']['new'])
                  <span class="badge badge-pill badge-success">Agregado</span>
                  @else
                  <span class="badge badge-pill badge-warning">Ya existe</span>
                  @endif
                </td>
                <td>{{ $alumno['run'] }}</td>
                <td>{{ $alumno['nombre'] }}</td>
                <td>{{ $alumno['apellido'] }}</td>
                <td>{{ $alumno['correo'] }}</td>
                <td>{{ $alumno['telefono'] }}</td>
                <td>{{ $alumno['jornada'] }}</td>
                <td>{{ $alumno['id_sede'] }}</td>
                <td>{{ $alumno['id_carrera'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
</section>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });
</script>
@endpush