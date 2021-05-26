@include('layouts._menu_main')

<li class="nav-header">Repartidor</li>

<li class="nav-item {{ open('admin/sistema*') }}">
  <a href="{{ route('repartidor.ordenes') }}" class="nav-link">
    <i class="fas fa-house-user nav-icon"></i>
    <p>Retiro</p>
  </a>
</li>

{{-- <li class="nav-item {{ open('admin/sistema*') }}">
  <a href="" class="nav-link">
    <i class="fas fa-truck nav-icon"></i>
    <p>Despacho</p>
  </a>
</li>

<li class="nav-item {{ open('admin/sistema*') }}">
  <a href="" class="nav-link">
    <i class="fas fa-wallet nav-icon"></i>
    <p>Mi cuenta</p>
  </a>
</li> --}}


