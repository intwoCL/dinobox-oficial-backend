@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('admin.departamento.show',$d->id))
  @slot('color', 'secondary')
  @slot('body', "Departamento <strong>$d->nombre</strong> - USUARIOS ELIMINADOS")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body table-responsive">
          <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>P. Evento</th>
              <th>P. Votación</th>
              <th>P. Bicicleta</th>
              <th>P. Tutoria</th>
              <th>M. Atención</th>
              <th>M. Formulario</th>
              {{-- <th>M. Servicio</th> --}}
              {{-- <th>M. Chat</th> --}}
            </tr>
            </thead>
            <tbody>
              @foreach ($dusuarios as $du)
              <tr>
                <td>
                  {{ $du->usuario->present()->nombre_completo() }}
                  <div class="table-links">
                    <div class="btn-group">
                      <a href="{{ route('admin.departamentousuario.edit',$du->id) }}" class="ml-2">
                        <h6>
                          <span class="badge badge-primary">ACTIVAR</span>
                        </h6>
                      </a>
                    </div>
                  </div>
                </td>
                <td>{{ $du->usuario->correo }}</td>
                <td class="align-middle">
                  @if ($d->plataforma_evento==1)
                  {!! $du->present()->getEventoStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
                </td>
                <td class="align-middle">
                  @if ($d->plataforma_votacion==1)
                  {!! $du->present()->getVotacionStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
                </td>
                <td class="align-middle">
                  @if ($d->plataforma_bicicleta==1)
                    {!! $du->present()->getBicicletaStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
                </td>
                <td class="align-middle">
                  @if ($d->plataforma_tutoria==1)
                    {!! $du->present()->getTutoriaStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
                </td>
                <td class="align-middle">
                  @if ($d->plataforma_atencion==1)
                    {!! $du->present()->getTomaHoraStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
                </td>
                <td class="align-middle">
                  @if ($d->plataforma_formulario==1)
                    {!! $du->present()->getFormularioStatusHTML() !!}
                  @else
                  <i class="fas fa-times-circle text-danger" title="No Disponible por departamento"></i>
                  @endif
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