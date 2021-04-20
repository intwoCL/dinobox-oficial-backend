<table class="table table-bordered table-hover table-sm text-center">
  <thead>
  <tr>
    <th>Imagen</th>
    <th>Nombre de Usuario</th>
    <th>Total de usuarios</th>
    <th>P. Evento</th>
    <th>P. Votación</th>
    <th>P. Bicicleta</th>
    <th>P. Tutorias</th>
    <th>P. Atención</th>
    <th>P. Formulario</th>
  </tr>
  </thead>
  <tbody>
  @forelse ($departamentos as $d)
    <tr>
      <td>
        <img src="{{ $d->present()->getPhoto() }}" alt="Imagenes de fondo" width="50px">
      </td>
      <td>
        {{ $d->nombre }}
        <div class="table-links">
          <div class="btn-group">
            <a href="{{ route('admin.departamento.show',$d->id) }}">
              <h6><span class="badge badge-primary">ENTRAR</span></h6>
            </a>
            <a href="{{ route('admin.departamento.edit',$d->id) }}" class="ml-2">
              <h6><span class="badge badge-success">EDITAR</span></h6>
            </a>
          </div>
        </div>
      </td>
      <td class="align-middle">
        <span class="badge badge-primary"><strong>{{ $d->getTotalUsuarios() }}</strong></span>
      </td>
      <td class="align-middle">{!! $d->present()->getEventoStatusHTML() !!}</td>
      <td class="align-middle">{!! $d->present()->getVotacionStatusHTML() !!}</td>
      <td class="align-middle">{!! $d->present()->getBicicletaStatusHTML() !!}</td>
      <td class="align-middle">{!! $d->present()->getTutoriaStatusHTML() !!}</td>
      <td class="align-middle">{!! $d->present()->getAtencionStatusHTML() !!}</td>
      <td class="align-middle">{!! $d->present()->getFormularioStatusHTML() !!}</td>
    </tr>
  @empty
    <tr>
      <td colspan="9">No hay departamentos</td>
    </tr>
  @endforelse
  </tbody>
</table>