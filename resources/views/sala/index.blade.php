@extends('layouts.app')
@push('stylesheet')
  <!-- DataTables -->
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
  <style>

      .user-panel2 img {
        height: 2.1rem;
        width: 2.1rem;
      }
  </style>
@endpush
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Salas de Videollamadas</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Mis Salas</h3>
            {{-- <a href="{{ route('formulario.create') }}" class="btn btn-success float-right btn-sm"> Nueva Sala</a> --}}
            <button type="button" class="btn btn-success mr-2 float-right btn-sm" data-toggle="modal" data-target="#ModalCreate">
              Agregar Sala
            </button>
            <button type="button" class="btn btn-danger mr-2 float-right btn-sm" data-toggle="modal" data-target="#ModalCode">
              Código
          </button>
          {{-- Formulario Código --}}
          <div class="modal fade" id="ModalCode" tabindex="-1" role="dialog" aria-labelledby="ModalCode" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ingresar Código</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal form-submit" action="{{ route('sala.entrar.codigo') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nameEvento" class="col-form-label">Ingrese Código</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="codigoFormulario" name="codigo_sala" placeholder="Ejemplo: RR2AAZTU" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-success">Agregar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
            {{-- Formulario Create --}}
            <div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="ModalCreate" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Nueva Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="form-horizontal form-submit" action="{{ route('sala.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="card-body">

                        <div class="form-group">
                          <label for="nameEvento" class="col-form-label">Nombre Sala</label>
                            <div class="input-group">
                              <input type="text" class="form-control {{ $errors->has('nombre_sala') ? 'is-invalid' : '' }}" id="nombre_sala" autofocus autocomplete="off" name="nombre_sala" value="{{ old('nombre_sala') }}" placeholder="Nombre Sala" required>
                            </div>
                            <div class="col-sm-12">
                              {!! $errors->first('nombre_sala','<small class="form-text text-danger">:message</small>') !!}
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nameEvento" class="col-form-label">Comentario <small>(opcional)</small> </label>
                          <div class="input-group">
                            <textarea type="text" class="form-control {{ $errors->has('comentario') ? 'is-invalid' : '' }}" id="comentario" name="comentario" value="{{ old('comentario') }}" placeholder="Ingrese su comentario aqui.." maxlength="100" min="2"></textarea>
                          </div>
                          <div class="col-sm-12">
                            {!! $errors->first('comentario','<small class="form-text text-danger">:message</small>') !!}
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nameEvento" class="col-form-label">Contraseña <small>(opcional)</small> </label>
                            <div class="input-group">
                              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password">
                            </div>
                            <div class="col-sm-12">
                              {!! $errors->first('password','<small class="form-text text-danger">:message</small>') !!}
                            </div>
                        </div>
                          <div class="form-group">
                            <label>Publico</label>
                            <select class="form-control {{ $errors->has('publico') ? 'is-invalid' : '' }}" id="publico" name="publico" required>
                              <option value="1">Sí</option>
                              <option value="0">No</option>
                            </select>
                          </div>
                          <div class="col-sm-12">
                            {!! $errors->first('publico','<small class="form-text text-danger">:message</small>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary btn-success">Agregar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            {{-- <table id="example1" class="table table-sm table-bordered table-striped"> --}}
            <table class="table table-sm table-striped">

              <thead>
              <tr>
                <th></th>
                <th></th>
                <th>Nombre Sala</th>
                {{-- <th>Código</th> --}}
                {{-- <th>Descripción</th> --}}
                {{-- <th></th> --}}
                <th></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach ($salas as $s)

                <tr>
                  <td class="text-center align-middle">
                    @if ($s->publico=='0')
                    <i class="fas fa-globe" title="Sala oculta"></i>
                    @else
                    <i class="fas fa-globe text-primary" title="Sala Pública"></i>
                    @endif
                    @if ($s->require_password=='1')
                    <i class="fa fa-lock" title="Con Contraseña"></i>
                    @else
                    <i class="fa fa-unlock-alt" title="Sin Contraseña"></i>
                    @endif
                  </td>
                  <td class="text-center">
                    <div class="user-panel">
                      <img src="{{ $s->usuario->present()->getPhoto() }}" class="img-responsive img-circle2" alt="" title="{{$s->usuario->present()->nombre_completo()}}">
                    </div>
                  </td>
                  {{-- <td class="text-center"><small class="text-success" title="Usuario Creador"><i class="fas fa-square"></i></small></td> --}}
                  <td>{{$s->nombre_sala}}</td>
                  <td>
                    <form action="{{ route('sala.entrar.codigo') }}" method="post">
                      @csrf
                      <button type="submit" name="codigo_sala" value="{{$s->codigo}}" class="btn btn-success btn-sm btn-block">Entrar</button>
                    </form>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal{{ $s->codigo }}">
                      <i class="fas fa-bullhorn"></i>
                    </button>
                    {{-- Modal --}}
                    <div class="modal fade" id="Modal{{ $s->codigo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Su código es</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                              <p>Comparte este código con otros usuarios.</p>
                              <div class="input-group mb-3">
                                <input type="text" id="clip{{ $s->codigo }}" readonly value="{{ $s->codigo }}" class="form-control">
                                <div class="input-group-append">
                                  <button class="input-group-text btn-copia" data-clipboard-action="copy" data-clipboard-target="#clip{{ $s->codigo  }}"><i class="fas fa-clipboard"></i></button>
                                </div>
                              </div>
                              <small>(los usuarios nuevos son visita, puedes cambia el rol si lo deseas)</small>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="{{ route('sala.edit',$s->codigo) }}" class="btn btn-primary btn-sm">Editar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Lista de Salas Públicas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example1" class="table table-sm table-bordered table-striped">
            {{-- <table class="table table-sm table-striped"> --}}
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre Sala</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($salas_extras as $s)
                <tr>
                  <td class="text-center">
                    <div class="user-panel">
                      <img src="{{ $s->usuario->getPhoto() }}" class="img-responsive img-circle2" alt="" title="{{$s->usuario->nombre_completo()}}">
                    </div>
                  </td>
                  {{-- <td class="text-center"><small class="text-success" title="Usuario Creador"><i class="fas fa-square"></i></small></td> --}}
                  <td>{{$s->nombre_sala}}</td>
                  <td>
                    @if ($s->require_password=='1')
                    <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#ModalPass{{ $s->id_sala }}">
                      <i class="fa fa-lock"></i>
                    </button>
                    {{-- Modal --}}
                    <div class="modal fade" id="ModalPass{{ $s->id_sala }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Su contraseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="form-horizontal form-submit" action="{{ route('sala.entrar.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_sala" value="{{ $s->id_sala }}">
                            <div class="modal-body">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="nameEvento" class="col-form-label">Ingrese contraseña</label>
                                  <div class="input-group">
                                    <input type="password" class="form-control" id="sala_password" name="sala_password" placeholder="************" required>
                                  </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary btn-success">Agregar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @else
                    <form action="{{ route('sala.entrar.codigo') }}" method="post">
                      @csrf
                      <button type="submit" name="codigo_sala" value="{{$s->codigo}}" class="btn btn-success btn-sm btn-block">Entrar</button>
                    </form>
                      {{-- <a href="{{ route('sala.show',$s->codigo) }}" class="btn btn-success btn-sm btn-block">Entrar</a> --}}
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
</div>

@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
<script src="/vendor/clipboard/js/clipboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  var clipboard = new ClipboardJS('.btn-copia');
</script>

<script>
  $('#modalEditar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id_dir = button.data('iddir');
    var dir_name = button.data('namedir');
    var modal = $(this);
    modal.find('#modale_id_motivo').val(id_dir);
    modal.find('#modale_name_motivo').val(dir_name);
    modal.find('#modale_name_motivo').text(dir_name);
  })
</script>

@if ($errors->has('nombre_sala') || $errors->has('comentario') || $errors->has('password') || $errors->has('publico'))
    <script>
      // TODO: Activa modal en caso de error
       $('#exampleModal').modal('show');
    </script>
@endif
@endpush

