<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container px-5">
    <a class="navbar-brand" href="{{ route('root') }}">
      <img src="/dist/img/dinobox-icon1.svg" width="45px" alt="">
      📦 Dinobox.cl 🦖
    </a>

    @if ($sistema->canRegistroCliente() || $sistema->canIngresoCliente())
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if ($sistema->canRegistroCliente())
          <div class="d-inline p-2">
            <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#registerModal">
              Soy nuevo
            </button>
          </div>
          @endif
          @if ($sistema->canIngresoCliente())
          <div class="d-inline p-2">
            <a class=" btn btn-success rounded-pill" href="{{ route('cliente.login') }}">
              Ya tengo cuenta
            </a>
          </div>
          @endif
        </ul>
      </div>
    @endif
  </div>
</nav>

@if ($sistema->canRegistroCliente())
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Registrate en 📦 Dinobox.cl 🦖</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-submit" action="{{ route('web.cliente.perfil.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="d-grid gap-2 pb-2">
            <button class="btn btn-danger rounded-pill" type="button">
              <i class="bi bi-google"></i> Registrate con Google
            </button>
          </div>
          <div class="d-grid gap-2 pb-5">
            <button class="btn btn-primary rounded-pill" type="button">
              <i class="bi bi-facebook"></i> Registrate con Facebook
            </button>
          </div>


          <div class="input-group mb-3 mt-5">
            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1">
          </div>

          {{-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
          </div>

          <label for="basic-url" class="form-label">Your vanity URL</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
          </div> --}}

          {{-- <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" aria-label="With textarea"></textarea>
          </div> --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Registrar</button>
          <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
            <h5>Registrar</h5>
          </button>
          <small>Aceptas nuestros <a href="">Término de servicio</a> y <a href="">Politica de privacidad</a></small>
        </div>

      </form>
    </div>
  </div>
</div>
@endif