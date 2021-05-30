<div class="col-md-8">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Actualizar Usuario</h3>
    </div>
    <form class="form-horizontal form-submit" method="POST" action="{{ route('web.cliente.cliente') }}"  enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group row">
          <label for="f1" class="col-form-label col-sm-2">Run</label>
          <div class="input-group col-sm-10">
            <input type="text" class="form-control" name="run" required="" maxlength="9" min="8" autocomplete="off" disabled value="{{ $cliente->run }}">
            <small id="error" class="text-danger"></small>
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" autocomplete="new-names" value="{{ $cliente->nombre }}" placeholder="Nombre" required>
            {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}" name="apellido" id="apellido" autocomplete="new-surnames" value="{{ $cliente->apellido }}" placeholder="Apellido" required>
            {!! $errors->first('apellido', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
          <div class="col-sm-10">
            <input type="mail" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="email" value="{{ $cliente->correo }}" placeholder="example@correo.cl" required autocomplete="new-email">
            {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="nameEvento" class="col-form-label col-sm-2">Teléfono</label>
          <div class="input-group col-sm-10">
              <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="new-telephone" maxlength="9" placeholder="Ingrese su teléfono aqui..." pattern="[0-9]{9}" title="Formato de 9 digitos" value="{{ $cliente->telefono }}">
          </div>
        </div>
        <div class="form-group row" id="data_1">
          <label for="fecha" class="col-sm-4 col-form-label">Fecha Nacimiento</label>
          <div class="input-group date col-sm-8">
            <span class="input-group-addon btn btn-info btn-sm"><i class="fa fa-calendar"></i></span>
            <input type="text" class="form-control" readonly name="birthdate" required value="{{ $cliente->getFechaNacimiento()->getDate() }}">
          </div>
          <div class="col-sm-12">
            {!! $errors->first('birthdate','<small id="inputPassword" class="form-text text-danger">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="fecha" class="col-sm-4 col-form-label">Sexo<small class="text-danger">*</small></label>
          <div class="input-group date col-sm-8">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sexo" {{ $cliente->sexo==1 ? 'checked' : '' }} value="1">
                Hombre
              </label>
            </div>
            <div class="form-check ml-2">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sexo" {{ $cliente->sexo==2 ? 'checked' : '' }} value="2">
                Mujer
              </label>
            </div>
          </div>
          {!! $errors->first('sexo','<small class="form-text text-danger text-center">:message</small>') !!}
        </div>
        <div class="form-group">
          <label class="col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
          <div class="input-group">
            <img src="{{ $cliente->present()->getPhoto() }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
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