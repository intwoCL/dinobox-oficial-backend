<div class="card shadow-sm">
  <div class="card-header">
    <a href="{{ route('admin.cliente.direccion.edit', $d->id) }}">
      <i class="fas fa-map-marker-alt mr-2"></i>
      {{ $d->comuna->nombre }}
      <i class="fas fa-star text-warning mr-2"></i>
    </a>
  </div>
  <div class="card-body">
    {{-- <h5 class="card-title">{{ $d->getDireccion() }}</h5> --}}
    <p class="card-text">{{ $d->getDireccion() }}</p>
    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    {{-- <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button> --}}
  </div>
  <div class="card-footer">
  </div>
</div>