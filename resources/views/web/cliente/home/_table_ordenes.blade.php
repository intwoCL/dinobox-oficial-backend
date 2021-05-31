<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body table-responsive">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr class="text-center">
              <th>Código</th>
              <th>Fecha</th>
              <th>Origen</th>
              <th>Destino</th>
              <th>Estado</th>
              <th>Valor</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($ordenes as $o)
            <tr data-widget="expandable-table" aria-expanded="true">
              <td><a href="{{ route('web.cliente.seguimiento', $o->codigo) }}">{{ $o->codigo }}</a></td>
              <td>{{ $o->getFecha()->getDate() }}</td>
              <td>{{ $o->remitente_direccion }}</td>
              <td>{{ $o->destinatario_direccion }}</td>
              <td>{{ $o->getEstado() }}</td>
              <td>$ {{ $o->getPrecio() }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        {{ $ordenes->links('components.paginator._bootstrap4') }}
      </div>
    </div>
  </div>
</div>