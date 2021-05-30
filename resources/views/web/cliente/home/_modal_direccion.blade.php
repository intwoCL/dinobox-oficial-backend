<div class="modal fade" id="addProduct">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h4 class="text-center"><strong>Nueva Dirección</strong></h4>
      <form class="form-submit" action="{{route('profile.direcciones')}}" method="post" id="formAdd">
        @csrf
        <input type="hidden" name="product_id" id="inputIdProduct">
        <div class="modal-body">

          <div class="form-group row">
            <label for="inputnombre" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-5">
              <input type="text" class="form-control {{ $errors->has('calle') ? 'is-invalid' : '' }}" name="calle" id="calle" autocomplete="new-street" value="{{ old('calle') }}" placeholder="Calle" required>
              {!! $errors->first('calle', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
            <div class="col-sm-5">
              <input type="number" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" name="numero" id="numero" autocomplete="new-number" value="{{ old('numero') }}" placeholder="Número" required>
              {!! $errors->first('numero', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div>

          <div class="form-group row">
            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Región</label>
            <div class="col-sm-10">
              <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Comuna</label>
            <div class="col-sm-10">
              <select class="custom-select {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
              </select>
            </div>
            {!! $errors->first('id_comuna', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
          </div>

          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-2">Datos adicionales</label>
            <div class="input-group col-sm-10">
              <textarea class="form-control {{ $errors->has('dato_adicional') ? 'is-invalid' : '' }}" name="dato_adicional" id="textarea-input" rows="2" placeholder="" value="{{ old('dato_adicional') }}" autocomplete="new-glosa"></textarea>
              {!! $errors->first('dato_adicional','<small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
            </div>
          </div>

          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
            <div class="input-group col-sm-10">
              <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="new-telephone" maxlength="9" placeholder="" pattern="[0-9]{9}" title="Formato de 9 digitos">
            </div>
          </div>

          <div class="form-group row">
            <label for="nameEvento" class="col-form-label col-sm-4">Favorito</label>
            {{-- <div class="input-group"> --}}
              <div class="custom-control custom-switch input-group col-sm-8">
                <input type="checkbox" class="custom-control-input" name="favorito" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1"></label>
              </div>
            {{-- </div> --}}
          </div>

          <div class="switch">
            <label>
              Off
              <input type="checkbox">
              <span class="lever"></span> On
            </label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Guardar</button>
          <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
            <h5>GUARDAR</h5>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>