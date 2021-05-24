<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Perfil</th>
      <th>Imagen</th>
      {{-- <th>Usuario</th> --}}
      <th>Nombre</th>
      <th>Correo</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($usuarios as $u)
      <tr>
        <td class="align-middle">{!! $u->present()->getPerfil() !!}</td>
        <td class="align-middle">
          <img src="{{ $u->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
        </td>
        <td class="align-middle">
          <strong>{{$u->present()->nombre_completo() }}</strong>
          <div class="table-links">
            <div class="btn-group">
              <a href="{{ route('admin.usuario.show',$u->id) }}" class="ml-2">
                <h6>
                  <span class="badge badge-success">INGRESAR</span>
                </h6>
              </a>
            </div>
          </div>
        </td>
        {{-- <td class="align-middle">{{$u->present()->nombre_completo()}}</td> --}}
        <td class="align-middle">{{$u->correo}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>