@extends('web.cliente.app')
@push('stylesheet')

@endpush

@section('content')
@include('layouts._nav2')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Listado de Usuarios</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('user.create') }}" class="btn btn-success float-right btn-sm">
            Nuevo
          </a>
        </div>
        <div class="card-body-table-responsive">
          <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nombre completo</th>
                <th>Correo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $u)
              <tr>
                <td class="align-middle">
                  <strong>{{$u->username}}</strong>
                  <div class="table-links">
                    <div class="btn-group">
                      <a href="{{ route('user.edit', $u->id) }}" class="ml-2">
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

@endpush