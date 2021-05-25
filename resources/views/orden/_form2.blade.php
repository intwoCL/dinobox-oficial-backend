<div class="col-md-6">
  <div class="card">

    <form class="form-horizontal form-submit" action="{{ route('orden.store') }}" method="POST">
      @csrf
      <input type="hidden" name="id_cliente_rawr" id="id_cliente_rawr" required>
      <input type="hidden" name="id_direccion_rawr" id="id_direccion_rawr" required>

      <div class="card-body">
        <div class="alert alert-dark" role="alert">
          <i class="fa fa-user-circle mr-2"></i>
          <strong>Datos remitente</strong>
        </div>

        {{-- <h5><strong>Datos Remitente:</strong></h5> --}}
        {{-- <strong>Datos remitente</strong> --}}

        <div class="form-group row" id="data_1">
          <label for="fecha" class="col-sm-4 col-form-label">Fecha Entrega<small class="text-danger">*</small></label>
          <div class="input-group date col-sm-8">
            <span class="input-group-addon btn btn-info"><i class="fa fa-calendar"></i></span>
            <input type="text" class="form-control" readonly name="fecha_entrega" id="fecha_entrega" required value="{{ $fecha }}">
          </div>
          <div class="col-sm-12">
            {!! $errors->first('fecha_entrega','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>

        {{-- <div class="form-group row">
          <label for="fecha" class="col-sm-3 col-form-label">Fecha Entrega<small class="text-danger">*</small></label>
          <div class="input-group date col-sm-5">
            <input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega" required value="{{ $fecha }}">
          </div>
          <div class="col-sm-12">
            {!! $errors->first('fecha_entrega','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div> --}}

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nombre(s)<small class="text-danger">*</small></label>
          <div class="input-group col-sm-10">
            <input type="text" class="form-control {{ $errors->has('remitente_nombre') ? 'is-invalid' : '' }}" name="remitente_nombre" id="remitente_nombre" autocomplete="off" value="{{ old('remitente_nombre') }}" placeholder="Nombre" required>

            <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Búsqueda avanzada">
              <button class="btn btn-primary" type="button" id="button-addon2" data-toggle="modal" data-target="#modalFind">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <span class="col-md-12">
            <small id="error" class="text-danger"></small>
            <small id="success" class="text-success"></small>
          </span>

          <div class="col-sm-12 text-center pt-2" id="text_cliente_rawr" style="display: none;">
            <h5>
              <span class="badge badge-primary">
                <i class="fa fa-user mr-2"></i>
                Se ha seleccionado al cliente #<span id="text_c_r"></span>
              </span>
            </h5>
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-md-6">
            <label class=" col-form-label">Región<small class="text-danger">*</small></label>
            <div class="input-group">
              <select class="custom-select" id="select_region" name="region" onChange="CargarComunas()">
              </select>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Comuna<small class="text-danger">*</small></label>
            <div class="input-group">
              <select class="custom-select {{ $errors->has('remitente_id_comuna') ? 'is-invalid' : '' }}" name='remitente_id_comuna' id="select_comuna">
              </select>
            </div>
            {!! $errors->first('remitente_id_comuna','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label>Dirección<small class="text-danger">*</small></label>
            <input type="text" class="form-control {{ $errors->has('remitente_direccion') ? 'is-invalid' : '' }}" name="remitente_direccion" id="remitente_direccion" autocomplete="off" value="{{ old('remitente_direccion') }}" placeholder="Dirección" required>
            {!! $errors->first('remitente_direccion','<small class="form-text text-danger text-center">:message</small>') !!}
          </div>
          <div class="col-md-6">
            <label>Número/piso</label>
            <input type="text" class="form-control {{ $errors->has('remitente_numero') ? 'is-invalid' : '' }}" name="remitente_numero" id="remitente_numero" autocomplete="off" value="{{ old('remitente_numero') }}" placeholder="1234">
            {!! $errors->first('remitente_numero','<small class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label>Correo<small class="text-danger">*</small></label>
            <input type="mail" class="form-control {{ $errors->has('remitente_correo') ? 'is-invalid' : '' }}" name="remitente_correo" id="remitente_correo" value="{{ old('remitente_correo') }}" placeholder="example@correo.cl" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
            {!! $errors->first('remitente_correo', '<small class="form-text text-danger">:message</small>') !!}
          </div>
          <div class="col-md-6">
            <label>Teléfono<small class="text-danger">*</small></label>
            <input type="tel" class="form-control" name="remitente_telefono" id="remitente_telefono" autocomplete="off" pattern="[0-9]{9}" maxlength="9" placeholder="Ingrese teléfono aqui..." value="{{ old('remitente_telefono') }}" required>
            {!! $errors->first('remitente_telefono','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>

        <div class="alert alert-info" role="alert">
          <i class="fa fa-user-circle mr-2"></i>
          <strong>Datos destinatario</strong>
        </div>


        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nombre(s)<small class="text-danger">*</small></label>
          <div class="input-group col-sm-10">
            <input type="text" class="form-control {{ $errors->has('destinatario_nombre') ? 'is-invalid' : '' }}" name="destinatario_nombre" id="destinatario_nombre" autocomplete="off" value="{{ old('destinatario_nombre') }}" placeholder="Nombre" required>
          </div>
          <div class="col-sm-12">
            {!! $errors->first('destinatario_nombre','<small class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-md-6">
            <label class=" col-form-label">Región<small class="text-danger">*</small></label>
            <div class="input-group">
              <select class="custom-select" id="select_region2" name="region" onChange="CargarComunas2()">
              </select>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="" class="col-form-label">Comuna<small class="text-danger">*</small></label>
            <div class="input-group">
              <select class="custom-select {{ $errors->has('destinatario_id_comuna') ? 'is-invalid' : '' }}" name='destinatario_id_comuna' id="select_comuna2">
              </select>
            </div>
            {!! $errors->first('destinatario_id_comuna','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label>Dirección<small class="text-danger">*</small></label>
            <input type="text" class="form-control {{ $errors->has('destinatario_direccion') ? 'is-invalid' : '' }}" name="destinatario_direccion" id="destinatario_direccion" autocomplete="off" value="{{ old('destinatario_direccion') }}" placeholder="Dirección" required>
            {!! $errors->first('destinatario_direccion','<small class="form-text text-danger text-center">:message</small>') !!}
          </div>
          <div class="col-md-6">
            <label>Número/piso</label>
            <input type="text" class="form-control {{ $errors->has('destinatario_numero') ? 'is-invalid' : '' }}" name="destinatario_numero" id="destinatario_numero" autocomplete="off" value="{{ old('destinatario_numero') }}" placeholder="1234">
            {!! $errors->first('destinatario_numero','<small class="form-text text-danger text-center">:message</small>') !!}
          </div>
        </div>

        <div class="form-group row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Correo<small class="text-danger">*</small></label>
            <input type="mail" class="form-control {{ $errors->has('destinatario_correo') ? 'is-invalid' : '' }}" name="destinatario_correo" id="destinatario_correo" value="{{ old('destinatario_correo') }}" placeholder="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Teléfono<small class="text-danger">*</small></label>
            <input type="tel" class="form-control" name="destinatario_telefono" id="destinatario_telefono" autocomplete="off" maxlength="9" pattern="[0-9]{9}" placeholder="Ingrese teléfono aqui..." value="{{ old('destinatario_telefono') }}" required>
          </div>
        </div>

        <div class="alert alert-success" role="alert">
          <i class="fa fa-box-open mr-2"></i>
          <strong>Datos orden</strong>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Categoría</label>
          <div class="input-group col-sm-10">
            <select class="custom-select" id="categoria" name="categoria">
              @foreach ($categorias as $key => $value)
              @continue(!$value[1])
              <option value="{{ $key }}">{{ $value[0] }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Servicios</label>
          <div class="input-group col-sm-10">
            <select class="custom-select" id="servicio" name="servicio">
              @foreach ($servicios as $key2 => $value2)
              @continue(!$value2[2])
              <option value="{{ $key2 }}">{{ $value2[0] }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Precio<small class="text-danger">*</small></label>
          <div class="input-group col-sm-10">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-dollar-sign"></i>
              </span>
            </div>
            <input type="numeric" class="form-control" name="precio" id="precio" autocomplete="off" maxlength="9" placeholder="0" value="{{ old('precio') }}" required>
          </div>
          {!! $errors->first('precio', '<small class="form-text text-danger">:message</small>') !!}
        </div>

        <div class="form-group">
          <label for="comentario" class="col-form-label">Mensaje</label>
          <textarea class="form-control  {{ $errors->has('mensaje') ? 'is-invalid' : '' }}" rows="3" name="mensaje" id="mensaje" placeholder="..." maxlength="255" onkeyup="countChars(this,255);">{{ old('mensaje') }}</textarea>
          {!! $errors->first('mensaje', '<small class="form-text text-danger">:message</small>') !!}
          <p id="limitC"></p>
        </div>

      </div>
      <div class="card-footer">
        <button type="submit" id="btnAgregar" class="btn btn-success float-right">Agregar</button>
      </div>
    </form>
  </div>
</div>