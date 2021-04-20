<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Administrador - Edugestion')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="text-sm hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="app">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-info">
            <h3 class="card-title"></h3>
            <button type="button" class="btn btn-danger  float-right btn-sm" onclick="descargarPDF('tableSelect','RoutePDF')"> <i class="fa fa-file-pdf"></i> Descargar PDF </button>
            <button type="button" class="btn btn-success float-right btn-sm mr-2" onclick="exportarExcel('tableSelect','RouteExcel')"><i class="fa fa-file-excel"></i> Descargar Excel</button>
          </div>
          {{-- <div class="card-header">
            <h3 class="card-title">Rutas</h3>
          </div> --}}
          <div class="card-body table-responsive">
            <table id="tableSelect" class="table table-bordered table-hover table-sm">
              <thead>
              <tr>
                <th></th>
                <th>HTPP MEthod</th>
                <th>ROUTE</th>
                <th>NAME</th>
                <th>Corresponding Action</th>
                <th>Middleware</th>
              </tr>
              </thead>
              <tbody>
                @php $count = 0; @endphp
                @foreach ($routeCollection as $r)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $r->methods()[0] }} | {{ $r->methods()[1] ?? '' }}</td>
                  <td>{{ $r->uri() }}</td>
                  <td>{{ $r->getName() }}</td>
                  <td>{{ $r->getActionName() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="/vendor/jspdf/js/jspdf.min.js"></script>
<script src="/vendor/jspdf/js/jspdf.plugin.autotable.js"></script>
<script>
  function descargarPDF(table,nombre) {
    var doc = new jsPDF();
    doc.autoTable({html: `#${table}`});
    doc.save( nombre+'.pdf');
  }
</script>
<script src="/dist/js/excel.js"></script>
</body>
</html>