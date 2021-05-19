@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
@component('components.button._back')
  @slot('body', "Configuracion del sistema")
@endcomponent
<section class="content py-2">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Configuración</h5>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="{{ route('admin.sistema.show') }}" class="nav-link">
                <i class="fas fa-cog text-primary mr-2"></i>
                Ajuste del sistema
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-graduate text-primary mr-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-graduate text-primary mr-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-graduate text-primary mr-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-user-graduate text-primary mr-2"></i>
              </a>
            </li> --}}
          </ul>
        </div>
      </div>

    </div>
    {{-- <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Reportes</h5>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-server nav-icon mrw"></i> Consultas BD
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-server nav-icon mrw"></i> Consultas BD
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-server nav-icon mrw"></i> Consultas BD
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-server nav-icon mrw"></i> Consultas BD
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
  </div>
</section>

@endsection