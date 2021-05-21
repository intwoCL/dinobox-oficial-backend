<div class="col-md-4">
  <div class="card shadow text-center" style="height: 150px;">
    <div class="card-header">
      <a href="{{ route('profile.direcciones.edit', $d->id) }}">
        <i class="fas fa-map-marker-alt mr-2"></i>
        {{ $d->comuna->nombre }}
        @if ($d->favorito)
          <i class="fas fa-star"></i>
        @endif
      </a>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $d->getDireccion() }}</p>
    </div>
  </div>
</div>
