@extends('web.cliente.app')
@section('content')
@push('stylesheet')
@endpush




  {{-- @include('web.cliente.partials._nav') --}}

<div class="container">

  @component('web.cliente.partials._nav_button_back')
    @slot('route', 'adadsasd')
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
        <form class="form-submit" action="{{ route('profile.cliente') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                <label for="run">RUT</label>
                <input type="text" class="form-control" id="run" placeholder="Ej: 19222888K" value="{{ $cliente->run }}" disabled>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-6 col-md-6">
                <label for="nombre">Nombre<small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="{{ $cliente->nombre }}" name="nombre" autocomplete="new-names">
              </div>

              <div class="col-xs-6 col-md-6">
                <label for="apellido">Apellido<small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="{{ $cliente->apellido }}" name="apellido" autocomplete="new-surnames">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="correo">E-mail</label>
                {{-- <input type="mail" class="form-control"  id="correo" placeholder="Ingresa tu email" value="{{ $cliente->correo }}" name="correo" autocomplete="new-email" disabled> --}}
                <input type="text" class="form-control" value="{{ $cliente->correo }}" disabled>
              </div>
              <div class="col-md-6">
                <label for="telefono">Teléfono de contacto</label>
                <input type="text" class="form-control" id="telefono" placeholder="Ej: 977374733" value="{{ $cliente->telefono }}" name="telefono" autocomplete="new-telephone">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-dark d-none rounded-pill d-md-block d-sm-none">Guardar</button>
            <button type="submit" class="btn btn-dark btn-block rounded-pill d-sm-block d-md-none">
              <h5>GUARDAR</h5>
            </button>
          </div>
        </form>
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