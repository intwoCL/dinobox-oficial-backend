{{-- <form>
  <div class="form-group row">
    <div class="col-md-6">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="col-md-6">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control form-control-border" id="exampleInputEmail1" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form> --}}

<div class="col-md-4">

  <div class="card shadow-sm text-center">
    <div class="card-header">
      <a href="{{ route('admin.cliente.direccion.edit', current_client()->direcciones->first()->id) }}">
        <i class="fas fa-map-marker-alt mr-2"></i>
        {{ current_client()->direcciones->first()->comuna->nombre }}
        {{-- <i class="fas fa-star text-warning mr-2"></i> --}}
      </a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">{{ $d->getDireccion() }}</h5> --}}
      <p class="card-text">{{ current_client()->direcciones->first()->getDireccion() }}</p>
      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
      {{-- <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button> --}}
    </div>
    <div class="card-footer">
    </div>
  </div>
</div>