@if ($paginator->hasPages())
  <ul class="pagination pagination-sm m-0 float-right">

    @if ($paginator->onFirstPage())
      <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <span class="page-link" aria-hidden="true">&lsaquo;</span>
      </li>
    @else
    <li class="page-item">
      <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
    </li>
    @endif

    @foreach ($elements as $element)

      @if (is_string($element))
        <li class="disabled page-item" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
      @endif

        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="active page-item" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
      <li class="page-item">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
      </li>
    @else
    <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
      <span class="page-link" aria-hidden="true">&rsaquo;</span>
    </li>
    @endif
  </ul>
@endif