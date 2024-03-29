@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @if ($u->repartidor())
    @slot('route', route('admin.repartidor.index'))
  @else
    @slot('route', route('admin.usuario.index'))
  @endif
  @slot('body', "Editar Usuario <strong>".$u->present()->nombre_completo()."</strong>")
@endcomponent

<section class="content">
  <div class="container-fluid">
    <div class="row">
      @include('admin.usuario._tabs_usuario')
      <div class="col-md-3">
        <div class="card">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ $u->present()->getPhoto() }}" alt="{{ $u->present()->nombre_completo() }}">
            </div>

            <h3 class="profile-username text-center">{{ $u->present()->nombre_completo() }}</h3>

            {{-- <p class="text-muted text-center">{{ $u-> }}</p> --}}

            {{-- <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul> --}}

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
          </div>
        </div>

        {{-- <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush