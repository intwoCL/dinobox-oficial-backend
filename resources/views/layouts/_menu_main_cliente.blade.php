@php
  $modeMain = session()->get('modeMain');
@endphp

@if (!empty($modeMain))
@if ($modeMain['modeMain'])

<li class="nav-item">
  <form action="{{ route('auth.modeMain.cliente') }}" method="POST">
    @csrf
    <button class="btn btn-danger btn-sm">SALIR SUPREMO DINO</button>
  </form>
</li>
@endif
@endif