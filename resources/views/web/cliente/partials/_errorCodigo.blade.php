<div class="container-fluid">
  <div class="abs-center">
    <div class="jumbotron border border-dark">
      <h1 class="display-4"><strong>Orden no encontrada</strong></h1>
      <p class="lead">No se ha podido encontrar la orden con el código: <strong>{{ $codigo }}</strong></p>
      <hr class="my-4">
      <p><strong>Por favor, revise que el código de la orden sea el correcto</strong></p>
      <a class="btn btn-primary btn-lg" href="{{ route('root') }}" role="button">Volver al inicio</a>
    </div>
  </div>
</div>