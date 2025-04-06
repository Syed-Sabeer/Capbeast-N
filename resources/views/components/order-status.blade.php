@props(['status'])

@if ($status == 0)
  <span class="badge bg-label-info">Processing</span>
@elseif ($status == 1)
  <span class="badge bg-label-warning">In Production</span>
@elseif ($status == 2)
  <span class="badge bg-label-success">Complete</span>
@elseif ($status == 3)
  <span class="badge bg-label-primary">Shipped</span>
@elseif ($status == 4)
  <span class="badge bg-label-danger">Canceled</span>
@else
  <span class="badge bg-label-secondary">Unknown Status</span>
@endif
