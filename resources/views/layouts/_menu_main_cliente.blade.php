@php
  $modeMain = session()->get('modeMain');
@endphp
@if (!empty($modeMain))
@if ($modeMain['modeMain'])
  <form action="{{ route('auth.modeMain.cliente') }}" method="POST">
    @csrf
    <button class="list-group-item list-group-item-action bg-dark">SALIR SUPREMO DINO</button>
  </form>
@endif
@endif