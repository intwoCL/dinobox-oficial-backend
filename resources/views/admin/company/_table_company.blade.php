<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Compañias</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($company as $c)
      <tr>
        <td>{{ $c->nombre }}</td>
        <td class="align-middle">
          <img src="{{ $c->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>