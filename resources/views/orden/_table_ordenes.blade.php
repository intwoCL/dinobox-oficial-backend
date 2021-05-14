<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm">
    <thead>
    <tr>
      <th>Código</th>
      <th>Fecha Entrega</th>
      <th>Dirección Origen</th>
      <th>Dirección Destino</th>
      <th>Comuna Origen</th>
      <th>Comuna Destino</th>
      <th>Precio</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($ordenes as $o)
      <tr>
        <td><a href="">{{ $o->codigo }}</a></td>
        <td>{{ $o->getFecha()->getDate() }}</td>
        <td>{{ $o->remitente_direccion }}</td>
        <td>{{ $o->destinatario_direccion }}</td>
        <td>{{ $o->remitenteComuna->nombre }}</td>
        <td>{{ $o->destinatarioComuna->nombre }}</td>
        <td>$ {{ $o->getPrecio() }}</td>
        <td>
          <button type="button" class="btn btn-outline-success btn-xs"
          data-toggle="modal"
          data-target="#assignModal"
          data-alumno="123">
          Asignar
        </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>