<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="formAssign">
        @csrf
        <div class="modal-body">
          <input type="hidden" class="form-control" id="id_modal" name="id">

          @foreach ($repartidores as $r)
          <p>{{ $r->present()->nombre_completo() }}</p>
          <button type="submit" class="btn btn-success btn-sm">Asignar</button>

          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
          {{-- <button type="submit" class="btn btn-success btn-sm">Asignar</button> --}}
        </div>
      </form>
    </div>
  </div>
</div>
