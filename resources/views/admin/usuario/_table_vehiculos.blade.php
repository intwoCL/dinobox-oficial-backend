<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Tipo</th>
      {{-- <th>Imagen</th> --}}
      <th>Patente</th>
      <th>Modelo</th>
      <th>Marca</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($u->vehiculos as $v)
      <tr>
        {{-- <td class="align-middle">
          <img src="{{ $v->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
        </td> --}}
        <td class="align-middle">{!! $v->present()->getIcon() !!}</td>
        <td class="align-middle"><strong>{{ $v->patente }}</strong></td>
        <td class="align-middle"><strong>{{ $v->modelo }}</strong></td>
        {{-- <td class="align-middle">{{$u->correo}}</td> --}}
        <td>
          <button class="btn btn-sm btn-primary">Editar</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>