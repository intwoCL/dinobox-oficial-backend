@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
@slot('route', route('admin.cliente.index'))
@slot('color', 'secondary')
@slot('body', "Clientes eliminados")
@endcomponent
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body table-responsive">
          <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
            <thead>
            <tr>
              <th></th>
              <th>Rut</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($clientes as $c)
              <tr>
                <td class="align-middle">
                  <img src="{{ $c->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
                </td>
                <td class="align-middle">
                  {{ $c->run }}
                </td>
                <td class="align-middle">
                  <strong>{{ $c->present()->nombre_completo() }}</strong>
                  {{-- @if ($permiso_editar) --}}
                  <div class="table-links">
                    <div class="btn-group">
                      <a href="{{ route('admin.cliente.edit',$c->id) }}" class="ml-2">
                        <h6>
                          <span class="badge badge-success">EDITAR</span>
                        </h6>
                      </a>
                    </div>
                  </div>
                  {{-- @endif --}}
                </td>
                <td class="align-middle">{{ $c->correo }}</td>
                <td class="align-middle">{{ $c->telefono }}</td>
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