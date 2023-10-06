@if ($paginator->hasPages())
    <nav class="navigation pagination" role="navigation">                
        <div class="single-nav-links">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"><strong><i class="fa-solid fa-circle-left"></i></strong>&nbsp;{{ trans('common.next_page') }}</a>
            @else
                <span>&nbsp;</span>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span>&nbsp;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ trans('common.previous_page') }}&nbsp;<strong><i class="fa-solid fa-circle-right"></i></strong></a>
            @endif
        </div>
    </nav>
@endif