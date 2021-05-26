
{{-- Modal MAIN --}}
<div class="modal fade" id="modalMain" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
  <form action="{{ route('auth.modeMain.admin') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $c->id }}">
    <input type="hidden" name="type" value="client">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAccionLabel">ENTRAR CON MODO SUPREMO DINO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            MODO SUPREMO DINO
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">ENTRAR</button>
        </div>
      </div>
    </div>
  </form>
</div>