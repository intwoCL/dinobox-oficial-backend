<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm">
    <thead>
    <tr>
      <th>COD</th>
      <th>Fecha</th>
      <th>Tipo</th>
      <th>Valor</th>
      <th>Comuna emitente</th>
      <th>Comuna destino</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($ordenes as $o)
      <tr>
        <td><a href="">{{ $o->codigo }}</a></td>
        <td>{{ $o->getFecha()->getDate() }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <button type="button" class="btn btn-outline-success btn-sm"
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