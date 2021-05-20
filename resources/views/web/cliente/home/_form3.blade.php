<form action="{{ route('profile.password') }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group row">
    <div class="col-md-8">
      <label for="run">Contraseña actual</label>
      <input type="password" class="form-control form-control-border" id="run" placeholder="*********" name="password_actual" id="password_actual" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="nombre">Contraseña nueva</label>
      <input type="password" class="form-control form-control-border" id="nombre" placeholder="*********" ame="password_nueva" id="password_nueva" required>
    </div>
    <div class="col-md-6">
      <label for="apellido">Repetir contraseña</label>
      <input type="password" class="form-control form-control-border" id="apellido" placeholder="*********" name="password_nueva_repetir" id="password_nueva_repetir" required>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>

@section('title_card', "Mi datos")