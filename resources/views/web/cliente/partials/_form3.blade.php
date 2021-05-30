<form class="form-horizontal form-submit" method="POST" action="{{ route('profile.password.update') }}">
  @csrf
  <div class="card-body">
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Contraseña actual</label>
        <input type="password" class="form-control {{ $errors->has('password_actual') ? 'is-invalid' : '' }}" name="password_actual" id="password_actual" autocomplete="off" placeholder="*********" required>
        {!! $errors->first('password_actual','<small class="form-text text-danger">:message</small>') !!}
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Contraseña nueva</label>
        <input type="password" class="form-control {{ $errors->has('password_nueva') ? 'is-invalid' : '' }}" name="password_nueva" id="password_nueva" autocomplete="off" placeholder="*********" required>
        {!! $errors->first('password_nueva','<small class="form-text text-danger">:message</small>') !!}
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6">
        <label class="col-form-label">Contraseña repetir</label>
        <input type="password" class="form-control {{ $errors->has('password_nueva_repetir') ? 'is-invalid' : '' }}" name="password_nueva_repetir" id="password_nueva_repetir" autocomplete="off" placeholder="*********" required>
        {!! $errors->first('password_nueva_repetir','<small class="form-text text-danger">:message</small>') !!}
      </div>
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success float-right">Guardar</button>
  </div>
</form>