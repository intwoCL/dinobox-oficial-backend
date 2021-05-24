<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-car"></i> Asignar repartidor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body table-responsive">
          <table id="tableUsuario" class="table table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($repartidores as $r)
              <tr>
                <td>
                  <p>{{ $r->run }}</p>
                </td>
                <td>
                  <p>{{ $r->present()->nombre_completo() }}</p>
                </td>
                <td>
                  <p>{{ $r->correo }}</p>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-xs btn-block"
                    data-toggle="modal"
                    data-target="#assignModalConfirmacion"
                    data-nombre="{{ $r->present()->nombre_completo() }}"
                    data-repartidor="{{ $r->id }}">
                    Seleccionar
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="assignModalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title"><i class="fa fa-car"></i> Asignar repartidor</h5> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('orden.repartidor.store') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="codigo_modal" name="codigo_modal">
        <input type="hidden" class="form-control" id="repartidor_modal" name="repartidor_modal">
        @csrf
        <div class="modal-body table-responsive">
          <div id="modal_text_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success btn-sm">Asignar</button>
        </div>
      </form>
    </div>
  </div>
</div>
