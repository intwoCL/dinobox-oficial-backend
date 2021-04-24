@if (current_stand())
@php
  $color = current_stand()->present()->getColor();
  $textColor = current_stand()->present()->getTextColor();
@endphp

<style>
  body{ background-color: #f8f9fa; }
  .navbar-dark .navbar-nav .nav-link { color: {{ $textColor }} !important; }
  .navbar-dark .navbar-brand { color: {{ $textColor }} !important; }
  .bg-primary { background-color: {{ $color }} !important; color: {{ $textColor }} !important;  }
  .btn-primary{ background-color: {{ $color }} !important; color: {{ $textColor }} !important;  }
  .badge-primary{ background-color: {{ $color }} !important; color: {{ $textColor }} !important;  }
</style>
@endif