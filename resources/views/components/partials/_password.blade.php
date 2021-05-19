<div class="col-md-8">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Actualizar contraseña</h3>
    </div>
    <form class="form-horizontal form-submit" method="POST" action=""  enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña actual</label>
          <div class="col-sm-10">
            <input type="password" class="form-control {{ $errors->has('password_actual') ? 'is-invalid' : '' }}" name="password_actual" id="password_actual" autocomplete="off" placeholder="*********" required>
            {!! $errors->first('password_actual','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña nueva</label>
          <div class="col-sm-10">
            <input type="password" class="form-control {{ $errors->has('password_nueva') ? 'is-invalid' : '' }}" name="password_nueva" id="password_nueva" autocomplete="off" placeholder="*********" required>
            {!! $errors->first('password_nueva','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="inputUsername" class="col-sm-12 col-form-label">Contraseña repetir</label>
          <div class="col-sm-10">
            <input type="password" class="form-control {{ $errors->has('password_nueva_repetir') ? 'is-invalid' : '' }}" name="password_nueva_repetir" id="password_nueva_repetir" autocomplete="off" placeholder="*********" required>
            {!! $errors->first('password_nueva_repetir','<small class="form-text text-danger">:message</small>') !!}
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success float-right">Guardar</button>
      </div>
    </form>
  </div>
</div>