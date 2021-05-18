@extends('layouts.app')
@section('content')
@component('components.button._back')
  @slot('route', route('admin.sistema.index'))
  @slot('body', "Ajuste del sistema")
@endcomponent
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item mr-2">
            <a class="nav-link active border border-primary border-bottom" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab" aria-controls="pills-user" aria-selected="true">Mi configuración</a>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link border border-primary border-bottom" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">Inicio de sesión</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Actualizar Usuario</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.sistema.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Título</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" value="{{ $sistema->titulo }}" name="titulo" placeholder="...." required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Color empresa<small class="text-danger">*</small></label>
                        <div class="col-sm-8">
                          <input type="text" id="colorpicker" class="form-control" name="sistema_color" value="{{ $sistema->getSistemaColor() }}" required/>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-form-label col-sm-4">Imagen Fondo <small>(Opcional)</small></label>
                        <div class="col-sm-8">
                          <img src="{{ $sistema->present()->getImagenFondo() }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12 text-center">
                          <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                        </div>
                        <div class="col-sm-12 text-center">
                          <div id="preview"></div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-form-label col-sm-4">Imagen Logo <small>(Opcional)</small></label>
                        <div class="col-sm-8">
                          <img src="{{ $sistema->present()->getImagenLogo() }}" class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-12 text-center">
                          <input type="file" name="image2" accept="image/*" onchange="preview2(this)" />
                        </div>
                        <div class="col-sm-12 text-center">
                          <div id="preview2"></div>
                        </div>
                      </div>

                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Color de presentacion</h3>
                  </div>
                  <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.sistema.updateLogin') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="formGroupExampleInput" class="col-sm-4 col-form-label">Login oscuro</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="login_oscuro" required>
                            <option {{ $sistema->getLoginOscuro() ? 'selected' : '' }} value="1">Activado</option>
                            <option {{ !$sistema->getLoginOscuro() ? 'selected' : '' }} value="0">Desactivado</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-5" for="hf-rut">Color de fondo</small></label>
                        <div class="col-sm-7">
                          <input type="text" id="colorpicker2" class="form-control" name="primary_color" value="{{ $sistema->getPrimaryColor() }}" required/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-5" for="hf-rut">Color de texto</small></label>
                        <div class="col-sm-7">
                          <input type="text" id="colorpicker3" class="form-control" name="primary_color_text" value="{{ $sistema->getPrimaryColorText() }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
{{-- $('#pills-tab a[href="#pills-{{ empty(session('tabs')) ? $t : session('tabs') }}"]').tab('show'); --}}
@push('javascript')
<script src="/dist/js/preview.js"></script>
<script src="/vendor/intwo/preview2.js"></script>
<script>
  $("#colorpicker").spectrum({ type: "text" });
  $("#colorpicker2").spectrum({ type: "text" });
  $("#colorpicker3").spectrum({ type: "text" });
</script>
@endpush