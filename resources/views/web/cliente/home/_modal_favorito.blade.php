<div class="modal fade" id="favoritoModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- <h4 class="text-center"><strong>Nueva Dirección</strong></h4> --}}
      <form class="form-submit" action="{{route('web.cliente.direccion.favorito',$d->id)}}" method="post" id="formAdd">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <h4 class="text-center"><strong>Añadir como favorito</strong></h4>

          {{-- <div class="form-group row">
            <label for="inputnombre" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-5">
              <input type="number" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" name="numero" id="numero" autocomplete="new-number" value="{{ old('numero') }}" placeholder="Número" required>
              {!! $errors->first('numero', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div> --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Seleccionar</button>
          <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
            <h5>SELECCIONAR</h5>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>