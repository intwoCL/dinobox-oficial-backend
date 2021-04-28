@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Usuarios</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Lista de Usuarios</h3> --}}
          <a href="{{ route('admin.usuario.indexDelete') }}" class="btn btn-dark float-left btn-sm">
            Usuarios eliminados
          </a>
          <a href="{{ route('usuario.create') }}" class="btn btn-success float-right btn-sm">
            Nuevo
          </a>
        </div>
        <div class="card-body table-responsive">
          <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
            <thead>
            <tr>
              <th>Perfil</th>
              <th>Imagen</th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Correo</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $u)
              <tr>
                <td>{!! $u->present()->getPerfil() !!}</td>
                <td class="align-middle">
                  <img src="{{ $u->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
                </td>
                <td class="align-middle">
                  <strong>{{$u->username}}</strong>
                  <div class="table-links">
                    <div class="btn-group">
                      <a href="{{ route('usuario.edit',$u->id) }}" class="ml-2">
                        <h6>
                          <span class="badge badge-success">EDITAR</span>
                        </h6>
                      </a>
                    </div>
                  </div>
                </td>
                <td class="align-middle">{{$u->present()->nombre_completo()}}</td>
                <td class="align-middle">{{$u->correo}}</td>
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