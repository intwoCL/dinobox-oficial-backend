<div class="col-md-4">
  <div class="card shadow-sm text-center">
    <div class="card-header">
      <a href="{{ route('admin.cliente.direccion.edit', $d->id) }}">
        <i class="fas fa-map-marker-alt mr-2"></i>
        {{ $d->comuna->nombre }}
        @if ($d->favorito)
          <i class="fas fa-star"></i>
        @else

        @endif
      </a>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $d->getDireccion() }}</p>
    </div>
    <div class="card-footer">
      <button class="btn btn-sm btn-primary"
        data-toggle="modal"
        data-target="#editProduct"
        >Editar
      </button>
      @include('web.cliente.partials._modal_edit_direction')
    </div>
  </div>
</div>