@extends('web.evento.app')
@push('stylesheet')

@endpush
@section('content')

<section class="container py-2">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <div class="card card-dark">
        <div class="card-header">
          Formulario de inscripcion
        </div>
        <form class="form-submit" action="{{ route('web.evento.visita') }}" method="post">
          @csrf
          <div class="card-body form-horizontal">
            <div class="form-group row">
              <label for="nameEvento" class="col-form-label col-3">Rut <small></small></label>
              <div class="input-group col">
              <input type="text" class="form-control" id="inputRutVisita" name="inputRutVisita" placeholder="Ingrese el Rut visita..." maxlength="9" min="8" pattern="^\d{7,9}[0-9K]{1}$" title="Formato de sin 19222333K" onkeyup="this.value = validarRut(this.value)" required>
              <small id="error" class="text-danger"></small>
              </div>
            </div>

            <div class="form-group row">
              <label for="nameEvento" class="col-form-label col-3">Nombre</label>
              <div class="input-group col">
              <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Ingrese el nombre completo.." required maxlength="100" min="2">
              </div>
            </div>

            <div class="form-group row">
              <label for="nameEvento" class="col-form-label col-3">Correo</label>
              <div class="input-group col">
              <input type="email" class="form-control" id="inputCorreo" name="inputCorreo" placeholder="Ingrese su correo aqui..." maxlength="100" min="2">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label col-3">Tipo visita</label>
              <select class="form-control col" id="id_tipo_visita" name="selectTipoVisita" required>
              @foreach ($tipos as $t)
                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group row" id="id_sede">
              <label class="col-form-label col-3">Sede</label>
              <select class="form-control col" id="id_sede_field" name="selectSede" required>
              @foreach ($sedes as $s)
                <option value="{{ $s->id }}">{{ $s->nombre }}</option>
              @endforeach
              <option value="99999">-- sin sede --</option>
              </select>
            </div>

            <div class="form-group row" id="id_carrera">
              <label class="col-form-label col-3">Carrera</label>
              <select class="form-control col" id="id_carrera_field" name="selectCarrera" required>
              @foreach ($carreras as $c)
                <option value="{{ $c->id }}">{{ $c->getName() }}</option>
              @endforeach
              <option value="-1">-- sin carrera --</option>
              </select>
            </div>

            <div class="form-group row" id="id_institucion">
              <label id="id_label_institucion" for="nameEvento" class="col-form-label col-3">Institución <small id="id_small_opcional"></small></label>
              <div class="input-group col">
              <input type="text" class="form-control" id="id_institution_field" name="inputInstitucion" placeholder="Ingrese el nombre completo.."  maxlength="100" required>
              </div>
            </div>

            <div class="form-group">
              <label for="nameEvento" class="col-form-label">Comentario <small>(opcional)</small> </label>
              <div class="input-group">
              <textarea type="text" class="form-control" id="inputComentario" name="inputComentario" placeholder="Ingrese el nombre completo.." maxlength="100" min="2"></textarea>
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
</section>
@endsection
@push('javascript')
<script src="/dist/js/validate-run.js"></script>
<script>
  $('#id_institucion').hide();

  var input_sede = document.getElementById('id_sede_field');
  var input_carrera = document.getElementById('id_carrera_field');
  var input_institucion = document.getElementById('id_institution_field');
  var label_institucion = document.getElementById('id_label_institucion');

  var small = document.getElementById('id_small_opcional');
  input_institucion.setAttribute("required", "");
  input_institucion.removeAttribute("required");

  $('#id_tipo_visita').on('change',function(){
    var selectValor = $(this).val();
    switch (selectValor) {
      case '1': //Alumno Duoc
      $('#id_sede').show();
      $('#id_carrera').show();
      $('#id_institucion').hide();

      input_sede.setAttribute("required", "");
      input_carrera.setAttribute("required", "");
      input_institucion.removeAttribute("required");
      break;

      case '2': //Funcionario Duoc
      $('#id_sede').show();
      $('#id_carrera').hide();
      $('#id_institucion').hide();

      input_sede.setAttribute("required", "");
      input_carrera.removeAttribute("required");
      input_institucion.removeAttribute("required");
      break;

      case '3': //Docente Duoc
      $('#id_sede').show();
      $('#id_carrera').hide();
      $('#id_institucion').hide();

      input_sede.setAttribute("required", "");
      input_carrera.removeAttribute("required");
      input_institucion.removeAttribute("required");
      break;

      case '4': //Director Duoc
      $('#id_sede').show();
      $('#id_carrera').hide();
      $('#id_institucion').hide();

      input_sede.setAttribute("required", "");
      input_carrera.removeAttribute("required");
      input_institucion.removeAttribute("required");
      break;

      case '5': //Estudiante Media
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      input_institucion.setAttribute("required", "");

      small.innerHTML = ""; //opcional para quitar titulo
      break;

      case '7': //Docente Media
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      input_institucion.setAttribute("required", "");

      small.innerHTML = ""; //opcional para quitar titulo
      break;

      case '8': //Director Media
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      input_institucion.setAttribute("required", "");

      small.innerHTML = ""; //opcional para quitar titulo
      break;

      case '9': //Funcionario Exerno
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      input_institucion.setAttribute("required", "");

      small.innerHTML = ""; //opcional para quitar titulo
      break;

      case '99': //Otros
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      input_institucion.removeAttribute("required");

      small.innerHTML = "(opcional)"; //opcional para quitar titulo
      break;

      default:
      $('#id_sede').hide();
      $('#id_carrera').hide();
      $('#id_institucion').show();

      input_sede.removeAttribute("required");
      input_carrera.removeAttribute("required");
      break;
    }
  });
</script>
@endpush