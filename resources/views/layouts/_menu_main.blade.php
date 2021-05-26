@php
  $modeMain = session()->get('modeMain');
@endphp

@if (!empty($modeMain))
@if ($modeMain['modeMain'])
<li class="nav-item">
  <a href="#" class="nav-link bg-danger">
    <i class="nav-icon fas fa-copy"></i>
    <p>
      MODO SUPREMO DINO
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <form action="{{ route('auth.modeMain.user') }}" method="POST">
        @csrf
        {{-- <div class="nav-icon"> --}}
          <button class="btn btn-danger btn-block btn-lg">SALIR SUPREMO DINO</button>
        {{-- </div> --}}
      </form>
    </li>
  </ul>
</li>
<br>
@endif
@endif