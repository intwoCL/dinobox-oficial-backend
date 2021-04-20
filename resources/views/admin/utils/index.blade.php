@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1><i class="fas fa-th-large nav-icon ml-2"></i> Utils</h1>
      </div>
    </div>
  </div>
</section>
<section class="content py-2">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Usuarios</h5>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="{{ route('admin.utils.import.alumnos') }}" class="nav-link">
                <i class="fas fa-user-graduate text-primary mr-2"></i> Subir alumnos
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Reportes</h5>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="{{route('admin.reportes.consulta.index')}}" class="nav-link">
                <i class="fas fa-server nav-icon mrw"></i> Consultas BD
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection