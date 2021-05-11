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
      @foreach ($ordenes as $o)
      <tr>
        <td>{{ $o->getFecha()->getDate() }}</td>
        <td class="align-middle">
          {{-- <img src="{{ $u->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset=""> --}}
        </td>
        <td class="align-middle">
          {{-- <strong>{{$u->username}}</strong> --}}
        </td>
        {{-- <td class="align-middle">{{$u->present()->nombre_completo()}}</td> --}}
        {{-- <td class="align-middle">{{$u->correo}}</td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</div>