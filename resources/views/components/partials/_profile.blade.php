<div class="col-md-8">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Actualizar Usuario</h3>
    </div>
    <form class="form-horizontal form-submit" method="POST" action=""  enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="f1" class="col-form-label col-sm-2">Run <small class="text-danger">*</small></label>
          <div class="input-group col-sm-10">
            <input type="text" class="form-control" name="run" placeholder="Ej: 19222888K"
              required="" maxlength="9" min="8" autocomplete="off" autofocus onkeyup="this.value = validarRut(this.value)" disabled>
            <small id="error" class="text-danger"></small>
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="off" value="" placeholder="Nombre" required>
            {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="off" value="" placeholder="Apellido" required>
            {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
          <div class="col-sm-10">
            <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="" placeholder="Correo" required>
            {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
          <div class="input-group">
            <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input type="file" name="image" accept="image/*" onchange="preview(this)" />
            <br>
          </div>
        </div>
        <div class="form-group row center-text">
          <div id="preview"></div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success float-right">Guardar</button>
      </div>
    </form>
  </div>
</div>