<div class="container">
  <article class="card">
    <header class="card-header">
      Seguimiento de la orden
    </header>
    <div class="card-body">
      <h6>Código Orden: {{ $codigo }}</h6>
      <article class="card">
        <div class="card-body row">
          <div class="col"> <strong>Fecha de Entrega:</strong> <br> 
            {{ $orden->fecha_entrega }}
          </div>
          <div class="col"> <strong>Enviador por:</strong> <br>
          </div>
          <div class="col"> <strong>Estado:</strong> <br> 
            {{ $orden->getEstado() }}
          </div>
          <div class="col"> <strong>Servicio:</strong> <br> 
            {{ $orden->servicio }}
          </div>
          <div class="col"> <strong>Categoría:</strong> <br> 
            {{ $orden->categoria }}
          </div>
        </div>
      </article>
      <div class="track">
        <div class="step active"> 
          <span class="icon"> 
            <i class="fa fa-check"></i> 
          </span> 
          <span class="text">
            Orden confirmada
          </span>
        </div>
        <div class="step active">
          <span class="icon">
            <i class="fa fa-user"></i>
          </span>
          <span class="text">
            Recogida por repartidor
          </span>
        </div>
        <div class="step">
          <span class="icon">
            <i class="fa fa-truck"></i>
          </span>
          <span class="text">
            En camino
          </span>
        </div>
        <div class="step">
          <span class="icon">
            <i class="fa fa-box"></i>
          </span>
          <span class="text">
            Listo para recoger
          </span>
        </div>
      </div>
      <hr> 
      <a href="{{ route('root') }}" class="btn btn-warning" data-abc="true">
        <i class="fa fa-chevron-left"></i> 
        Volver al inicio
      </a>
    </div>
  </article>
</div>