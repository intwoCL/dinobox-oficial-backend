@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@if ($d->activo)
  @slot('route', route('admin.departamento.index'))
@else
  @slot('route', route('admin.departamento.indexDelete'))
@endif
@slot('body', "Departamento <strong>$d->nombre</strong - Usuarios")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Lista de usuarios en el departamento</h3> --}}
          <a href="{{ route('admin.departamentousuario.usersDelete',$d->id) }}" class="btn btn-dark btn-sm float-left mr-2"> Usuarios eliminados</a>
          <a href="{{ route('admin.departamentousuario.create',$d->id) }}" class="btn btn-success float-right btn-sm"> Asignar usuario</a>
        </div>
        <!-- /.card-header -->
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
                      <a href="{{ route('admin.departamentousuario.edit',$du->id) }}">
                        <h6>
                          <span class="badge badge-success">EDITAR</span>
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
{{-- Modal --}}
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('bicicleta.tipousuario') }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_motivo" id="modalb_id_motivo">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">Borrar Motivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            ¿Seguro que desea borrar?
            No se volvere a mostrar este item
            <strong><span id="modalb_name_motivo"></span></strong>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger">Borrar</button>
        </div>
      </div>
    </div>
  </form>
</div>


@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script>
  $(function () {
    $("#tableSelect").DataTable();
  });

  $('#modalDelete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_dir = button.data('iddir');
    var dir_name = button.data('namedir');
    var modal = $(this);
    modal.find('#modalb_id_motivo').val(id_dir);
    modal.find('#modalb_name_motivo').text(dir_name);
  })
</script>
@endpush