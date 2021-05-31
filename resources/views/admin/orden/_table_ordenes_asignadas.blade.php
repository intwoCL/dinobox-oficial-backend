<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm">
    <thead>
    <tr>
      <th>Estado</th>
      <th>Código</th>
      <th>Fecha Entrega</th>
      <th>Dirección Origen</th>
      <th>Dirección Destino</th>
      <th>Comuna Origen</th>
      <th>Comuna Destino</th>
      <th>Precio</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($ordenes as $o)
      <tr>
        <td>{{ $o->getEstado() }}</td>
        <td><a href="{{ route('orden.show',$o->codigo) }}">{{ $o->codigo }}</a></td>
        <td>{{ $o->getFecha()->getDate() }}</td>
        <td>{{ $o->remitente_direccion }}</td>
        <td>{{ $o->destinatario_direccion }}</td>
        <td>{{ $o->remitenteComuna->nombre }}</td>
        <td>{{ $o->destinatarioComuna->nombre }}</td>
        <td>$ {{ $o->getPrecio() }}</td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>