@extends('web.cliente.app')
@section('content')
@include('layouts._nav2')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-12">
      <div class="col-sm-6">
        <h1>Perfil - Actualizar usuario</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    @include('components.partials._list')
    {{-- <div class="row">
    </div> --}}
  </div>
</section>
@endsection
@push('javascript')
<script src='/js/theme-chooser.js'></script>
<script>
  initThemeChooser();
</script>
<script src="/js/preview.js"></script>
@endpush