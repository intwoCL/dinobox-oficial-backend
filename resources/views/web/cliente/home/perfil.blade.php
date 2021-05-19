@extends('web.cliente.app')
@section('content')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/clockpicker/css/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" href="/vendor/datepicker2/css/bootstrap-datepicker3.css">
@endpush
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
<script src="/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="/vendor/datepicker2/js/bootstrap-datepicker.min.js"></script>
<script src="/vendor/datepicker2/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
  $('.clockpicker').clockpicker();

  $('#data_1 .input-group.date').datepicker({
  language: "es",
  format: 'dd-mm-yyyy',
  orientation: "bottom",
  showButtonPanel: true,
  autoclose: true
  });
</script>
@endpush