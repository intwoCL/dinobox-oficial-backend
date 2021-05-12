<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Fecha Emisión</th>
      <th>Rut Remiente</th>
      <th>Nombre Remitente</th>
      <th>Dirección Remitente</th>
      <th>Nombre Destinatario</th>
      <th>Dirección Destinatario</th>
      <th>Fecha Entrega</th>
      <th>Precio Envió</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($ordenes as $o)
      <tr>
        <td>{{ $o->getFechaEmision()->getDate() }}</td>
        <td class="align-middle">
          {{ $o->rut_remitente }}
        </td>
        <td class="align-middle">
          {{ $o->nombre_remitente }}
        </td>
        <td class="align-middle">
          {{ $o->direccion_remitente }}
        </td>
        <td class="align-middle">
          {{ $o->nombre_destinatario }}
        </td>
        <td class="align-middle">
          {{ $o->direccion_remitente }}
        </td>
        <td>{{ $o->getFecha()->getDate() }}</td>
        <td>${{ $o->getPrecioEnvio() }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>