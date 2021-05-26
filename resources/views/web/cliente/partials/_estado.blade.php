@php
  $e = $orden->estado;
@endphp
<div class="step {{ $e >= 10 ? 'active' : ''}}">
  <span class="icon">
    <i class="fa  fa-2x fa-calendar"></i>
  </span>
  <span class="text">
    Pendiente
  </span>
</div>
@if ($orden->categoria == 10)
  <div class="step {{ $e >= 20 ? 'active' : ''}}">
    <span class="icon">
      <i class="fa fa-2x fa-calendar-check"></i>
    </span>
    <span class="text">
      Asignación de Retiro
    </span>
  </div>
  <div class="step {{ $e >= 30 ? 'active' : ''}}">
    <span class="icon">
      <i class="fa fa-2x fa-people-carry"></i>
    </span>
    <span class="text">
      En transito a retiro
    </span>
  </div>
  <div class="step {{ $e >= 40 ? 'active' : ''}}">
    <span class="icon">
      <i class="fa fa-2x fa-box"></i>
    </span>
    <span class="text">
      Recpecionado
    </span>
  </div>
@endif
@if ($orden->categoria == 20)
  <div class="step {{ $e >= 60 ? 'active' : ''}}">
    <span class="icon">
      <i class="fa fa-2x fa-calendar-check"></i>
    </span>
    <span class="text">
      Asignación de despacho
    </span>
  </div>
@endif
<div class="step {{ $e >= 70 ? 'active' : ''}}">
  <span class="icon">
    <i class="fa fa-2x fa-truck"></i>
  </span>
  <span class="text">
    En camino a despacho
  </span>
</div>
<div class="step {{ $e >= 80 ? 'active' : ''}}">
  <span class="icon">
    <i class="fa fa-2x fa-truck-loading"></i>
  </span>
  <span class="text">
    Entregado
  </span>
</div>