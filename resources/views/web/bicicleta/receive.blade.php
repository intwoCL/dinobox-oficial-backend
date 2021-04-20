@extends('web.bicicleta.skeleton')
@push('stylesheet')
<link rel="stylesheet" href="/dist/css/tres.css">
<style>
  body {
    background: rgb(18,119,255);
    background: linear-gradient(180deg, rgba(18,119,255,1) 0%, rgba(24,11,68,1) 100%);
  }
</style>
@endpush
@section('app')
<main class="d-flex align-items-center min-vh-100">
  <div class="container">
    <div class="card login-card">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center m-5">
            <strong>{{ $response }}</strong>
          </h1>
        </div>

      </div>
    </div>
  </div>
</main>
@endsection