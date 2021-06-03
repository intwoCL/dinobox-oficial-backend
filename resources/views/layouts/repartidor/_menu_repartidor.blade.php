@include('layouts._menu_main')

<li class="nav-header">Repartidor</li>

<li class="nav-item {{ open('admin/sistema*') }}">
  <a href="{{ route('web.repartidor.ordenes') }}" class="nav-link">
    <i class="fas fa-house-user nav-icon"></i>
    <p>Retiro</p>
  </a>
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="fas fa-truck nav-icon"></i>
    <p>Despacho</p>
  </a>
</li>

<li class="nav-item">
  <a href="" class="nav-link">
    <i class="fas fa-wallet nav-icon"></i>
    <p>Mi cuenta</p>
  </a>
</li>

<li class="nav-item">
  <button type="button" class="nav-link text-white btn btn-danger">
    <i class="fas fa-wallet nav-icon"></i>
    <p>Cerrar sesión</p>
  </button>
</li>



