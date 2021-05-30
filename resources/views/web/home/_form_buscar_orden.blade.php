<header class="bg-dark py-5 intro-section">
  <div class="container px-5">
    <div class="row gx-5 justify-content-center">
      <div class="col-lg-6">
        <div class="text-center my-5 py-4">
          <h1 class="display-5 fw-bolder text-white mb-2 bg-dark pb-2">
            Busca tu orden
          </h1>
          <p class="lead text-white mb-4 bg-dark">
            Conoce como va tu orden, nuestros <strong><i class="fas fa-truck"></i> Velociraptidores 🦖 </strong> han notificado.
          </p>
          <div class="justify-content-sm-center">
            {{-- <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a> --}}
            {{-- <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> --}}

            <form class="my-2" action="{{ route('web.home.buscarCodigo') }}" method="POST">
              @csrf
              <div class="input-group">
                <input type="text" class="form-control form-control-lg" autofocus="autofocus" name="codigo" autofocus placeholder="Ingresar código de seguimiento" aria-label="Search" required>
                <div class="input-group-append">
                  <button class="btn btn-danger btn-lg" type="submit">
                    {{-- <i class="fa fa-search"></i> --}}
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>