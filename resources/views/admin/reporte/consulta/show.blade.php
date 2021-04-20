@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="/vendor/codemirror/css/codemirror.css">
<link rel="stylesheet" href="/vendor/codemirror/theme/dracula.css">
<link rel="stylesheet" href="/vendor/codemirror/theme/neat.css">

<script src="/vendor/codemirror/js/codemirror.js"></script>
<script src="/vendor/codemirror/mode/sql/sql.js"></script>
{{-- <script src="/vendor/codemirror/addon/edit/closetag.js"></script> --}}

<script src="/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<link rel="stylesheet" href="/vendor/codemirror/addon/hint/show-hint.css" />
<script src="/vendor/codemirror/addon/hint/show-hint.js"></script>
<script src="/vendor/codemirror/addon/hint/sql-hint.js"></script>

<link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>
        <a href="{{ route('admin.reportes.consulta.index') }}" class="text-secondary"><i class="fas fa-chevron-circle-left"></i></a>
      Consultas Query</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-8">
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">{{ $c->nombre }} </h3>
        <div class="float-right">
          @foreach ($c->tags as $t)
          <span class="badge badge-danger">#{{ $t->tag->nombre }}</span>
          @endforeach
        </div>
      </div>
      <form class="form-horizontal form-submit" method="POST" action="{{ route('admin.reportes.consulta.update',$c->id) }}">
        @csrf
        @method('put')
        <textarea id="code" name="code">{{ $c->contenido }}</textarea>
        <div class="card-footer">
          <button type="button" class="btn btn-info float-right" onclick="execute_query()">Probar</button>
          <button type="submit" class="btn btn-success float-right mr-2">Guardar</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <div class="row" id="id_query">
    <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Resultados Query</h3>
      </div>
      <div class="card-body table-responsive">
      <table id="table_query" class="table table-bordered table-sm table-striped">
        <tbody>
        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>
</section>
@endsection
@push('javascript')
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/vendor/intwo/datatables-es.js"></script>
  <script>
    window.onload = function() {
      var mime = 'text/x-mariadb';
      // get mime type
      if (window.location.href.indexOf('mime=') > -1) {
        mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
      }
      window.editor = CodeMirror.fromTextArea(document.getElementById('code'), {
        mode: mime,
        indentWithTabs: true,
        smartIndent: true,
        lineNumbers: true,
        matchBrackets : true,
        autofocus: true,
        theme: 'neat',
        extraKeys: {"Ctrl-Space": "autocomplete"},
        hintOptions: {tables: {
          users: ["name", "score", "birthDate"],
          countries: ["name", "population", "size"]
        }}
      });
    };
  </script>
  <script>

    // Limpiar Tabla
    function RemoveRow() {
      var tableHeaderRowCount = 1;
      var table = document.getElementById('table_query');

      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    // Buscar Alumno
    function execute_query() {
      RemoveRow();
      let query = $('#code').val();
      var url = "{{ route('api.v1.consultas.query') }}";
      axios
        .post(url, {
          query
        }).then(response => {
          // console.log(response);
          var result = response.data;
          if(result!=404){
            $('#table_query').DataTable({
              data: result.rows.data,
              columns: result.columns,
            });
          }
        }).catch(e => {
          console.log(e);
        });
    }
  </script>
@endpush