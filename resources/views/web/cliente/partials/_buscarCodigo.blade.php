<div class="position-relative overflow-hidden p-3 text-center intro-section">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Busca tu orden</h1>

    <form class="my-2" action="{{ route('dashboard.orden.buscarCodigo') }}" method="POST">
      @csrf
      <div class="input-group">
        <input type="text" class="form-control form-control-lg" name="codigo" autofocus placeholder="Ingresar código de seguimiento" aria-label="Search" required>
        <div class="input-group-append">
          <button class="btn btn-danger" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>