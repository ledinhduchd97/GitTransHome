@if(isset($houses))
    @if ($houses->hasPages())
        <ul class="list-inline">
            {{-- Previous Page Link --}}
            @if ($houses->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $houses->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            @foreach ($houses as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $houses->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($houses->hasMorePages())
                <li><a href="{{ $houses->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    @endif
@endif