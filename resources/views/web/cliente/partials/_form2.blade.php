<form action="{{ route('profile.cliente') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="col-md-8">
      <label for="run">Run</label>
      <input type="text" class="form-control" id="run" placeholder="Ej: 19222888K" value="{{ $cliente->run }}" disabled>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="{{ $cliente->nombre }}" name="nombre" autocomplete="new-names">
    </div>
    <div class="col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="{{ $cliente->apellido }}" name="apellido" autocomplete="new-surnames">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="correo">Correo</label>
      <input type="mail" class="form-control" id="correo" placeholder="example@correo.cl" value="{{ $cliente->correo }}" name="correo" autocomplete="new-email">
    </div>
    <div class="col-md-6">
      <label for="telefono">Teléfono</label>
      <input type="text" class="form-control" id="telefono" placeholder="Ej: 977374733" value="{{ $cliente->telefono }}" name="telefono" autocomplete="new-telephone">
    </div>
  </div>
  <div class="form-group row" id="data_1">
    <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
    <div class="input-group date col-sm-4">
      <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
      <input type="text" class="form-control" readonly name="birthdate" required value="{{ $cliente->getFechaNacimiento()->getDate() }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="fecha" class="col-sm-4 col-form-label">Sexo</label>
    <div class="input-group date col-sm-8">
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="sexo" checked value="1">
          Hombre
        </label>
      </div>
      <div class="form-check ml-2">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="sexo" value="2">
          Mujer
        </label>
      </div>
    </div>
    {!! $errors->first('sexo','<small class="form-text text-danger text-center">:message</small>') !!}
  </div>
  {{-- <div class="form-group row">
    <label class="col-form-label" for="hf-rut">Foto <small>(Opcional)</small></label>
    <div class="input-group">
      <img src="{{ $cliente->present()->getPhoto() }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
    </div>
  </div> --}}
  {{-- <div class="form-group row">
    <div class="input-group">
      <input type="file" name="image" accept="image/*" onchange="preview(this)" />
      <br>
    </div>
  </div> --}}
  {{-- <div class="form-group row text-center">
    <div id="preview"></div>
  </div> --}}
  <div class="form-group">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>
