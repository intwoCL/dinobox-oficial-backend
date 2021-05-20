<form>
  <div class="form-group row">
    <div class="col-md-8">
      <label for="run">Run</label>
      <input type="text" class="form-control form-control-border" id="run" placeholder="Ej: 19222888K">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control form-control-border" id="nombre" placeholder="Nombre">
    </div>
    <div class="col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control form-control-border" id="apellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="correo">Correo</label>
      <input type="mail" class="form-control form-control-border" id="correo" placeholder="example@correo.cl">
    </div>
    <div class="col-md-6">
      <label for="telefono">Teléfono</label>
      <input type="password" class="form-control form-control-border" id="telefono" placeholder="Ej: 977374733">
    </div>
  </div>
  <div class="form-group row">
    <label for="fecha" class="col-sm-3 col-form-label">Fecha Nacimiento</label>
    <div class="input-group date col-sm-8">
      <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
      <input type="text" class="form-control" readonly name="birthdate" required value="{{ old('birthdate') ?? date('d-m-Y') }}">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>

{{-- @section('title_card', "Mi datos") --}}