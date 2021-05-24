@extends('layouts.app')
@push('stylesheet')
  <link rel="stylesheet" href="/vendor/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
@component('components.button._back')
  @slot('route', route('ordenes.index.pendientes'))
  {{-- @slot('color', 'dark') --}}
  @slot('body', "Ordenes pendientes")
@endcomponent
<section class="content">
  <div class="row">
    @include('orden._tabs_orden')
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
          </div>
          <div class="card-body py-0">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-danger">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-warning">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar bg-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-primary">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar bg-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-success">90%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">ORDEN</a></li>
              <li class="page-item"><a class="page-link" href="#">SALIDA</a></li>
            </ul>
          </div>
        </div>
      </div>
  </div>
</section>
@endsection
@push('javascript')

@endpush