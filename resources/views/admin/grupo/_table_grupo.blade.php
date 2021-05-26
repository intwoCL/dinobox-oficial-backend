<div class="card-body table-responsive">
  <table id="tableSelect" class="table table-bordered table-hover table-sm text-center">
    <thead>
    <tr>
      <th>Grupos</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($grupos as $g)
      <tr>
        <td>{{ $g->nombre }}</td>
        <td class="align-middle">
          <img src="{{ $g->present()->getPhoto() }}" alt="Imagenes de fondo" height="50px" srcset="">
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>