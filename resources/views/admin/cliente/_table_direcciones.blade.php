<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Dirreciones</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($c->direcciones as $d)
      <tr>
        <td>{{ $d->getDireccion() }}</td>
        {{-- <td class="align-middle">{{ $d->calle }}</td>
        <td class="align-middle">{{ $d->numero }}</td>
        <td class="align-middle">{{ $d->comuna->nombre }}</td>
        <td class="align-middle">{{ $d->comuna->region->nombre }}</td>
        <td class="align-middle">{{ $d->telefono }}</td>
        <td class="align-middle">{{ $d->dato_adicional }}</td> --}}
        <td class="align-middle">
          <a href="{{ $d->googleMap() }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success"><i class="fa fa-map-marker-alt"></i></a>
        </td>
        {{-- <td class="align-middle"><strong>{{ $v->patente }}</strong></td> --}}
        {{-- <td class="align-middle"><strong>{{ $v->patente }}</strong></td> --}}
        {{-- <td class="align-middle"><strong>{{ $v->modelo }}</strong></td> --}}
        {{-- <td class="align-middle">{{$u->correo}}</td> --}}
        {{-- <td>
          <button class="btn btn-sm btn-primary">Editar</button>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</div>