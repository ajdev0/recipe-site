
@if ($paginator->hasPages())
    <nav class="flexbox mt-30">
        @if ($paginator->onFirstPage())
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
        @else
            <a class="btn btn-white" href="{{ $paginator->previousPageUrl() }}"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
        @endif
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="btn btn-white" href="{{ $paginator->nextPageUrl() }}">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @else
            <a class="btn btn-white disabled">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @endif
    </nav>

@endif  