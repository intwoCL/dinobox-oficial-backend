@php
    $now = new \DateTime();
    $fecha = $now->format('d-m-Y');

@endphp
@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>
          <a href="{{ route('sala.index') }}" class="text-dark"><i class="fas fa-chevron-circle-left"></i></a>
          Editar sala</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-info">
          <div class="card-header">
              <h3 class="card-title">Formulario de Solicitud</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal form-submit" action="{{ route('sala.update',$s->codigo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nameEvento" class="col-form-label">Nombre Sala</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nombre_sala" autofocus autocomplete="off" name="nombre_sala" value="{{ $s->nombre_sala }}" placeholder="Nombre Sala" required>
                  </div>
              </div>
              <div class="form-group">
                <label for="nameEvento" class="col-form-label">Comentario <small>(opcional)</small> </label>
                <div class="input-group">
                  <textarea type="text" class="form-control" id="comentario" name="comentario" placeholder="Ingrese su comentario aqui.." maxlength="100" min="2">{{ $s->descripcion ?? '' }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label>Publico</label>
                <select class="form-control" id="publico" name="publico" required>
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('javascript')

@endpush
