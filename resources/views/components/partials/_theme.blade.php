<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title">Cambiar Tema</h3>
  </div>
  <form class="form-horizontal form-submit" method="POST" action=""  enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="selector form-group" hidden id='theme-system-selector'>
        <label>Select</label>
        <select class="form-control">
          <option value='bootstrap' selected>Bootstrap 4</option>
          <option value='standard'>unthemed</option>
        </select>
      </div>

      <div class="selector form-group" data-theme-system="bootstrap">
        <label>Seleccionar tema</label>
        <select class="form-control" name="theme">
          <option value='default' selected>Sistema Edugestión</option>
          <option value='me-dark'>new Dark</option>
          <option value='cerulean'>Cerulean</option>
          <option value='cosmo'>Cosmo</option>
          <option value='cyborg'>Cyborg</option>
          <option value='darkly'>Darkly</option>
          <option value='flatly'>Flatly</option>
          <option value='journal'>Journal</option>
          <option value='litera'>Litera</option>
          <option value='lumen'>Lumen</option>
          <option value='lux'>Lux</option>
          <option value='materia'>Materia</option>
          <option value='minty'>Minty</option>
          <option value='pulse'>Pulse</option>
          <option value='sandstone'>Sandstone</option>
          <option value='simplex'>Simplex</option>
          <option value='sketchy'>Sketchy</option>
          <option value='slate'>Slate</option>
          <option value='solar'>Solar</option>
          <option value='spacelab'>Spacelab</option>
          <option value='superhero'>Superhero</option>
          <option value='united'>United</option>
          <option value='yeti'>Yeti</option>
        </select>
      </div>
    </div>
    <span id='loading' style='display:none'>Cargando tema...</span>
    <div class="card-footer">
      <button type="submit" class="btn btn-success float-right">Guardar</button>
    </div>
  </form>
</div>