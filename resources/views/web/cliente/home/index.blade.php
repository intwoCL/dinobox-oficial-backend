@extends('web.cliente.app')
@section('content')
@push('stylesheet')
@endpush




  {{-- @include('web.cliente.partials._nav') --}}

<div class="container">

  @component('web.cliente.partials._nav_button_back')
    {{-- @slot('route', 'adadsasd') --}}
    {{-- @slot('color', 'secondary') --}}
    @slot('body', "")
  @endcomponent

  <div class="row pt-3">
    <div class="col-md-4 mb-4 d-none d-md-block d-sm-none">
      @include('web.cliente.partials._menu')
    </div>

    <div class="col-md-8 content-form">
      <h4 class="mb-3 text-white">Mi perfil</h4>
      <div class="card shadow rounded">

      </div>
    </div>
  </div>
  @include('web.cliente.partials._footer')
</div>
@endsection
@push('javascript')
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

  $('#myTab a').on('click', function (event) {
  event.preventDefault()
  $(this).tab('show')
})
</script>
@endpush