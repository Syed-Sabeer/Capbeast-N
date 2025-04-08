<div class="design-grid">
    @if (isset($customizerDesigns) && $customizerDesigns->count() > 0)
        @foreach ($customizerDesigns as $design)
            <div class="design-thumbnail" style="background-image: url({{ asset($design->image) }})">
            </div>
        @endforeach
    @else
        <div class="text-center text-muted w-100 py-4">
            <i class="fas fa-exclamation-circle"></i> No designs found.
        </div>
    @endif
</div>

<div class="d-flex justify-content-between mt-3">
    @if ($customizerDesigns->onFirstPage())
        <button class="btn btn-outline-secondary" disabled><i class="fas fa-chevron-left"></i> Previous</button>
    @else
        <button class="btn btn-outline-secondary paginate-btn" data-url="{{ $customizerDesigns->previousPageUrl() }}"><i
                class="fas fa-chevron-left"></i> Previous</button>
    @endif

    @if ($customizerDesigns->hasMorePages())
        <button class="btn btn-outline-secondary paginate-btn" data-url="{{ $customizerDesigns->nextPageUrl() }}">Next
            <i class="fas fa-chevron-right"></i></button>
    @else
        <button class="btn btn-outline-secondary" disabled>Next <i class="fas fa-chevron-right"></i></button>
    @endif
</div>
