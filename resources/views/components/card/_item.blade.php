{{-- <div class="col-md-3"> --}}
  <div class="card h-100">
    <img class="card-img-top" width="200" height="200" src="{{ $photo }}" alt="">

    <div class="card-body">
      <h4 class="card-title"><strong>{{ $name }}</strong></h4>
      <p class="card-text">{{ !empty($description) ? $description : ''}}</p>
    </div>
    @if (!empty($footer))
      <div class="card-footer">
        <a href="{{ $footer }}" class="btn btn-{{ !empty($footer_color) ? $footer_color : 'black' }} btn-block"><strong>{{ $footer_text }}</strong></a>
      </div>
    @endif
  </div>
{{-- </div> --}}
