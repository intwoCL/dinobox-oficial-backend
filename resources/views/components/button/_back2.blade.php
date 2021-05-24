<h4 class="mb-3">
  @if (!empty($route))
    <a href="{{ $route }}" class="text-{{ $color ?? 'dark' }}"><i class="fas fa-chevron-circle-left"></i></a>
  @endif
  <i class="{{ $icon ?? '' }}"></i> {!! $body !!}
</h4>