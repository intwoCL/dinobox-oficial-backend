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
          {{-- <div class="col"> <strong>Repartidor:</strong> <br>
            {{$repartidor->present()->nombre_completo()}}
          </div> --}}
          <div class="col"> <strong>Estado:</strong> <br>
            {{ $orden->getEstado() }}
          </div>
          <div class="col"> <strong>Servicio:</strong> <br>
            {{ $orden->getServicio() }}
          </div>
          <div class="col"> <strong>Categoría:</strong> <br>
            {{ $orden->getCategoria() }}
          </div>
        </div>
      </article>
      <div class="track">
        
        @if ($orden->estado == 10)
          @include('web.cliente.retiro._pendiente')
        @else
          @if ($orden->estado == 20)
          @include('web.cliente.retiro._asignacion_retiro')
          @else
            @if ($orden->estado == 30)
            @include('web.cliente.retiro._transito_retiro')
            @else
              @if ($orden->estado == 40)
              @include('web.cliente.retiro._recepcionado')
              @else
                @if ($orden->estado == 60)
                @include('web.cliente.retiro._asignacion_despacho')
                @else
                  @if ($orden->estado == 70)
                  @include('web.cliente.retiro._camino_despacho')
                  @else
                    @if ($orden->estado == 80)
                    @include('web.cliente.retiro._entregado')
                    @endif
                  @endif
                @endif   
              @endif
            @endif
          @endif
        @endif

      </div>
      
      <hr>
      <a href="{{ route('root') }}" class="btn btn-warning" data-abc="true">
        <i class="fa fa-chevron-left"></i>
        Volver al inicio
      </a>
    </div>
  </article>
</div>