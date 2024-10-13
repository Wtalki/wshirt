@props(['type' => 'info', 'message', 'dismissible' => false])

<div class="alert alert-{{ $type }} d-flex flex-column flex-sm-row p-5 {{ $dismissible ? 'alert-dismissible' : '' }}">
    @if ($type === 'success')
        <i class="ki-duotone ki-check-circle fs-2hx text-success me-4 mb-5 mb-sm-0"></i>
    @elseif ($type === 'danger')
        <i class="ki-duotone ki-cross-circle fs-2hx text-danger me-4 mb-5 mb-sm-0"></i>
    @elseif ($type === 'warning')
        <i class="ki-duotone ki-alert fs-2hx text-warning me-4 mb-5 mb-sm-0"></i>
    @else
        <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"></i>
    @endif

    @if($type == 'edit')
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="fw-semibold"> Category edit Success </h4>
    </div>
    @endif
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="fw-semibold"> Category create Success </h4>
    </div>

    @if ($dismissible)
        <button type="button" class="btn btn-icon position-absolute position-sm-relative top-0 end-0 m-2 m-sm-0" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-primary"></i>
        </button>
    @endif
</div>
