<div class="position-absolute col-12 col-md-9 col-lg-9 col-xl-10 col-xxl-10 z-1">
    <div class="mx-2 mt-1 alert alert-{{ $type }} alert-dismissible fade show">
        {{ $slot }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>