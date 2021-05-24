<form action="{{ route('profile.direcciones.update', $d->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <label for="inputnombre" class="col-sm-2 col-form-label">Calle</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="calle" id="calle" autocomplete="new-street" value="{{ $d->calle }}" placeholder="Calle" required>
    </div>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="numero" id="numero" autocomplete="new-number" value="{{ $d->numero }}" placeholder="Número">
    </div>
  </div>

  <div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Región</label>
    <div class="col-sm-8">
      <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Comuna</label>
    <div class="col-sm-8">
      <select class="custom-select {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="nameEvento" class="col-form-label col-sm-2">Datos adicionales</label>
    <div class="input-group col-sm-8">
      <textarea class="form-control" name="dato_adicional" id="textarea-input" rows="4" placeholder="" autocomplete="new-glosa">
        {{ $d->dato_adicional }}
      </textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
    <div class="input-group col-sm-8">
      <input type="number" class="form-control" name="telefono" id="telefono" autocomplete="new-telephone" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos" value="{{ $d->telefono }}">
    </div>
  </div>

  <div class="form-group row">
    <label for="nameEvento" class="col-form-label col-sm-2">Favorito</label>
    <div class="input-group col-sm-10">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" name="favorito" id="customSwitch1" {{ $d->favorito ? 'checked' : '' }}>
        <label class="custom-control-label" for="customSwitch1"></label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>
