<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>
          @if (!empty($route))
            <a href="{{ $route }}" class="text-{{ $color ?? 'dark' }}"><i class="fas fa-chevron-circle-left"></i></a>
          @endif
          <i class="{{ $icon ?? '' }}"></i> {!! $body !!}
        </h1>
      </div>
    </div>
  </div>
</section>