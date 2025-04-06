@if ($paginator->lastPage() > 1)
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-rounded justify-content-end me-3">

            <!-- Handle 1 Page Only (No Arrows) -->
            @if ($paginator->lastPage() == 1)
                <li class="page-item active"><a class="page-link">1</a></li>

            <!-- Handle 2 Pages (No Arrows) -->
            @elseif ($paginator->lastPage() == 2)
                <li class="page-item {{ $paginator->currentPage() == 1 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>
                <li class="page-item {{ $paginator->currentPage() == 2 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(2) }}">2</a>
                </li>

            <!-- Handle 3 Pages Correctly -->
            @elseif ($paginator->lastPage() == 3)
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="ti ti-chevron-left ti-sm"></i></a>
                </li>

                <li class="page-item {{ $paginator->currentPage() == 1 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>

                <li class="page-item {{ $paginator->currentPage() == 2 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(2) }}">2</a>
                </li>

                <li class="page-item {{ $paginator->currentPage() == 3 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(3) }}">3</a>
                </li>

                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="ti ti-chevron-right ti-sm"></i></a>
                </li>

            <!-- Handle 4+ Pages -->
            @else
                <!-- Previous Button -->
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="ti ti-chevron-left ti-sm"></i></a>
                </li>

                <!-- First Page -->
                <li class="page-item {{ ($paginator->currentPage() == 1) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>

                <!-- First and Second Page -->
                @if ($paginator->currentPage() == 1 || $paginator->currentPage() == 2)
                    <li class="page-item {{ ($paginator->currentPage() == 2) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url(2) }}">2</a>
                    </li>
                    @if ($paginator->lastPage() > 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                        </li>
                    @endif

                <!-- Middle Pages -->
                @elseif ($paginator->currentPage() > 2 && $paginator->currentPage() < $paginator->lastPage())
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item active">
                        <a class="page-link" href="{{ $paginator->url($paginator->currentPage()) }}">{{ $paginator->currentPage() }}</a>
                    </li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    </li>

                <!-- Last Page -->
                @elseif ($paginator->currentPage() == $paginator->lastPage())
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage() - 1) }}">{{ $paginator->lastPage() - 1 }}</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    </li>
                @endif


                
                <!-- Next Button -->
                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="ti ti-chevron-right ti-sm"></i></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
