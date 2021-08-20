@if ($paginator->hasPages())
    <div class="vl-pagination d-flex justify-content-center align-items-center mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="btn_mange_pagging" disabled><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn_pagging"
               aria-label="@lang('pagination.previous')"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous
            </a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <a disabled>{{ $element }}</a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <a class="btn_pagging {{ $page == $paginator->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn_pagging" rel="last" aria-label="@lang('pagination.last')">
                Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
            </a>
        @else
            <a class="btn_pagging" disabled
               rel="next" aria-label="@lang('pagination.next')">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
            </a>
        @endif
    </div>
@endif

