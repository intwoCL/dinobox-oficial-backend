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
        <div class="card-header bg-info">
          <h3 class="card-title">Inscripción de Visitas</h3>
        </div>
        <div class="card-body table-responsive">
          <table id="regitrovisitas" class="table table-hover">
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
              <th></th>
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
                <th>
                  @if ($v->contador < $cantidad )
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit-{{ $v->id }}">
                    {{-- <i class="fa fa-edit"></i> --}}
                    REGISTRAR
                  </button>
                  <div class="modal fade" id="modalEdit-{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form class="form-horizontal form-submit" action="{{ route('web.evento.visitas') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $v->id }}">
                          <input type="hidden" name="view" value="visitas">
                          <div class="modal-body">
                            <div class="card-body">
                              <h3>Seleccionar usuario</h3>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary btn-primary">Registar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  @endif
                </th>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#regitrovisitas").DataTable();
  });
</script>
@endpush